<?php

namespace App\Filament\Resources\Agents\Schemas;

use App\Models\User;
use Filament\Schemas\Schema;
use Filament\Forms\Components\{
    DatePicker,
    FileUpload,
    TextInput,
    Select,
    Toggle,
};
use Filament\Actions\Action;
use Filament\Schemas\Components\Section;

class AgentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(3)
            ->components([
                // SECTION AGENT
                Section::make('Informations de l’agent')
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        Select::make('user_id')
                            ->label('Compte utilisateur')
                            ->options(User::where('role', 'agent')->pluck('name', 'id'))
                            ->placeholder("Choisir")
                            ->belowContent("Soit cliquer sur + pour ajoute un utilisateur pour cet agent")
                            ->createOptionForm([
                                FileUpload::make('avatar')
                                    ->label('Photo de profil (optionnel)')
                                    ->image()
                                    ->directory('profiles')
                                    ->disk('public')
                                    ->maxSize(4096)
                                    ->default(null)->columnSpanFull(),
                                TextInput::make('name')
                                    ->required(),
                                TextInput::make('email')
                                    ->label('Email address')
                                    ->email()
                                    ->required(),
                                TextInput::make('phone')
                                    ->tel()
                                    ->unique()
                                    ->maxLength(12)
                                    ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/')
                                    ->default(null),
                                TextInput::make('role')
                                    ->default('agent')
                                    ->disabled()
                                    ->dehydrated(true)
                                    ->required(),
                                TextInput::make('adresse')
                                    ->default(null),
                                TextInput::make('password')
                                    ->label('Password (Requis seulement lors de la création)')
                                    ->password()
                                    ->required(fn ($context) => $context === 'create')
                                    ->dehydrateStateUsing(fn($state) => filled($state) ? bcrypt($state) : null)
                                    ->dehydrated(fn($state) => filled($state)),
                                Toggle::make('is_active')
                                    ->label("Aciter le compte")
                                    ->default(true)
                                    ->required(),
                            ])->createOptionUsing(function (array $data) {
                                return User::create($data)->getKey();
                            })->createOptionAction(function (Action $action) {
                                return $action
                                    ->modalHeading('Création d\'un utilisateur')
                                    ->modalSubmitActionLabel('Créer')
                                    ->modalWidth('lg');
                            }),

                        Select::make('service_id')
                            ->label('Service')
                            ->relationship('service', 'nom')
                            ->placeholder("Choisir un service")
                            ->belowContent("Soit cliquer sur + pour créer un service")
                            ->nullable()
                            ->createOptionForm([
                                FileUpload::make('image')
                                    ->disk('public')
                                    ->directory("services")
                                    ->required()->columnSpanFull(),
                                TextInput::make('nom')
                                    ->label('Nom du service')
                                    ->required(),
                                TextInput::make('description')
                                    ->required(),
                                Select::make('type')
                                    ->label('Type de service')
                                    ->placeholder('choisir')
                                    ->options([
                                        'babysitter' => 'babysitter',
                                        'menager' => 'menager',
                                    ])
                                    ->required(),
                                TextInput::make('prix_base')
                                    ->required()
                                    ->suffix('$ /mois')
                                    ->numeric(),
                                Toggle::make('is_actif')
                                    ->label('Visibilité')
                                    ->default(true)
                                    ->required(),
                            ])->createOptionAction(function (Action $action) {
                                return $action
                                    ->modalHeading('Création d\'un service')
                                    ->modalSubmitActionLabel('Créer')
                                    ->modalWidth('lg');
                            }),

                        Select::make('category_id')
                            ->label('Type d’agent')
                            ->relationship('category', 'name')
                            ->placeholder("Choisir")
                            ->belowContent("Soit cliquer sur + pour créer une catégorie")
                            ->required()
                            ->createOptionForm([
                                TextInput::make('name')
                                    ->label('Nom du type')
                                    ->required()
                            ])->createOptionAction(function (Action $action) {
                                return $action
                                    ->modalHeading('Création du type d\'agent')
                                    ->modalSubmitActionLabel('Créer')
                                    ->modalWidth('lg');
                            }),

                        TextInput::make('experience')
                            ->label('Expérience (en années)')
                            ->numeric()
                            ->default(0)
                            ->required(),

                        TextInput::make('rating')
                            ->label('Note (sur 5)')
                            ->numeric()
                            ->minValue(0)
                            ->maxValue(5)
                            ->default(0)
                            ->suffixIcon('heroicon-s-star')
                            ->required(),

                        Select::make('disponibilite')
                            ->label('Disponibilité')
                            ->options([
                                'temps plein' => 'Temps plein',
                                'temps partiel' => 'Temps partiel',
                                'occasionnel' => 'Occasionnel',
                            ])
                            ->default('temps plein')
                            ->required(),

                        Select::make('statut')
                            ->label('Statut')
                            ->options([
                                'disponible' => 'Disponible',
                                'occupé' => 'Occupé',
                            ])
                            ->default('disponible')
                            ->required(),

                        TextInput::make('adresse')
                            ->label('Adresse complète')
                            ->nullable(),

                        Toggle::make('is_badges')
                            ->label('Attribuer un badge')
                            ->default(false),

                    ]),

                Section::make('Assignation')
                    ->columns(1)
                    ->columnSpanFull()
                    ->schema([
                        Select::make('recommended_by')
                            ->label('Récommandé par')
                            ->afterLabel("Laissez vide si non recommandé par un client")
                            ->relationship('recommendedBy', 'name')
                            ->reactive()
                            ->placeholder("Choisir un client"),

                        DatePicker::make('recommended_at')
                            ->label('Date de recommandation')
                            ->date('Y-m-d')
                            ->visible(fn ($get) => $get('recommended_by') != null)
                            ->required(),
                    ])
            ]);
    }
}

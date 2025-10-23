<?php

namespace App\Filament\Resources\Clients\Schemas;

use App\Models\User;
use Filament\Schemas\Schema;
use Filament\Forms\Components\{
    FileUpload,
    TextInput,
    Select,
    Toggle,
};
use Filament\Actions\Action;
use Filament\Schemas\Components\Section;

class ClientForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Détails de l’agent')
                    ->schema([
                        Select::make('user_id')
                            ->label('Compte utilisateur')
                            ->options(User::where('role', 'client')->pluck('name', 'id'))
                            ->placeholder("Choisir")
                            ->belowContent("Soit cliquer sur + pour ajoute un compte")
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
                                TextInput::make('adresse')
                                    ->default(null),
                                TextInput::make('password')
                                    ->label('Password (Requis seulement lors de la création)')
                                    ->password()
                                    ->required(fn ($context) => $context === 'create')
                                    ->dehydrateStateUsing(fn($state) => filled($state) ? bcrypt($state) : null)
                                    ->dehydrated(fn($state) => filled($state)),
                                Toggle::make('is_active')
                                    ->default(true)
                                    ->required(),
                            ])->createOptionAction(function (Action $action) {
                                return $action
                                    ->modalHeading('Création d\'un utilisateur')
                                    ->modalSubmitActionLabel('Créer')
                                    ->modalWidth('lg');
                            }),

                            Select::make('type')
                                ->label('Type de client')
                                ->options(['personnel' => 'Personnel', 'entreprise' => 'Entreprise'])
                                ->reactive()
                                ->required(),

                            TextInput::make('entreprise_nom')
                                ->label('Nom de l\'entreprise')
                                ->required()
                                //->dehydrated(fn)
                                ->hidden(fn ($record) => !empty($record["type"]) && $record["type"] == 'personnel')
                                ->default(null),

                    ])
                    ->columnSpan(['md' => 2]),
            ]);
    }
}

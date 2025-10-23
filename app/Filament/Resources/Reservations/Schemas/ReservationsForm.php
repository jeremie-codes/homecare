<?php

namespace App\Filament\Resources\Reservations\Schemas;

use App\Models\Agent;
use App\Models\Client;
use App\Models\User;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ToggleButtons;
use Illuminate\Support\HtmlString;
use Filament\Schemas\Components\Wizard;
use Filament\Schemas\Components\Wizard\Step;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Blade;

class ReservationsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Wizard::make([
                    Step::make('Détails')
                        ->schema([
                            Select::make('client_id')
                                ->label('Client')
                                ->placeholder('Choisir')
                                ->options(Client::with('user')
                                ->pluck('user_id', 'id'))
                                ->required(false),

                            Select::make('agent_id')
                                ->label('Agent')
                                ->placeholder('Choisir')
                                ->options(Agent::with('user')
                                ->pluck('user_id', 'id'))
                                ->required(false),

                            Select::make('service_id')
                                ->placeholder('Choisir')
                                ->required()
                                ->reactive()
                                ->relationship('service', 'nom'),

                            DatePicker::make('date_reservation')
                                ->required(false)
                                ->date()
                                ->default(now()),

                            ToggleButtons::make('frequence')
                                ->inline()
                                ->options(['heure' => 'Heure' , 'jour' => 'Jour', 'semaine' => 'Semaine',
                                    'mois' => 'Mois', 'Année' => 'Année', 'indefini' => 'Indefini'])
                                ->reactive()
                                ->default('heure')
                                ->required(false),

                            TextInput::make('duree')
                                ->required(false)
                                ->numeric()
                                ->suffix(fn (callable $get) => $get('frequence') ?? 'heure'),

                            Toggle::make('transport_inclus')->inline(),

                            Toggle::make('urgence')->inline(),
                    ])->columns(2),
                    Step::make('Validation')
                        ->schema([
                            TextInput::make('taille_logement')
                                ->label('Taille de logement')
                                ->placeholder('Ex: 4 pièces, 3 chambres, ect.')
                                ->hidden(fn (callable $get) => optional(\App\Models\Service::find($get('service_id')))->nom !== 'ménage')
                                ->numeric(),
                            TextInput::make('nombre_personnes')
                                ->label('Nombre d\'enfants')
                                ->hidden(fn (callable $get) => optional(\App\Models\Service::find($get('service_id')))->nom !== 'babysitting')
                                ->numeric()
                                ->default(1)
                                ->minValue(1),
                            TextInput::make('conditions_particulieres')->placeholder('Facultative'),
                            Textarea::make('adresse')
                                ->columnSpanFull()
                                ->required(),
                        ])
                    ])
                    ->columnSpanFull()
                    ->submitAction(new HtmlString(Blade::render(<<<BLADE
                        <x-filament::button
                            type="submit"
                            size="sm"
                        >
                            Enregistrer
                        </x-filament::button>
                    BLADE)))
            ]);
    }
}

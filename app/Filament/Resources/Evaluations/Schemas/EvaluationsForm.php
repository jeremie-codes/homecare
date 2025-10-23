<?php

namespace App\Filament\Resources\Evaluations\Schemas;

use App\Models\Agent;
use App\Models\Client;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class EvaluationsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(3)
            ->components([
                Section::make('')
                ->columnSpan(['md' => 2])
                ->schema([
                    Select::make('client_id')
                        ->label('Client')
                        ->placeholder('Choisir')
                        ->required()
                        ->options(Client::with('user')
                        ->pluck("user_id", 'id')),
                    Select::make('agent_id')
                        ->label('Agent')
                        ->placeholder('Choisir')
                        ->required()
                        ->options(Agent::with('user')
                        ->pluck("user_id", 'id')),
                    TextInput::make('rating')
                        ->label('Note')
                        ->placeholder('de 0 à 5')
                        ->required()
                        ->minValue(0)
                        ->maxValue(5)
                        ->numeric()
                        ->suffixIcon('heroicon-s-star'),
                    Textarea::make('commentaire')
                ])
            ]);
    }
}

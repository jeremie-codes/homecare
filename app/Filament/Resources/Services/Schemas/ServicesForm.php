<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ServicesForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make([
                    FileUpload::make('image')
                        ->directory("services-images")
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
                ])->columns(2)->columnSpanFull(),
            ]);
    }
}

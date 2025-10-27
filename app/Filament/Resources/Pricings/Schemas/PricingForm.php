<?php

namespace App\Filament\Resources\Pricings\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PricingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(3)
            ->components([
               Section::make('')
                    //->columnSpan(['md' => 2])
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                            Select::make('service_id')
                                ->required()
                                ->placeholder('Choisir')
                                ->relationship('service', 'nom'),
                            TextInput::make('price')
                                ->required()
                                ->default(0)
                                ->prefix('$'),
                            TextInput::make('periode')
                                ->required(),
                            TagsInput::make('taches')
                                ->label('Tâches du bouquet')
                                ->placeholder('Cliquez sur Enter pour ajouter une tâche')
                                ->suffixIcon('heroicon-o-calendar')
                                ->required(),
                            Toggle::make('is_active')
                                ->label('Actif')
                                ->required(),
                    ])
            ]);
    }
}

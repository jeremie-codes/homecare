<?php

namespace App\Filament\Resources\Pricings\Schemas;

use Filament\Forms\Components\DatePicker;
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
                    ->columnSpan(['md' => 2])
                    ->schema([
                            TextInput::make('service_id')
                                ->required()
                                ->numeric(),
                            TextInput::make('price')
                                ->required()
                                ->numeric()
                                ->prefix('$'),
                            TextInput::make('periode')
                                ->required(),
                            Toggle::make('is_active')
                                ->required(),
                    ])
            ]);
    }
}

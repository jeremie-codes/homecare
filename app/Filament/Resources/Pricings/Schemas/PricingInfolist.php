<?php

namespace App\Filament\Resources\Pricings\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PricingInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('service_id')
                    ->numeric(),
                TextEntry::make('price')
                    ->money(),
                TextEntry::make('taches'),
                TextEntry::make('periode'),
                TextEntry::make('type'),
                IconEntry::make('is_active')
                ->boolean(),
                TextEntry::make('created_at')
                ->dateTime(),
                TextEntry::make('updated_at')
                ->dateTime(),
                TextEntry::make('description')->columnSpanFull(),
            ]);
    }
}

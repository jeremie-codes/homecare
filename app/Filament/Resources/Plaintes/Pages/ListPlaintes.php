<?php

namespace App\Filament\Resources\Plaintes\Pages;

use App\Filament\Resources\Plaintes\PlainteResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPlaintes extends ListRecords
{
    protected static string $resource = PlainteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

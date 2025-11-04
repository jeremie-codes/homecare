<?php

namespace App\Filament\Resources\Plaintes\Pages;

use App\Filament\Resources\Plaintes\PlainteResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPlainte extends ViewRecord
{
    protected static string $resource = PlainteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}

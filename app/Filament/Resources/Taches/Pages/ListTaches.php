<?php

namespace App\Filament\Resources\Taches\Pages;

use App\Filament\Resources\Taches\TachesResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTaches extends ListRecords
{
    protected static string $resource = TachesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

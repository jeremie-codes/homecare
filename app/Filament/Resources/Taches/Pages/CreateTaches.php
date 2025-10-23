<?php

namespace App\Filament\Resources\Taches\Pages;

use App\Filament\Resources\Taches\TachesResource;
use Filament\Resources\Pages\CreateRecord;

class CreateTaches extends CreateRecord
{
    protected static string $resource = TachesResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

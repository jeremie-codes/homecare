<?php

namespace App\Filament\Resources\Messages\Pages;

use App\Filament\Resources\Messages\MessagesResource;
use Filament\Resources\Pages\CreateRecord;

class CreateMessages extends CreateRecord
{
    protected static string $resource = MessagesResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

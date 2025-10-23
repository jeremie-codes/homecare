<?php

namespace App\Filament\Resources\Messages\Pages;

use App\Filament\Resources\Messages\MessagesResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewMessages extends ViewRecord
{
    protected static string $resource = MessagesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}

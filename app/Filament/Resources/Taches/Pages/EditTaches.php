<?php

namespace App\Filament\Resources\Taches\Pages;

use App\Filament\Resources\Taches\TachesResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTaches extends EditRecord
{
    protected static string $resource = TachesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

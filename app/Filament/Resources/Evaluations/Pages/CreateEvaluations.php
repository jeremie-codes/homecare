<?php

namespace App\Filament\Resources\Evaluations\Pages;

use App\Filament\Resources\Evaluations\EvaluationsResource;
use Filament\Resources\Pages\CreateRecord;

class CreateEvaluations extends CreateRecord
{
    protected static string $resource = EvaluationsResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

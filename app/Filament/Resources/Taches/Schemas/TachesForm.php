<?php

namespace App\Filament\Resources\Taches\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TachesForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make([
                    Select::make('service_id')->required()->relationship('service', 'nom'),
                    TextInput::make('nom')->required()->label("Titre de la tache"),
                    Textarea::make('description')->label("Description de la tache"),
                ])->columnSpanFull()
            ]);
    }
}

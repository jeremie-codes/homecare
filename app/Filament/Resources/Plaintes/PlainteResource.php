<?php

namespace App\Filament\Resources\Plaintes;

use App\Filament\Resources\Plaintes\Pages\CreatePlainte;
use App\Filament\Resources\Plaintes\Pages\EditPlainte;
use App\Filament\Resources\Plaintes\Pages\ListPlaintes;
use App\Filament\Resources\Plaintes\Pages\ViewPlainte;
use App\Filament\Resources\Plaintes\Schemas\PlainteForm;
use App\Filament\Resources\Plaintes\Schemas\PlainteInfolist;
use App\Filament\Resources\Plaintes\Tables\PlaintesTable;
use App\Models\Rapport;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PlainteResource extends Resource
{
    protected static ?string $model = Rapport::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Plaintes';

    public static function form(Schema $schema): Schema
    {
        return PlainteForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PlainteInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PlaintesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPlaintes::route('/'),
            'create' => CreatePlainte::route('/create'),
            'view' => ViewPlainte::route('/{record}'),
            'edit' => EditPlainte::route('/{record}/edit'),
        ];
    }
}

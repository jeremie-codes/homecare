<?php

namespace App\Filament\Resources\Taches;

use App\Filament\Resources\Taches\Pages\CreateTaches;
use App\Filament\Resources\Taches\Pages\EditTaches;
use App\Filament\Resources\Taches\Pages\ListTaches;
use App\Filament\Resources\Taches\Schemas\TachesForm;
use App\Filament\Resources\Taches\Tables\TachesTable;
use App\Models\Tache;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TachesResource extends Resource
{
    protected static ?string $model = Tache::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedTableCells;

    protected static ?string $recordTitleAttribute = 'Tache';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return TachesForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TachesTable::configure($table);
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
            'index' => ListTaches::route('/'),
            'create' => CreateTaches::route('/create'),
            'edit' => EditTaches::route('/{record}/edit'),
        ];
    }
}

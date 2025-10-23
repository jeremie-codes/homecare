<?php

namespace App\Filament\Resources\Evaluations;

use App\Filament\Resources\Evaluations\Pages\CreateEvaluations;
use App\Filament\Resources\Evaluations\Pages\EditEvaluations;
use App\Filament\Resources\Evaluations\Pages\ListEvaluations;
use App\Filament\Resources\Evaluations\Pages\ViewEvaluations;
use App\Filament\Resources\Evaluations\Schemas\EvaluationsForm;
use App\Filament\Resources\Evaluations\Schemas\EvaluationsInfolist;
use App\Filament\Resources\Evaluations\Tables\EvaluationsTable;
use App\Models\Evaluation;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EvaluationsResource extends Resource
{
    protected static ?string $model = Evaluation::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedStar;

    protected static ?string $recordTitleAttribute = 'Evaluation';

    public static function form(Schema $schema): Schema
    {
        return EvaluationsForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return EvaluationsInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EvaluationsTable::configure($table);
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
            'index' => ListEvaluations::route('/'),
            'create' => CreateEvaluations::route('/create'),
            'view' => ViewEvaluations::route('/{record}'),
            'edit' => EditEvaluations::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}

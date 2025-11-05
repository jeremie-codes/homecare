<?php

namespace App\Filament\Resources\Reservations;

use App\Filament\Resources\Reservations\Pages\CreateReservations;
use App\Filament\Resources\Reservations\Pages\EditReservations;
use App\Filament\Resources\Reservations\Pages\ListReservations;
use App\Filament\Resources\Reservations\Pages\ViewReservations;
use App\Filament\Resources\Reservations\Schemas\ReservationsForm;
use App\Filament\Resources\Reservations\Schemas\ReservationsInfolist;
use App\Filament\Resources\Reservations\Tables\ReservationsTable;
use App\Models\Reservation;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReservationsResource extends Resource
{
    protected static ?string $model = Reservation::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCalendarDays;

    protected static ?string $recordTitleAttribute = 'Reservation';

    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return ReservationsForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ReservationsInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ReservationsTable::configure($table);
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
            'index' => ListReservations::route('/'),
            'create' => CreateReservations::route('/create'),
            'view' => ViewReservations::route('/{record}'),
            'edit' => EditReservations::route('/{record}/edit'),
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

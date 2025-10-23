<?php

namespace App\Filament\Resources\Reservations\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\TextColumn;
//use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class ReservationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('client.user.name')->label('Client')->searchable()->sortable(),
                TextColumn::make('agent.user.name')->label('Agent')->searchable()->sortable(),
                TextColumn::make('service.nom')->searchable()->sortable(),
                TextColumn::make('duree', function ($record) {
                    return $record . 'frequence';
                }),
                BooleanColumn::make('transport_inclus'),
                BooleanColumn::make('urgence'),
                TextColumn::make('created_at')->date()->label('Créé le'),
            ])
            ->filters([
                ///TrashedFilter::make(),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}

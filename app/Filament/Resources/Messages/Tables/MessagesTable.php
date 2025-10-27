<?php

namespace App\Filament\Resources\Messages\Tables;

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

class MessagesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('sender.user.name')->label('Expéditeur')->limit(30)->searchable(),
                TextColumn::make('receiver.user.name')->label('Destinateur')->limit(30)->searchable(),
                TextColumn::make('reservation.service.nom')->label('Reservation'),
                TextColumn::make('content')->label('Contenus')->limit(30),
                BooleanColumn::make('is_read')->label('Lu'),
                TextColumn::make('created_at')->date()->searchable(),
            ])
            ->filters([
                //TrashedFilter::make(),
            ])
            ->recordActions([
                ViewAction::make(),
                //EditAction::make(),
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

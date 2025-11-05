<?php

namespace App\Filament\Resources\Pricings\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PricingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('service.nom')
                    ->sortable(),
                TextColumn::make('price')
                    ->money()
                    ->label('Prix')
                    ->sortable(),
                TextColumn::make('periode')
                    ->searchable(),
                TextColumn::make('taches')
                    ->label('Nombre de tâches')
                    ->formatStateUsing(function ($state) {
                        if (empty($state)) {
                            return 0;
                        }

                        if (is_array($state)) {
                            return count($state);
                        }

                        $decoded = json_decode($state, true);

                        if (is_array($decoded)) {
                            return count($decoded);
                        }

                        return 0;
                    }),

                IconColumn::make('is_active')
                    ->label('Actif')
                    ->boolean(),
                TextColumn::make('created_at')
                    ->date()
                    ->sortable()
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}

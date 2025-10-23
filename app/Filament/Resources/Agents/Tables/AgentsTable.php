<?php

namespace App\Filament\Resources\Agents\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AgentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                ->label("Utilisateur")
                    ->sortable(),
                // TextColumn::make('service_id')->numeric()->sortable(),
                TextColumn::make('type'),
                TextColumn::make('experience')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('Note')
                    ->numeric()
                    ->sortable(),
                IconColumn::make('is_badges')
                    ->label('Badge')
                    ->boolean(),
                TextColumn::make('created_at')
                    ->label('Créé le')
                    ->date()
                    ->sortable()
                    ->toggleable()
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}

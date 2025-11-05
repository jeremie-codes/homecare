<?php

namespace App\Filament\Resources\Reservations\Tables;

use Carbon\Carbon;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\BadgeColumn;
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
                TextColumn::make('duree')->state(function ($record) {
                    return $record->duree . ' ' . $record->frequence;
                }),
                BooleanColumn::make('transport_inclus'),
                BooleanColumn::make('urgence'),
                BadgeColumn::make('statut')->colors([
                    'warning' => 'en attente',
                    'success' => 'confirmée',
                    'danger' => 'annulée',
                ]),
                TextColumn::make('created_at')->date()->label('Créé le'),

            ])
            ->filters([
                ///TrashedFilter::make(),
            ])
            ->recordActions([
                ViewAction::make(),
                Action::make('accepter')
                    ->label('Accepter la réservation')
                    ->color('success')
                    ->icon('heroicon-o-check-circle')
                    ->visible(fn ($record) => $record->statut === 'en_attente')
                    ->requiresConfirmation()
                    ->action(function ($record) {
                        $agent = $record->agent;

                        // Met à jour l’agent
                        $agent->update([
                            'recommended_by' => $record->client->user_id,
                            'disponibility' => 'occupé',
                            'recommended_at' => Carbon::now(),
                        ]);

                        // Met à jour la réservation
                        $record->update([
                            'statut' => 'confirmée',
                        ]);
                    })
                    ->after(fn() => Notification::make()
                        ->title('Réservation acceptée')
                        ->success()
                        ->send()
                    ),
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

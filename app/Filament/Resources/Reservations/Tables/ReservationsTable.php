<?php

namespace App\Filament\Resources\Reservations\Tables;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Notifications\Notification;
use Filament\Actions\ButtonAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\BadgeColumn;
use Carbon\Carbon;
use Filament\Actions\DeleteBulkAction;

class ReservationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('client.user.name')
                    ->label('Client')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('agent.user.name')
                    ->label('Agent')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('service.nom')
                    ->label('Service')
                    ->searchable()
                    ->sortable(),

                BooleanColumn::make('urgence')
                    ->label('Urgence'),

                BadgeColumn::make('statut')
                    ->label('Statut')
                    ->colors([
                        'warning' => 'en attente',
                        'success' => 'confirmée',
                        'danger' => 'annulée',
                    ])
                    ->sortable(),

                TextColumn::make('date_reservation')
                    ->label('Reserv. pour')
                    ->date(),

                TextColumn::make('duree')
                    ->state(function ($record) {
                        return $record->duree . ' ' . $record->frequence;
                    }),
            ])
            ->recordActions([
                ViewAction::make()->label('Voir'),

                ButtonAction::make('accepter')
                    ->label('Accepter')
                    ->color('success')
                    ->icon('heroicon-o-check-circle')
                    ->visible(fn ($record) => $record->statut === 'en attente') // Vérifie bien la valeur stockée en DB
                    ->requiresConfirmation()
                    ->accessSelectedRecords()
                    ->action(function ($record) {
                        $agent = $record->agent;

                        $agent->update([
                            'recommended_by' => $record->client->user_id,
                            'recommended_at' => Carbon::now(),
                            'statut' => 'occupé',
                        ]);

                        $record->update([
                            'statut' => 'confirmée',
                        ]);
                    })
                    ->after(fn() => Notification::make()
                        ->title('Réservation acceptée')
                        ->success()
                        ->send()
                    ),

                ButtonAction::make('terminer')
                    ->label('Conclure')
                    ->color('warning')
                    ->icon('heroicon-o-check')
                    ->visible(fn ($record) => $record->statut === 'confirmée')
                    ->requiresConfirmation()
                    ->action(function ($record) {
                        $agent = $record->agent;

                        // Met à jour les infos de l’agent
                        $agent->update([
                            'recommended_by' => null,
                            'recommended_at' => null,
                            'statut' => 'disponible',
                        ]);

                        // Met à jour la réservation
                        $record->update([
                            'statut' => 'terminée',
                        ]);
                    })
                    ->after(fn() => Notification::make()
                        ->title('Réservation terminée')
                        ->success()
                        ->send()
                    ),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
    }
}

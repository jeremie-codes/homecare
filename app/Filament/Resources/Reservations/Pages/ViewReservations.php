<?php

namespace App\Filament\Resources\Reservations\Pages;

use App\Filament\Resources\Reservations\ReservationsResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Carbon\Carbon;

class ViewReservations extends ViewRecord
{
    protected static string $resource = ReservationsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
            Action::make('accepter')
                ->label('Accepter la réservation')
                ->color('success')
                ->icon('heroicon-o-check-circle')
                ->visible(fn ($record) => $record->statut === 'en attente')
                ->requiresConfirmation()
                ->action(function ($record) {
                    $agent = $record->agent;

                    // Met à jour les infos de l’agent
                    $agent->update([
                        'recommended_by' => $record->client->user_id,
                        'recommended_at' => Carbon::now(),
                        'statut' => 'occupé',
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
            Action::make('terminer')
                ->label('Conclure la réservation')
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
        ];
    }
}

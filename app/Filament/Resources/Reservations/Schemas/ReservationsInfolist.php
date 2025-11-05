<?php

namespace App\Filament\Resources\Reservations\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Str;

class ReservationsInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(3)
            ->components([
                Section::make('Détails de la réservation')
                    ->columns(2)
                    ->columnSpan(['md' => 2])
                    //->columnSpanFull()
                    ->schema([
                        TextEntry::make('client.user.name')->label('Demandé par')->weight('bold'),
                        TextEntry::make('phone')->label('Contact')->weight('bold'),
                        TextEntry::make('agent.user.name')->label('Agent demandé')->weight('bold'),
                        TextEntry::make('service.nom')->label('Service')->weight('bold'),
                        TextEntry::make('duree')->label('Duree de service')->weight('bold')
                            ->state(function ($record) { return $record->duree . ' ' .$record->frequence; }),
                        TextEntry::make('statut')->badge()
                            ->icon(fn ($record) => match ($record->statut) {
                                'en attente' => 'heroicon-o-clock',
                                'confirmée' => 'heroicon-o-check-circle',
                                'annulée' => 'heroicon-o-x-circle',
                                default => 'heroicon-o-question-mark-circle',
                            })->colors([
                                'warning' => 'en attente',
                                'success' => 'confirmée',
                                'danger' => 'annulée',
                            ])->label('Statut'),
                        IconEntry::make('urgence')
                            ->icon(fn (string $state): Heroicon => match ($state) {
                                '0' => Heroicon::OutlinedXCircle,
                                '1' => Heroicon::OutlinedCheckCircle,
                            })
                            ->color(fn (string $state): string => match ($state) {
                                '0' => 'danger',
                                '1' => 'success',
                            }),
                        TextEntry::make('transport_inclus')->weight('bold')
                            ->state(function ($record) { return $record->transport_inclus == 1 ? "Oui" : "Non"; }),
                        TextEntry::make('nombre_personnes')
                            ->weight('bold')
                            ->label('Nombre de personnes')
                            ->visible(fn ($record) =>
                                Str::contains(Str::lower($record->service->nom), ['baby', 'nounou'])
                            ),
                        TextEntry::make('taches_specifiques')->weight('bold')->label('Taches supplémentaires'),
                        TextEntry::make('taille_logement')->weight('bold')->label('Taille du logement')
                            ->visible(fn ($record) =>
                                Str::contains(Str::lower($record->service->nom), ['ménage', 'clean', 'menage'])
                            ),
                        TextEntry::make('conditions_particulieres')->weight('bold')->label('Conditions particulieres'),
                    ]),
                Section::make('')
                    ->columns(1)
                    ->columnSpan(['md' => 1])
                    //->columnSpanFull()
                    ->schema([
                        TextEntry::make('date_reservation')->date(),
                        TextEntry::make('created_at')->label('Créé le')->date(),
                    ])
            ]);
    }
}

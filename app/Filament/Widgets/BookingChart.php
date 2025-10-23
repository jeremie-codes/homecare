<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Reservation;

class BookingChart extends ChartWidget
{
    protected ?string $heading = 'Réservations mensuelles';

    protected int | string | array $columnSpan = 'full';

    protected static ?int $sort = 2; // position dans le dashboard

    protected function getType(): string
    {
        return 'line'; // ou 'line'
    }

    protected function getData(): array
    {
        // Récupère le nombre de souscriptions par mois pour l'année en cours
        $subscriptions = Reservation::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->whereYear('created_at', now()->year)
            ->groupBy('month')
            ->pluck('total', 'month');

        // Préparer les données pour les 12 mois
        $data = [];
        for ($i = 1; $i <= 12; $i++) {
            $data[] = $subscriptions[$i] ?? 0;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Souscriptions',
                    'data' => $data,
                    'backgroundColor' => '#e7000b',
                ],
            ],
            'labels' => ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sep', 'Oct', 'Nov', 'Déc'],
        ];
    }
}

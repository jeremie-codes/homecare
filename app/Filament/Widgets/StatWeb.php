<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Project;
use App\Models\User;
use App\Models\Newsletter;

class StatWeb extends BaseWidget
{
    // protected static ?string $heading = 'Statistiques globales';
    protected static ?int $sort = 0; // Position dans le dashboard

    protected function getCards(): array
    {
        return [
            Stat::make('Projets', Project::count())
                ->description('Nombre total de projets')
                ->color('primary')
                ->chart([15, 4, 10, 2, 12, 4, 12]),

            Stat::make('Utilisateurs', User::count())
                ->description('Nombre total d’utilisateurs')
                ->color('success')
                ->chart([15, 4, 10, 2, 12, 4, 12]),

            Stat::make('Souscriptions', Newsletter::count())
                ->description('Nombre total de newsletters')
                ->color('warning')
                ->chart([15, 4, 10, 2, 12, 4, 12])
        ];
    }
}

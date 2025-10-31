<?php

namespace App\Filament\Widgets;

use App\Models\Agent;
use App\Models\Client;
use App\Models\Message;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Project;
use App\Models\User;
use App\Models\Newsletter;
use App\Models\Service;

class StatWeb extends BaseWidget
{
    // protected static ?string $heading = 'Statistiques globales';
    protected static ?int $sort = 1; // Position dans le dashboard

    protected function getCards(): array
    {
        return [
            Stat::make('Utilisateurs', User::count())
                ->description('Nombre total d\'utilisateurs')
                ->color('primary')
                ->chart([0, 0]),

            Stat::make('Clients', Client::count())
                ->description('Nombre total des clients')
                ->color('warning')
                ->chart([0, 0]),

            Stat::make('Agents', Agent::count())
                ->description('Nombre total d\'agents')
                ->color('info')
                ->chart([0, 0]),

            Stat::make('Services', Service::count())
                ->description('Nombre total de services')
                ->color('success')
                ->chart([0, 0]),

            Stat::make('Pricing', Message::count())
                ->description('Nombre de prix affichés')
                ->color('primary')
                ->chart([0, 0]),

            Stat::make('Contact', Agent::count())
                ->description('Nombre total de message')
                ->color('danger')
                ->chart([0, 0]),
        ];
    }
}

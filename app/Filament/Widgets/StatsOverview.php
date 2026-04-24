<?php

namespace App\Filament\Widgets;

use App\Models\Contact;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $total    = Contact::count();
        $today    = Contact::whereDate('created_at', today())->count();
        $thisWeek = Contact::whereBetween('created_at', [now()->startOfWeek(), now()])->count();

        return [
            Stat::make('Total Leads', $total)
                ->description('All contact submissions')
                ->icon('heroicon-o-envelope')
                ->color('primary'),
            Stat::make('This Week', $thisWeek)
                ->description('New leads this week')
                ->icon('heroicon-o-calendar-days')
                ->color('success'),
            Stat::make('Today', $today)
                ->description('Leads received today')
                ->icon('heroicon-o-bell')
                ->color('warning'),
        ];
    }
}

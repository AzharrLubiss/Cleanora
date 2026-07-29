<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\Pesanan;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatistikLaundry extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Pelanggan', User::where('role', 'pelanggan')->count()),

            Stat::make('Total Pesanan', Pesanan::count()),

            Stat::make(
                'Pesanan Aktif',
                Pesanan::where('status', '!=', 'selesai')->count()
            ),

            Stat::make(
                'Pendapatan',
                'Rp ' . number_format(
                    Pesanan::where('status', 'selesai')->sum('total_harga'),
                    0,
                    ',',
                    '.'
                )
            ),
        ];
    }
}
<?php

namespace App\Filament\Widgets;

use App\Models\Pesanan;
use Filament\Widgets\ChartWidget;

class PendapatanChart extends ChartWidget
{
    protected ?string $heading = 'Grafik Pendapatan Bulanan';


    protected function getData(): array
    {
        $pendapatan = [];

        for ($bulan = 1; $bulan <= 12; $bulan++) {

            $pendapatan[] = Pesanan::whereMonth(
                    'tanggal_masuk',
                    $bulan
                )
                ->where('status', 'selesai')
                ->sum('total_harga');

        }


        return [

            'datasets' => [

                [
                    'label' => 'Pendapatan',
                    'data' => $pendapatan,
                ],

            ],


            'labels' => [

                'Jan',
                'Feb',
                'Mar',
                'Apr',
                'Mei',
                'Jun',
                'Jul',
                'Agu',
                'Sep',
                'Okt',
                'Nov',
                'Des',

            ],

        ];
    }


    protected function getType(): string
    {
        return 'bar';
    }
}
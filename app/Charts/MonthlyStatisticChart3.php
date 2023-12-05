<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class MonthlyStatisticChart3
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        return $this->chart->barChart()
            ->setTitle('Demande des 7 derniers jours.')
            // ->setSubtitle('Wins during season 2021.')
            ->addData('En attente', [6, 9, 3, 0, 4, 10, 0])
            ->addData('Confirmer', [2, 3, 1, 2, 4, 8, 0])
            ->addData('Valider', [16, 0, 3, 8, 2, 6, 0])
            ->addData('Rejeter', [0, 1, 0, 2, 2, 4, 0])
            ->setXAxis([
                '29', '30', '01', '02', "03", "04", "05",
            ]);
    }
}

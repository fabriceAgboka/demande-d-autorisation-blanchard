<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class MonthlyStatisticChart2
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\AreaChart
    {
        return $this->chart->areaChart()
            ->setTitle('Demande de l\'anée courante.')
            // ->setSubtitle('Physical sales vs Digital sales.')
            ->addData('En attente', [10, 0, 3, 100, 0, 0, 40, 93, 35, 42, 18, 82])
            ->addData('Confirmer', [20, 0, 20, 0, 40, 0, 70, 29, 77, 28, 55, 45])
            ->addData('Valider', [50, 0, 8, 0, 0, 26, 10, 25, 10, 38, 20, 8])
            ->addData('Rejeter', [3, 0, 0, 1, 0, 10, 5, 3, 10, 2, 5, 0])
            ->setXAxis(['Jan', 'Fev', 'Mars', 'Avril', 'Mai', 'Jun', 'Juil', 'Aout', 'Setp', 'Oct', 'Nov', 'Dec']);
    }
}

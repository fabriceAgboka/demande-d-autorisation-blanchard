<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class MonthlyUsersChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        return $this->chart->pieChart()
            ->setTitle('Statistic global.')
            // ->setSubtitle('Season 2021.')
            ->addData([140, 300, 350, 40])
            ->setLabels(['En attente', 'Confirmer', 'Valider', "Rejeter"]);
    }
}

<?php

namespace App\Jobs;

use App\Models\Statistic;
use App\Models\StatisticGlobal;
use App\Models\StatisticMonthly;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class StatisticGlobalJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $year;

    /**
     * Create a new job instance.
     */
    public function __construct($year=null)
    {
        $this->year = $year ?? date('Y');
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $entity = StatisticGlobal::where('year', $this->year)->first();

        if(!$entity){
            $entity = StatisticGlobal::create([
                'year'  => $this->year
            ]);
        }

        $total_demande = Statistic::where('year', $this->year)->sum('total_demande');
        $total_demande_attente = Statistic::where('year', $this->year)->sum('total_demande_attente');
        $total_demande_confirmer = Statistic::where('year', $this->year)->sum('total_demande_confirmer');
        $total_demande_valider = Statistic::where('year', $this->year)->sum('total_demande_valider');
        $total_demande_rejeter = Statistic::where('year', $this->year)->sum('total_demande_rejeter');

        $graphe_demande_total = [];
        $graphe_demande_attente = [];
        $graphe_demande_confirmer = [];
        $graphe_demande_valider = [];
        $graphe_demande_rejeter = [];
        for ($i = 1; $i <= 12; $i++) {
            $graphe_demande_total[] = Statistic::where('year', $this->year)->where('month', $i)->sum('total_demande');
            $graphe_demande_attente[] = Statistic::where('year', $this->year)->where('month', $i)->sum('total_demande_attente');
            $graphe_demande_confirmer[] = Statistic::where('year', $this->year)->where('month', $i)->sum('total_demande_confirmer');
            $graphe_demande_valider[] = Statistic::where('year', $this->year)->where('month', $i)->sum('total_demande_valider');
            $graphe_demande_rejeter[] = Statistic::where('year', $this->year)->where('month', $i)->sum('total_demande_rejeter');
        }

        $entity->update([
            "total_demande"             => $total_demande,
            "total_demande_attente"     => $total_demande_attente,
            "total_demande_confirmer"   => $total_demande_confirmer,
            "total_demande_valider"     => $total_demande_valider,
            "total_demande_rejeter"     => $total_demande_rejeter,

            "graphe_demande_total"      => json_encode($graphe_demande_total),
            "graphe_demande_attente"    => json_encode($graphe_demande_attente),
            "graphe_demande_confirmer"  => json_encode($graphe_demande_confirmer),
            "graphe_demande_valider"    => json_encode($graphe_demande_valider),
            "graphe_demande_rejeter"    => json_encode($graphe_demande_rejeter),
        ]);
    }
}

<?php

namespace App\Jobs;

use App\Models\Demande;
use App\Models\Statistic;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class StatisticJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $month;
    public $year;
    /**
     * Create a new job instance.
     */
    public function __construct($month, $year)
    {
        $this->month = $month ?? date('m');
        $this->year = $year ?? date('Y');
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $statistics = Statistic::where('month', $this->month)->first();
        if(!$statistics){
            $statistics = Statistic::create([
                'month' => $this->month
            ]);
        }

        $total_demande = Demande::whereYear('created_at', $this->year)->whereMonth('created_at', $this->month)->count()->where('status', 1)->count();
        $total_demande_attente = Demande::whereYear('created_at', $this->year)->whereMonth('created_at', $this->month)->count()->where('status', 2)->count();
        $total_demande_confirmer = Demande::whereYear('created_at', $this->year)->whereMonth('created_at', $this->month)->count()->where('status', 3)->count();
        $total_demande_valider = Demande::whereYear('created_at', $this->year)->whereMonth('created_at', $this->month)->count()->where('status', 4)->count();
        $total_demande_rejeter = Demande::whereYear('created_at', $this->year)->whereMonth('created_at', $this->month)->count()->where('status', 5)->count();

        $graphe_demande_total = [];
        $graphe_demande_attente = [];
        $graphe_demande_confirmer = [];
        $graphe_demande_valider = [];
        $graphe_demande_rejeter = [];
        for ($i = 1; $i <= 31; $i++) {
            $date = $this->year."-".$this->month."-".$i;
            $graphe_demande_total[] = Demande::whereDate('created_at', $date)->where('status', 1)->count();
            $graphe_demande_attente[] = Demande::whereDate('created_at', $date)->where('status', 2)->count();
            $graphe_demande_confirmer[] = Demande::whereDate('created_at', $date)->where('status', 3)->count();
            $graphe_demande_valider[] = Demande::whereDate('created_at', $date)->where('status', 4)->count();
            $graphe_demande_rejeter[] = Demande::whereDate('created_at', $date)->where('status', 5)->count();
        }

        $statistics->update([
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

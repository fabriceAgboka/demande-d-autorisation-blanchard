<?php

namespace App\Http\Controllers;

use App\Charts\MonthlyStatisticChart;
use App\Charts\MonthlyStatisticChart2;
use App\Charts\MonthlyStatisticChart3;
use Illuminate\Http\Request;
use App\Models\StatisticGlobal;
use App\Charts\MonthlyUsersChart;

class DashboardController extends Controller
{
    public function welcome(
        MonthlyUsersChart $chart, 
        MonthlyStatisticChart $chart2, 
        MonthlyStatisticChart2 $chart3, 
        MonthlyStatisticChart3 $chart4
    ){
        // return view('welcome');
        return view('pages.dashboard', [
            'chart' => $chart->build(),
            'chart2' => $chart2->build(),
            'chart3' => $chart3->build(),
            'chart4' => $chart4->build()
        ]);
    }

    public function dashboard(){
        $entity = StatisticGlobal::latest()->first();

        $data = [
            "graphe_demande_total"      => $entity !== null ? json_decode($entity->graphe_demande_total) : [],
            "graphe_demande_attente"    => $entity !== null ? json_decode($entity->graphe_demande_attente) : [],
            "graphe_demande_confirmer"  => $entity !== null ? json_decode($entity->graphe_demande_confirmer) : [],
            "graphe_demande_valider"    => $entity !== null ? json_decode($entity->graphe_demande_valider) : [],
            "graphe_demande_rejeter"    => $entity !== null ? json_decode($entity->graphe_demande_rejeter) : [],

            "total_demande"             => $entity->total_demande ?? 0,
            "total_demande_attente"     => $entity->total_demande_attente ?? 0,
            "total_demande_confirmer"   => $entity->total_demande_confirmer ?? 0,
            "total_demande_valider"     => $entity->total_demande_valider ?? 0,
            "total_demande_rejeter"     => $entity->total_demande_rejeter ?? 0,
        ];

        return response()->json([
            'data'    => $data,
            'success' => true,
            'message' => "Opération réussie",
        ]);
    }
}

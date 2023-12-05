<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('statistic_globals', function (Blueprint $table) {
            $table->id();
            $table->integer('month')->nullable();
            $table->integer('year')->nullable();
            $table->integer('total_demande')->nullable();
            $table->integer('total_demande_attente')->nullable();
            $table->integer('total_demande_confirmer')->nullable();
            $table->integer('total_demande_valider')->nullable();
            $table->integer('total_demande_rejeter')->nullable();

            $table->longText('graphe_demande_total')->nullable();
            $table->longText('graphe_demande_attente')->nullable();
            $table->longText('graphe_demande_confirmer')->nullable();
            $table->longText('graphe_demande_valider')->nullable();
            $table->longText('graphe_demande_rejeter')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statistic_globals');
    }
};

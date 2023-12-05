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
        Schema::table('localisations', function (Blueprint $table) {
            $table->string('nom_complet_lieu')->nullable()->default(null);
            $table->float('latitude', 15, 10)->nullable()->default(null);
            $table->float('longitude', 15, 10)->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('localisations', function (Blueprint $table) {
            $table->dropColumn('nom_complet_lieu');
            $table->dropColumn('latitude');
            $table->dropColumn('longitude');
        });
    }
};

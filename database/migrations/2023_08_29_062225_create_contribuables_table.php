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
        Schema::create('contribuables', function (Blueprint $table) {
            $table->id();
            $table->string('raison_social', 255);
            $table->string('sigle', 255)->nullable();
            $table->string('forme_juridique');
            $table->string('adresse_postale');
            $table->string('fax')->nullable();
            $table->string('email');
            $table->string('rccm');
            $table->date('date_rccm');
            $table->string('organisme_rccm');
            $table->foreignId('demande_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contribuables');
    }
};

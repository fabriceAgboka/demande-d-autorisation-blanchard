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
        Schema::create('localisations', function (Blueprint $table) {
            $table->id();
            $table->string('ville');
            $table->string('commune');
            $table->string('quartier');
            $table->string('rue');
            $table->string('lot', 10);
            $table->string('illot', 10);
            $table->string('section_cadastre', 100);
            $table->string('parcelle', 100);
            $table->string('num_tf', 100);
            $table->foreignId('demande_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('localisations');
    }
};

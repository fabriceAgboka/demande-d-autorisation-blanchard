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
        Schema::create('suivi_comptables', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['Cabinet Comptable', 'Centre de Gestion Integré']);
            $table->string('ncc')->nullable();
            $table->string('boite_postale')->nullable();
            $table->string('email', 255);
            $table->string('fax');
            $table->foreignId('demande_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suivi_comptables');
    }
};

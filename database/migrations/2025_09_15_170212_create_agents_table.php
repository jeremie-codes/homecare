<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('type', ['nounou', 'menager']);
            $table->integer('experience')->default(0);
            $table->enum('disponibilite', ['temps plein', 'temps partiel']);
            $table->decimal('tarif_horaire', 10, 2)->nullable();
            $table->string('adresse')->nullable();
            $table->enum('statut', ['disponible', 'occupé'])->default('disponible');
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agents');
    }
};

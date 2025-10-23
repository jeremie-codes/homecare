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
            $table->bigInteger('service_id')->nullable()->constrained('services')->onDelete('set null');
            $table->enum('type', ['babysitter', 'menager']);
            $table->integer('experience')->default(0);
            $table->integer('rating')->default(0);
            $table->boolean('is_badges')->default(false);
            $table->dateTime('recommended_at')->nullable();
            $table->foreignId('recommended_by')->nullable()->constrained('users')->onDelete('set null');
            $table->enum('disponibilite', ['temps plein', 'temps partiel', 'occasionnel'])->default('temps plein');
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

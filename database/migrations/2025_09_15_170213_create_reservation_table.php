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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();

            // Relations
            $table->foreignId('client_id')->constrained('clients')->onDelete('cascade');
            $table->foreignId('service_id')->constrained('services')->onDelete('cascade');
            $table->foreignId('agent_id')->nullable()->constrained('agents')->onDelete('set null');

            // Informations prestation
            $table->dateTime('date_reservation');
            $table->integer('duree')->default(1);
            $table->enum('frequence', ['heure', 'jour', 'semaine', 'mois', 'année', 'indefini'])->default('heure');
            $table->text('adresse');
            $table->integer('nombre_personnes')->default(1);
            $table->text('taches_specifiques')->nullable();

            // Infos contextuelles
            $table->string('phone')->nullable();
            $table->string('taille_logement')->nullable();   // exemple : "2 chambres" ou "150 m2"
            $table->text('conditions_particulieres')->nullable();

            // Tarification
            $table->boolean('transport_inclus')->default(false);
            $table->boolean('urgence')->default(false);

            // Suivi
            $table->enum('statut', ['en attente','confirmée','annulée'])->default('en attente');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};

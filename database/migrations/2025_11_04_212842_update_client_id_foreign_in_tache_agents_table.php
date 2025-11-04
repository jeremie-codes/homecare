<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('tache_agents', function (Blueprint $table) {
            $table->dropForeign(['client_id']);

            $table->foreign('client_id')
                ->references('id')
                ->on('clients')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('tache_agents', function (Blueprint $table) {
            // Inverser le changement (au cas où on rollback)
            $table->dropForeign(['client_id']);
            $table->foreign('client_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }
};

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

            $table->foreignId('client_id')
                  ->constrained('clients')
                  ->cascadeOnDelete();

            // Dates & heures
            $table->timestamp('date_utilisation');
            $table->timestamp('date_recuperation');
            $table->timestamp('date_sortie_stock');
            $table->timestamp('date_rendue_normale');

            // Workflow métier réel
            $table->enum('status', [
                'ordered',        // commande
                'confirmed',      // avance payée
                'out_of_stock',   // sortie stock
                'delivered',      // livré au client
                'returned',       // retourné par le client
                'stored'          // stocké à nouveau
            ])->default('ordered');

            // Traçabilité
            $table->foreignId('created_by')
                  ->constrained('users')
                  ->cascadeOnDelete();

            $table->foreignId('updated_by')
                  ->nullable()
                  ->constrained('users')
                  ->nullOnDelete();

            $table->timestamps();
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

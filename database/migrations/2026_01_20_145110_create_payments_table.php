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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('reservation_id')
                  ->constrained('reservations')
                  ->cascadeOnDelete();

            $table->decimal('total', 10, 2);       // Montant total de la réservation
            $table->decimal('advance', 10, 2);     // Montant payé en avance
            $table->decimal('remaining', 10, 2);   // Montant restant à payer
            $table->decimal('deposit', 10, 2);     // Caution
            $table->timestamp('payment_date');     // Date du paiement

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
        Schema::dropIfExists('payments');
    }
};

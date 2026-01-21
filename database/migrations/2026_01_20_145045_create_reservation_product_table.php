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
        Schema::create('reservation_product', function (Blueprint $table) {
            $table->id();

            $table->foreignId('reservation_id')
                  ->constrained('reservations')
                  ->cascadeOnDelete();

            $table->foreignId('product_id')
                  ->constrained('products')
                  ->cascadeOnDelete();

            $table->integer('quantity');

            // Statut aligné avec la réservation globale
            $table->enum('status', [
                'ordered',
                'confirmed',
                'out_of_stock',
                'delivered',
                'returned',
                'stored'
            ])->default('ordered');

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
        Schema::dropIfExists('reservation_product');
    }
};

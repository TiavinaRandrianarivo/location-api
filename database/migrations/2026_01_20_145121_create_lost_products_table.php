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
        Schema::create('lost_products', function (Blueprint $table) {
            $table->id();

            $table->foreignId('reservation_id')
                  ->constrained('reservations')
                  ->cascadeOnDelete();

            $table->foreignId('product_id')
                  ->constrained('products')
                  ->cascadeOnDelete();

            $table->integer('quantity');             // Quantité perdue/détruite
            $table->decimal('lost_price', 10, 2);   // Prix unitaire au moment de la perte

            // Statut du produit perdu
            $table->enum('status', ['lost', 'destroyed'])->default('lost');

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
        Schema::dropIfExists('lost_products');
    }
};

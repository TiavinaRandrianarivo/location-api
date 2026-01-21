<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'reservation_id',
        'product_id',
        'quantity',
        'status',               // même statut que reservation
        'stock_out_at',         // date & heure de sortie du stock
        'delivered_at',         // date & heure de livraison au client
        'returned_at',          // date & heure de retour par le client
        'created_by',
        'updated_by',
    ];

    // Relation avec Reservation
    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }

    // Relation avec Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // User qui a inséré le produit dans la réservation
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'reservation_id',
        'total_amount',     // montant total de la réservation
        'advance_amount',   // avance payée
        'remaining_amount', // reste à payer
        'deposit_amount',   // caution
        'paid_at',          // date & heure du paiement
        'created_by',
        'updated_by',
    ];

    // Relation avec Reservation
    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }

    // User qui a enregistré le paiement
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}

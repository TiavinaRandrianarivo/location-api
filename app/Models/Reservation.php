<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'reservation_date',       // date et heure de l'utilisation
        'recovery_date',          // date à laquelle le client doit récupérer les produits
        'stock_out_date',         // date de sortie des produits du stock
        'normal_return_date',     // date normale de retour
        'status',                 // commande, confirmer, sortie du stock, livrée, retourner, stocker
        'created_by',
        'updated_by',
    ];

    // Relation avec Client
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    // Relation avec User qui a créé ou modifié
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    // Relation avec ReservationProduct
    public function reservationProducts()
    {
        return $this->hasMany(ReservationProduct::class);
    }

    // Relation avec Payments
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}

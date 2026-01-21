<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LostProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'reservation_id',
        'product_id',
        'quantity',
        'status',        // perdu | detruit
        'note',          // explication (optionnel)
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

    // User qui a déclaré la perte ou destruction
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}


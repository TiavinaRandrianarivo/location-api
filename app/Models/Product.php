<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price_per_day',
        'lost_price',
        'max_quantity',
        'category_id',
        'created_by',
    ];

    // Relation avec Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relation avec User qui a créé le produit
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // Relation avec ReservationProduct (produits dans les réservations)
    public function reservationProducts()
    {
        return $this->hasMany(ReservationProduct::class);
    }

    // Relation avec LostProduct (produits perdus ou détruits)
    public function lostProducts()
    {
        return $this->hasMany(LostProduct::class);
    }
}


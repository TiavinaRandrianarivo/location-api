<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'CIN',
        'phone',
        'created_by',
        'updated_by',
    ];

    // Relation avec User qui a créé le client
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    // Relation avec reservations
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}

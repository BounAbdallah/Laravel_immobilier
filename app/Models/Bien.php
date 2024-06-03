<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bien extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'categorie',
        'image',
        'description',
        'adresse',
        'statut',
    ];

    public function biens()
    {
        return $this->hasMany(Bien::class);
    }
}

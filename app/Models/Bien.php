<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bien extends Model
{
    use HasFactory;

    //Définit les champs qui sont remplissables sur la base de données
    
    protected $fillable = [
        'nom',
        'categorie',
        'image',
        'description',
        'adresse',
        'statut',
    ];

    public function commentaires()
    {//Spécifie que le modèle actuel possède plusieurs instances du modèle `Commentaire`
        return $this->hasMany(Commentaire::class);
    }
}

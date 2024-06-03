<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Commentaire extends Model
{
    use HasFactory;

    protected $fillable = [
      'auteur',
      'contenu',
        
    ];
    public function bien():BelongsTo
    {
        return $this->belongsTo(Bien::class);
    }
}

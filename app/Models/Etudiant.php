<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_utilisateur',
        'cin',
        'genre',
        'date_naissance',
        'telephone',
        'whatsapp',
        'photo',
    ];

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'id_utilisateur');
    }
    public function inscription()
    {
        return $this->hasMany(Inscription::class, 'id_etudiant', 'id_utilisateur');
    }
}

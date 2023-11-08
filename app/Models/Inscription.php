<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_etudiant',
        'date_inscription',
        'id_module',
        'id_tarif',
    ];

    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class, 'id_etudiant', 'id_utilisateur');
    }

    public function modules()
    {
        return $this->belongsTo(Module::class, 'id_module');
    }

    public function tarifs()
    {
        return $this->belongsTo(Tarif::class, 'id_tarif');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{
    use HasFactory;
    protected $fillable = ['montant', 'id_module'];

    public function module()
    {
        return $this->belongsTo(Module::class, 'id_module');
    }
    public function inscriptions()
    {
        return $this->hasMany(Inscription::class, 'id_tarif');
    }
}

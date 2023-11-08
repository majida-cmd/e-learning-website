<?php

namespace App\Models;

use App\Models\Tarif;
use App\Models\Chapter;
use App\Models\Domaine;
use App\Models\Inscription;
use App\Models\TypeContenu;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Module extends Model
{
    use HasFactory;
    protected $fillable = ['nom','slug', 'photo', 'description', 'id_domaine', 'id_type_contenu'];

    public function domaine()
    {
        return $this->belongsTo(Domaine::class, 'id_domaine');
    }

    public function typeContenu()
    {
        return $this->belongsTo(TypeContenu::class, 'id_type_contenu');
    }
    public function tarifs()
    {
        return $this->hasMany(Tarif::class, 'id_module');
    }
    public function chapitre()
    {
        return $this->hasMany(Chapter::class, 'id_module');
    }
    public function inscription()
    {
        return $this->hasMany(Inscription::class, 'id_module');
    }
    // public function getSlugAttribute()
    // {
    //     return Str::slug($this->nom); // Assuming 'nom' is the field you want to use in the URL
    // }
}

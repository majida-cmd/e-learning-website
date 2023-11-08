<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeContenu extends Model
{
    use HasFactory;
    protected $fillable = ['nom'];

    public function modules()
    {
        return $this->hasMany(Module::class, 'id_type_contenu');
    }
}

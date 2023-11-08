<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'slug', 'description', 'photo', 'id_module'];

    public function module()
    {
        return $this->belongsTo(Module::class, 'id_module');
    }
    public function video()
    {
        return $this->hasMany(Video::class, 'id_chapitre');
    }
}


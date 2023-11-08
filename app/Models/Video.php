<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $fillable = ['url_video','id_chapitre'];
    public function chapitre()
    {
        return $this->belongsTo(Chapter::class, 'id_chapitre');
    }
}


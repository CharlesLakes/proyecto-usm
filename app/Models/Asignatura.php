<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use App\Models\Quiz;
use App\Models\Video;

class Asignatura extends Model
{
    use HasFactory;
    protected $fillable = [
        'sigla',
        'nombre',
        'description',
        'image_url'
    ];

    public function post(){
        return $this->hasMany(Post::class);
    }

    public function quiz(){
        return $this->hasMany(Quiz::class);
    }

    public function video(){
        return $this->hasMany(Video::class);
    }

    
}

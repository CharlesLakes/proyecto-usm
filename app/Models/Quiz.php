<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Asignatura;
use App\Models\User;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'user_id',
        'asignatura_id',
        'description',
        'questions'
    ];


    // Relacion con la asignatura de el quiz
    public function asignatura(){
        return $this->belongsTo(Asignatura::class);
    }
    
    // Relacion con el usuario creador de el quiz
    public function creador(){
        return $this->belongsTo(User::class);
    }

    // Relacion con los usuarios que hicieron el quiz
    public function user(){
        return $this->belongsTo(User::class);
    }
}

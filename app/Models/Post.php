<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;
use App\Models\User;


class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'asignatura_id',
        'user_id',
        'asunto'

    ];

    public function comment(){
        return $this->hasMany(Comment::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}

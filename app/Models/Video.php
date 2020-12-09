<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'asignatura_id',
        'user_id',
        'title',
        'description',
        'link'
    ];
}

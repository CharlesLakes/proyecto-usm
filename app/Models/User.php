<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Asignatura;
use App\Models\Quiz;
use App\Models\Post;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'image_user',
        'email',
        'password',
        'role',
        'email_verification'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    /*
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    */

    // Encrypta la password
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    // Detecta si exite el rol
    public function hasRole($role)
    {
        return $role == $this->role;
    }

    // Relacion con las asignaturas inscritas
    public function asignaturas(){
        return $this->belongsToMany(Asignatura::class);
    }

    // Relacion con los quiz relizados
    public function quiz(){
        return $this->belongstoMany(Quiz::class);
    }

    public function post(){
        return $this->hasMany(Post::class);
    }
}

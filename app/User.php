<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'password', 'role', 'avatar'
    ];

    protected $dates = ['created_at'];
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

   public function getAvatar()
    {
        return !$this->avatar ? asset('images/default.png') : $this->avatar; 
    }

    public function sekolah()
    {
        return $this->hasMany(Sekolah::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function prestasi()
    {
        return $this->hasMany(Prestasi::class);
    }

    public function modul()
    {
        return $this->hasMany(Modul::class);
    }

    public function gallery()
    {
        return $this->hasMany(Gallery::class);
    }

    public function testimoni()
    {
        return $this->hasMany(Testimoni::class);
    }
}

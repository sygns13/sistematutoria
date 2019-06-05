<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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
        'name', 'email', 'password', 'tipouser_id','persona_id','activo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function persona()
    {
        return $this->belongsTo('app/Persona');
    }

    public function tipouser()
    {
        return $this->belongsTo('app/Tipouser');
    }

    public function chatsHasUser()
    {
        return $this->hasMany(ChatsHasUser::class);
    }

    public function chat()
    {
        return $this->hasToMany('App\Chat','chatsHasUser');
    }


}

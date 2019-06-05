<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table='personas';

    protected $fillable=['dni','nombres','apellidos','email','telf','direccion','imagen','activo'];

    protected $guard=['id'];

    public function user()
    {
    	return $this->hasMany(User::class);
    }

    public function tutor()
    {
    	return $this->hasMany(Tutor::class);
    }

    public function alumno()
    {
    	return $this->hasMany(Alumno::class);
    }

    
}

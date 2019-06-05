<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semestre extends Model
{
    protected $table='semestres';

    protected $filable=['nomsem','inisem','finsem','activo'];

    protected $guarded=['id'];

    public function tutoralumno()
    {
    	return $this->hasMany(Tutoralumno::class);
    }
}

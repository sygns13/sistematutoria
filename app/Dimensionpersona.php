<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dimensionpersona extends Model
{
    protected $table='dimensionpersonas';

    protected $fillable=['nomdimen','desdimen','activo','borrado'];

    protected $guarded=['id'];

    public function pregunta()
    {
    	return $this->hasMany(Pregunta::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etapa extends Model
{
    protected $table='etapas';

    protected $fillable=['nometapa','activo','borrado'];

    protected $guarded=['id'];

    public function evaluacion()
    {
    	return $this->hasMany(Evaluacion::class);
    }

    public function pregunta()
    {
    	return $this->hasMany(Pregunta::class);
    }
}

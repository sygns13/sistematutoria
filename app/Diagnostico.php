<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diagnostico extends Model
{
    protected $table='diagnosticos';

    protected $fillable=['descripcion','nomdiag','fech','evaluacion_id','activo'];

    protected $guarded=['id'];

    public function tarea()
    {
    	return $this->hasMany(Tarea::class);
    }

    public function sesion()
    {
    	return $this->hasMany(Sesion::class);
    }

    public function evaluacion()
    {
    	return $this->belongsTo('app/Evaluacion');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Informe extends Model
{
    protected $table='informes';

    protected $fillable=['titulo','contenido','activo','borrado','tutoralumno_id'];

    protected $guarded=['id'];

    public function tutoralumno()
    {
    	return $this->belongsTo('app/Tutoralumno');
    }

    public function showAlumnoInforme()
    {
       $idTutorAlumno=DB::select("");
        return $idTutorAlumno;
    }


}

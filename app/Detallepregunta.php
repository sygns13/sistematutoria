<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Detallepregunta extends Model
{
    protected $table='detallepreguntas';

    protected $fillable =['pregunta_id','evaluacion_id','activo'];

    protected $guarded=['id'];

    public function resultado()
    {
    	return $this->hasMany(Resultado::class);
    }

    public function evaluacion()
    {
    	return $this->belongsTo('app/Evaluacion');
    }

    public function pregunta()
    {
    	return $this->belongsTo('app/Pregunta');
    }

    public static function showDetallePregunta($idEva)
    {
        $preguntas=DB::select("select d.id as idDetPreg, p.nombre as pregunta, di.nomdimen as dimension,p.id as idpreg
from detallepreguntas d
inner join preguntas p on p.id=d.pregunta_id
inner join dimensionpersonas di on di.id=p.dimensionpersona_id
where d.evaluacion_id='".$idEva."' order by d.id;");
        return $preguntas;
    }

    public static function showDetalleDelete($idEva)
    {
        $preguntas=DB::select("select d.id as idDetPreg, p.nombre as pregunta, di.nomdimen as dimension,p.id as idpreg
from detallepreguntas d
inner join preguntas p on p.id=d.pregunta_id
inner join dimensionpersonas di on di.id=p.dimensionpersona_id
where d.evaluacion_id='".$idEva."' and p.activo='2' order by d.id;");
        return $preguntas;
    }


}

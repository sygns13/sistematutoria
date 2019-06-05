<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Pregunta extends Model
{
    protected $table='preguntas';

    protected $fillable=['nombre','dimensionpersona_id','etapa_id','activo'];

    protected $guarded=['id'];

    public function detallepregunta()
    {
    	return $this->hasMany(Detallepregunta::class);
    }

    public function etapa()
    {
    	return $this->belongsTo('app/Etapa');
    }

    public function dimensionpersona()
    {
    	return $this->belongsTo('app/Dimensionpersona');
    }

    public static function showPreguntaDimenEta($idEta, $idDim)
    {
        $preguntas=DB::select("select p.id as idPreg, p.nombre as pregunta, d.id as idDimen, d.nomdimen as dimension, d.desdimen as desDimen, e.id as idEta, e.nometapa as etapa
from preguntas p
inner join dimensionpersonas d on d.id=p.dimensionpersona_id
inner join etapas e on e.id=p.etapa_id
where d.id='".$idDim."' and e.id='".$idEta."' and p.activo='1' and p.borrado='0' order by p.id; ");
        return $preguntas;
    }


}

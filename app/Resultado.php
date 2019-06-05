<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Resultado extends Model
{
    protected $table='resultados';

    protected $fillable=['desresultado','califresultado','detallepregunta_id','activo','borraod','estado'];

    protected $guarded=['id'];

    public function detallepregunta()
    {
    	return $this->belongsTo('app/DetallePregunta');
    }

    public static function showResultadosPreguntas($idEva)
    {
        $preguntas=DB::select("select d.id as idDetPreg, p.nombre as pregunta, di.nomdimen as dimension,p.id as idpreg, r.desresultado as resultado, r.id as idresult
            , ifnull(r.califresultado,'0') as calif
from detallepreguntas d
inner join preguntas p on p.id=d.pregunta_id
inner join dimensionpersonas di on di.id=p.dimensionpersona_id
inner join resultados r on r.detallepregunta_id=d.id
where d.evaluacion_id='".$idEva."' order by d.id;");
        return $preguntas;
    }
}

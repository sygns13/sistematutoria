<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Tarea extends Model
{
    protected $table='tareas';

    protected $fillable=['nombre','descripcion','diagnostico_id','estado','respuestas','rutaresp','activo','calif','tutoralumno_id','fechaentrega','fecharesuelta','descCalif'];

    protected $guard=['id'];

    public function diagnostico()
    {
    	return $this->belongsTo(Diagnostico::class);
    }

    public static function showTareasTutor($idTA)
    {
    	$tareas=DB::select("select e.id as id, e.deseval as deseval, e.estado as estado, e.fechatomada as fechatomada, e.fechares as fechares, et.nometapa as etapa, et.id as ideta,
            d.id as idDiag, d.descripcion as descdiag, d.nomdiag, d.fech as fechaDiag,
            t.id as idTarea, t.nombre as nombreTar, t.descripcion as desctarea, t.estado as tareaestado, t.fechaentrega as fechatarea, t.fecharesuelta as fecharesuelta
            from evaluacions e
            inner join etapas et on et.id=e.etapa_id
            inner join diagnosticos d on d.evaluacion_id=e.id
            inner join tareas t on t.diagnostico_id=d.id
            where e.tutoralumno_id='".$idTA."' and e.activo='1' and e.borrado='0' and t.activo='1' and t.borrado='0' order by e.id;");
    	
    	return $tareas;
    }

    public static function showTareaVista($idT)
    {
        $tareas=DB::select("select e.id as id, e.deseval as deseval, e.estado as estado, e.fechatomada as fechatomada, e.fechares as fechares, et.nometapa as etapa, et.id as ideta,
            d.id as idDiag, d.descripcion as descdiag, d.nomdiag, d.fech as fechaDiag,
            t.id as idTarea, t.nombre as nombreTar, t.descripcion as desctarea, t.estado as tareaestado, t.fechaentrega as fechatarea , t.fecharesuelta as fecharesuelta, t.respuestas as respuestas, t.rutaresp as rutaresp, t.calif as califTarea, t.descCalif as descCalif  
, a.id as idalum,
a.codigo as codAlumno, a.semestrecursa as semestreAlum, p.id as idper, p.dni as dnialum, p.nombres as nomalumno, p.apellidos as apealumno, ta.id as idtutoralumno
            from evaluacions e
            inner join etapas et on et.id=e.etapa_id
            inner join diagnosticos d on d.evaluacion_id=e.id
            inner join tareas t on t.diagnostico_id=d.id
            inner join tutoralumnos ta on ta.id=e.tutoralumno_id
            inner join alumnos a on a.id=ta.alumno_id
            inner join personas p on p.id=a.persona_id
            where t.id='".$idT."';");
        
        return $tareas;
    }
}

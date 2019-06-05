<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Evaluacion extends Model
{
    protected $table='evaluacions';

    protected $fillable=['deseval','tutoralumno_id','etapa_id','estado','fechatomada','fechares','activo'];

    protected $guarded=['id'];

    public function tutoralumno()
    {
    	return $this->belongsTo('app/Tutoralumno');
    }

    public function etapa()
    {
    	return $this->belongsTo('app/Etapa');
    }

    public function diagnostico()
    {
    	return $this->hasMany(Diagnostico::class);
    }

    public function detallepregunta()
    {
    	return $this->hasMany(Detallepregunta::class);
    }

    public static function showEvaluacionDiagnosticadas($idTA, $idEta)
    {
        $evaluacions=DB::select("select e.id as id, e.deseval as deseval, e.estado as estado, e.fechatomada as fechatomada, e.fechares as fechares, et.nometapa as etapa, et.id as ideta,
            d.id as idDiag, d.descripcion as descdiag, d.nomdiag, d.fech as fechaDiag
            from evaluacions e
            inner join etapas et on et.id=e.etapa_id
            inner join diagnosticos d on d.evaluacion_id=e.id
            where e.tutoralumno_id='".$idTA."' and et.id='".$idEta."' and e.activo='1' and e.borrado='0' and e.estado='5' order by e.id;");
        return $evaluacions;
    }

    public static function showEvaluacion($idTA)
    {
        $evaluacions=DB::select("select e.id as id, e.deseval as deseval, e.estado as estado, e.fechatomada as fechatomada, e.fechares as fechares, et.nometapa as etapa, et.id as ideta
            from evaluacions e
            inner join etapas et on et.id=e.etapa_id
            where e.tutoralumno_id='".$idTA."' and e.activo='1' and e.borrado='0' order by e.id;");
        return $evaluacions;
    }

    public static function showEvaluacionAlumno($idE)
    {
        $evaluacions=DB::select("select e.id as id, e.deseval as deseval, e.estado as estado, e.fechatomada as fechatomada, e.fechares as fechares, et.id as idetapa, et.nometapa as etapa, et.id as ideta, a.id as idalum, 
a.codigo as codAlumno, a.semestrecursa as semestreAlum, p.id as idper, p.dni as dnialum, p.nombres as nomalumno, p.apellidos as apealumno, ta.id as idtutoralumno
            from evaluacions e
            inner join etapas et on et.id=e.etapa_id
            inner join tutoralumnos ta on ta.id=e.tutoralumno_id
            inner join alumnos a on a.id=ta.alumno_id
            inner join personas p on p.id=a.persona_id
            where e.id='".$idE."' and e.activo='1' and e.borrado='0' order by e.id;");
        
        return $evaluacions;
    }

    public static function showEvaluacionsResolver($idUser)
    {
       $evaluacions=DB::select("(select e.id as id, e.deseval as deseval, e.estado as estado, e.fechatomada as fechatomada, e.fechares as fechares, et.id as idetapa, et.nometapa as etapa, a.id as idalum,
a.codigo as codAlumno, a.semestrecursa as semestreAlum, p.id as idper, p.dni as dnialum, p.nombres as nomalumno, p.apellidos as apealumno, ta.id as idtutoralumno, 'evaluacion' as tipo, time(e.updated_at) as hora
, time(e.created_at) as horaEval, '1' as tipoSesion , '1' as confirmado
            from evaluacions e
            inner join etapas et on et.id=e.etapa_id
            inner join tutoralumnos ta on ta.id=e.tutoralumno_id
            inner join alumnos a on a.id=ta.alumno_id
            inner join personas p on p.id=a.persona_id
inner join users u on u.persona_id=p.id
inner join semestres s on s.id=ta.semestre_id
            where u.id='".$idUser."' and e.activo='1' and e.borrado='0' and s.activo='1' and(e.estado='1' or e.estado='2'))

union

(select t.id as id, t.nombre as deseval, t.estado as estado, date(t.created_at) as fechatomada, t.fechaentrega as fechares, et.id as idetapa,  et.nometapa as etapa, a.id as idalum,
a.codigo as codAlumno, a.semestrecursa as semestreAlum, p.id as idper, p.dni as dnialum, p.nombres as nomalumno, p.apellidos as apealumno, ta.id as idtutoralumno, 'tarea' as tipo, time(t.created_at) as hora
, time(e.created_at) as horaEval, '1' as tipoSesion, '1' as confirmado
from tareas t
inner join diagnosticos d on d.id=t.diagnostico_id
inner join evaluacions e on e.id=d.evaluacion_id
inner join etapas et on et.id=e.etapa_id
inner join tutoralumnos ta on ta.id=e.tutoralumno_id
inner join alumnos a on a.id=ta.alumno_id
inner join personas p on p.id=a.persona_id
inner join users u on u.persona_id=p.id
inner join semestres s on s.id=ta.semestre_id
where u.id='".$idUser."' and t.activo='1' and t.borrado='0' and s.activo='1' and(t.estado='1' or t.estado='2'))

union

(select s.id as id, s.titulo as deseval, s.estado as estado, s.fech as fechatomada, s.fechaSesion as fechares, et.id as idetapa,  et.nometapa as etapa, a.id as idalum,
a.codigo as codAlumno, a.semestrecursa as semestreAlum, p.id as idper, p.dni as dnialum, p.nombres as nomalumno, p.apellidos as apealumno, ta.id as idtutoralumno, 'sesion' as tipo, time(s.created_at) as hora
, s.hora as horaEval, s.tipo as tipoSesion, s.confirmado as confirmado
from sesions s
inner join diagnosticos d on d.id=s.diagnostico_id
inner join evaluacions e on e.id=d.evaluacion_id
inner join etapas et on et.id=e.etapa_id
inner join tutoralumnos ta on ta.id=e.tutoralumno_id
inner join alumnos a on a.id=ta.alumno_id
inner join personas p on p.id=a.persona_id
inner join users u on u.persona_id=p.id
inner join semestres se on se.id=ta.semestre_id
where u.id='".$idUser."' and s.activo='1' and s.borrado='0' and se.activo='1' and s.fechaSesion>=curdate() and(s.estado='1' or s.estado='3'))
order by fechatomada, hora");

       return $evaluacions;
    }

    public static function showEvaluacionsResueltas($idUser)
    {
       $evaluacions=DB::select("(select e.id as id, e.deseval as deseval, e.estado as estado, e.fechatomada as fechatomada, e.fechares as fechares, et.id as idetapa, et.nometapa as etapa, a.id as idalum,
a.codigo as codAlumno, a.semestrecursa as semestreAlum, p.id as idper, p.dni as dnialum, p.nombres as nomalumno, p.apellidos as apealumno, ta.id as idtutoralumno, 'evaluacion' as tipo, time(e.updated_at) as hora
, time(e.created_at) as horaEval, '1' as tipoSesion , '1' as confirmado, '1' as sesionPasada
            from evaluacions e
            inner join etapas et on et.id=e.etapa_id
            inner join tutoralumnos ta on ta.id=e.tutoralumno_id
            inner join alumnos a on a.id=ta.alumno_id
            inner join personas p on p.id=a.persona_id
inner join users u on u.persona_id=p.id
inner join semestres s on s.id=ta.semestre_id
            where u.id='".$idUser."' and e.activo='1' and e.borrado='0' and s.activo='1' and(e.estado='3' or e.estado='4' or  e.estado='4'))

union

    (select t.id as id, t.nombre as deseval, t.estado as estado, date(t.created_at) as fechatomada, t.fechaentrega as fechares, et.id as idetapa,  et.nometapa as etapa, a.id as idalum,
    a.codigo as codAlumno, a.semestrecursa as semestreAlum, p.id as idper, p.dni as dnialum, p.nombres as nomalumno, p.apellidos as apealumno, ta.id as idtutoralumno, 'tarea' as tipo, time(t.created_at) as hora
    , time(e.created_at) as horaEval, '1' as tipoSesion, '1' as confirmado, '1' as sesionPasada
    from tareas t
    inner join diagnosticos d on d.id=t.diagnostico_id
    inner join evaluacions e on e.id=d.evaluacion_id
    inner join etapas et on et.id=e.etapa_id
    inner join tutoralumnos ta on ta.id=e.tutoralumno_id
    inner join alumnos a on a.id=ta.alumno_id
    inner join personas p on p.id=a.persona_id
    inner join users u on u.persona_id=p.id
    inner join semestres s on s.id=ta.semestre_id
    where u.id='".$idUser."' and t.activo='1' and t.borrado='0' and s.activo='1' and(t.estado='3' or t.estado='4'))

union

(select s.id as id, s.titulo as deseval, s.estado as estado, s.fech as fechatomada, s.fechaSesion as fechares, et.id as idetapa,  et.nometapa as etapa, a.id as idalum,
a.codigo as codAlumno, a.semestrecursa as semestreAlum, p.id as idper, p.dni as dnialum, p.nombres as nomalumno, p.apellidos as apealumno, ta.id as idtutoralumno, 'sesion' as tipo, time(s.created_at) as hora
, s.hora as horaEval, s.tipo as tipoSesion, s.confirmado as confirmado, if(s.fechaSesion<curdate(),'1','0') as sesionPasada
from sesions s
inner join diagnosticos d on d.id=s.diagnostico_id
inner join evaluacions e on e.id=d.evaluacion_id
inner join etapas et on et.id=e.etapa_id
inner join tutoralumnos ta on ta.id=e.tutoralumno_id
inner join alumnos a on a.id=ta.alumno_id
inner join personas p on p.id=a.persona_id
inner join users u on u.persona_id=p.id
inner join semestres se on se.id=ta.semestre_id
where u.id='".$idUser."' and s.activo='1' and s.borrado='0' and se.activo='1' and s.fechaSesion<curdate() )
order by fechatomada, hora");

       return $evaluacions;
    }
}

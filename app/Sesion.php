<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Sesion extends Model
{
    protected $table='sesions';

    protected $fillable=['titulo','detalles','fech','diagnostico_id','estado','desresultados','activo','fechaSesion','tipo','hora','tutoralumno_id','califTutor','califAlumno','descCalifAlumno','confirmado','fechaConfir'];

    protected $guarded=['id'];

    public function diagnostico()
    {
    	return $this->belongsTo(Diagnostico::class);
    }

    public static function showSesionsTutors($idTA)
    {
    	$sesions=DB::select("select e.id as id, e.deseval as deseval, e.estado as estado, e.fechatomada as fechatomada, e.fechares as fechares, et.nometapa as etapa, et.id as ideta,
            d.id as idDiag, d.descripcion as descdiag, d.nomdiag, d.fech as fechaDiag,
            s.id as idSesion, s.titulo as nombresesion, s.estado as estadosesion, s.fechaSesion as fechasesion, s.tipo as tiposesion, s.hora as horasesion,
            if(s.fechaSesion<curdate(),'1','0') as sesionPasada, s.confirmado as confirmado, s.fechaConfir as fechaConfir
            from evaluacions e
            inner join etapas et on et.id=e.etapa_id
            inner join diagnosticos d on d.evaluacion_id=e.id
            inner join sesions s on s.diagnostico_id=d.id
            where e.tutoralumno_id='".$idTA."' and e.activo='1' and e.borrado='0' and s.activo='1' and s.borrado='0' order by e.id;");
    	
    	return $sesions;
    }

    public static function showSesionVista($idS)
    {
        $sesion=DB::select("select e.id as id, e.deseval as deseval, e.estado as estado, e.fechatomada as fechatomada, e.fechares as fechares, et.nometapa as etapa, et.id as ideta,
            d.id as idDiag, d.descripcion as descdiag, d.nomdiag, d.fech as fechaDiag,
            s.id as idSesion, s.titulo as nombresesion, s.estado as estadosesion, s.fechaSesion as fechasesion, s.tipo as tiposesion, s.hora as horasesion, s.desresultados as resultSesion, s.detalles as detallesSesion, s.califTutor,
            if(s.fechaSesion<curdate(),'1','0') as sesionPasada, s.confirmado as confirmado, s.fechaConfir as fechaConfir, s.descCalifAlumno
                , a.id as idalum,
a.codigo as codAlumno, a.semestrecursa as semestreAlum, p.id as idper, p.dni as dnialum, p.nombres as nomalumno, p.apellidos as apealumno, ta.id as idtutoralumno
            from evaluacions e
            inner join etapas et on et.id=e.etapa_id
            inner join diagnosticos d on d.evaluacion_id=e.id
            inner join sesions s on s.diagnostico_id=d.id
            inner join tutoralumnos ta on ta.id=e.tutoralumno_id
            inner join alumnos a on a.id=ta.alumno_id
            inner join personas p on p.id=a.persona_id
            where s.id='".$idS."';");
        
        return $sesion;
    }
}

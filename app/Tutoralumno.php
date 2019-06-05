<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Tutoralumno extends Model
{
    protected $table='tutoralumnos';

    protected $fillable=['tutor_id','semestre_id','alumno_id'];

    protected $guarded=['id'];

    public function semestre()
    {
    	return $this->belongsTo('app/Semestre');
    }

    public function tutor()
    {
    	return $this->belongsTo('app/Tutor');
    }

    public function alumno()
    {
    	return $this->belongsTo('app/Alumno');
    }

       public static function showTutorsAlumnos()
    {
        $tutors=DB::select("select p.id as idper,t.id as idtutor,u.id as idusu, p.nombres as nombres, p.apellidos as apellidos, p.dni,
t.especialidad as esptutor, t.video as video, t.activo as tactivo, t.borrado as tborrado,
p.direccion as direccion, p.tipoDocu,
            p.telf as telf,p.email as correo, p.imagen as imagen, p.genero as genero,
u.name,u.email,
(select count(ta.id) from tutoralumnos ta inner join semestres s on s.id=ta.semestre_id where t.id=ta.tutor_id and s.activo='1') totalAsesorados
            from personas p
            inner join tutors t on t.persona_id=p.id
            inner join users u on u.persona_id=p.id
            where t.borrado='0' and t.activo='1'
            group by t.id
            order by 5,4,2 ;");
        return $tutors;
    }

    public static function showTutorPersona($idT)
    {
        $tutors=DB::select("select p.id as idper,t.id as idtutor,u.id as idusu, p.nombres as nombres, p.apellidos as apellidos, p.dni,
t.especialidad as esptutor, t.video as video, t.activo as tactivo, t.borrado as tborrado,
p.direccion as direccion, p.tipoDocu,
p.telf as telf,p.email as correo, p.imagen as imagen, p.genero as genero,
u.name,u.email,
count(ta.id) totalAsesorados
from personas p
inner join tutors t on t.persona_id=p.id
inner join users u on u.persona_id=p.id
left join tutoralumnos ta on t.id=ta.tutor_id
left join semestres s on s.id=ta.semestre_id 
where t.borrado='0' and t.activo='1' and s.activo='1' and s.activo='1' and t.id='".$idT."';");
        return $tutors;
    }


    public static function showAlumnosTutoreados($idT)
    {
        $alumnosTut=DB::select("select p.id as idper,a.id as idalum,u.id as idusu,a.codigo as codigo, p.nombres as nombres, p.apellidos as apellidos, a.semestrecursa as semestre, p.direccion as direccion,
            p.telf as telf,p.email as correo, p.imagen as imagen, p.genero as genero, ta.id as idTA
            from personas p
            inner join alumnos a on a.persona_id=p.id
            inner join users u on u.persona_id=p.id
            inner join tutoralumnos ta on ta.alumno_id=a.id
            inner join semestres s on s.id=ta.semestre_id
            where a.activo='1' and a.borrado='0' and ta.tutor_id='".$idT."' and s.activo='1'
            order by 5,4,3 ;");
        return $alumnosTut;
    }

    public static function showAlumnosGeneral()
    {
        $alumnos=DB::select("select p.id as idper,a.id as idalum,u.id as idusu,a.codigo as codigo, p.nombres as nombres, p.apellidos as apellidos, a.semestrecursa as semestre, p.direccion as direccion,
            p.telf as telf,p.email as correo, p.imagen as imagen, p.genero as genero,
            ifnull((select ta.id from tutoralumnos ta inner join semestres s on s.id=ta.semestre_id where ta.borrado='0' and ta.activo='1' and s.activo='1' and ta.alumno_id=a.id),'0') as tutorAlumno
            from personas p
            inner join alumnos a on a.persona_id=p.id
            inner join users u on u.persona_id=p.id
            where a.activo='1' and a.borrado='0'
            order by 5,4,3 ;");
        return $alumnos;
    }

    public static function showTutorDeAlumno($idUAlum)
    {
       $tutorAlumno=DB::select("select p.id as idper,t.id as idtutor,u.id as idusu, p.nombres as nombres, p.apellidos as apellidos, p.dni,
t.especialidad as esptutor, t.video as video, t.activo as tactivo, t.borrado as tborrado,
p.direccion as direccion, p.tipoDocu,
p.telf as telf,p.email as correo, p.imagen as imagen, p.genero as genero,
u.name,u.email,
count(ta.id) totalAsesorados, ta.id as idTA
from personas p
inner join tutors t on t.persona_id=p.id
inner join users u on u.persona_id=p.id
inner join tutoralumnos ta on t.id=ta.tutor_id
inner join semestres s on s.id=ta.semestre_id
inner join alumnos a on a.id=ta.alumno_id
inner join personas pe on pe.id=a.persona_id
inner join users us on us.persona_id=pe.id
where t.borrado='0' and t.activo='1' and s.activo='1' and s.activo='1' and us.id='".$idUAlum."';");

        return $tutorAlumno;
    }



}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Tutor extends Model
{
    protected $table='tutors';

    protected $fillable=['especialidad','persona_id','video','activo'];

    protected $guarded=['id'];

    public function tutoralumno()
    {
    	return $this->hasMany(Tutoralumno::class);
    }

    public function persona()
    {
    	return $this->belongsTo('app/Persona');
    }

    public static function showTutors()
    {
        $tutors=DB::select("select p.id as idper,t.id as idtutor,u.id as idusu, p.nombres as nombres, p.apellidos as apellidos, p.dni,
t.especialidad as esptutor, t.video as video, t.activo as tactivo, t.borrado as tborrado,
t.especialidad as esptutor, t.video as video, t.activo as tactivo, t.borrado as tborrado,
p.direccion as direccion, p.tipoDocu,
            p.telf as telf,p.email as correo, p.imagen as imagen, p.genero as genero,
u.name,u.email
            from personas p
            inner join tutors t on t.persona_id=p.id
            inner join users u on u.persona_id=p.id
            where t.borrado='0'
            order by 5,4,2 ;");
        return $tutors;
    }

    public static function showTutorPersona($idT)
    {
        $tutors=DB::select("select p.id as idper,t.id as idtutor,u.id as idusu, p.nombres as nombres, p.apellidos as apellidos, p.dni,
t.especialidad as esptutor, t.video as video, t.activo as tactivo, t.borrado as tborrado,
t.especialidad as esptutor, t.video as video, t.activo as tactivo, t.borrado as tborrado,
p.direccion as direccion, p.tipoDocu as tipodoc,
            p.telf as telf,p.email as correo, p.imagen as imagen, p.genero as genero,
u.name,u.email
            from personas p
            inner join tutors t on t.persona_id=p.id
            inner join users u on u.persona_id=p.id
            where  t.borrado='0' and t.id='".$idT."';");
        return $tutors;
    }

     public static function showTutorIndex($idU)
    {
        $tutors=DB::select("select p.id as idper,t.id as idtutor,u.id as idusu, p.nombres as nombres, p.apellidos as apellidos, p.dni,
t.especialidad as esptutor, t.video as video, t.activo as tactivo, t.borrado as tborrado,
t.especialidad as esptutor, t.video as video, t.activo as tactivo, t.borrado as tborrado,
p.direccion as direccion, p.tipoDocu as tipodoc,
            p.telf as telf,p.email as correo, p.imagen as imagen, p.genero as genero,
u.name,u.email
            from personas p
            inner join tutors t on t.persona_id=p.id
            inner join users u on u.persona_id=p.id
            where  t.borrado='0' and u.id='".$idU."';");

        $idTutor="";
        foreach ($tutors as $dato) {
            $idTutor=$dato->idtutor;
        }
        return $idTutor;
    }



}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Alumno extends Model
{
    protected $table = 'alumnos';
    protected $fillable=['codigo','semestrecursa', 'persona_id',' asignado','activo'];
    protected $guarded = ['id'];

    public function tutoralumno()
    {
    	return $this->hasMany(Tutoralumno::class);
    }

    public function persona()
 	{
 		return $this->belongsTo('App\Persona');
 	}

 	public static function showAlumno($idP)
    {
        $alumno=DB::select("select p.id as idPer, p.dni, p.apellidos, p.nombres, p.genero, p.telf, p.direccion, p.imagen, a.id as idalumno, a.codigo, a.semestrecursa,
u.id as iduser, u.name, u.email
from personas p
inner join alumnos a on p.id=a.persona_id
inner join users u on u.persona_id=p.id where p.id='".$idP."';");
        return $alumno;
    }

    public static function showAlumnoUser($idU)
    {
        $alumno=DB::select("select p.id as idper,a.id as idalum,u.id as idusu,a.codigo as codigo, p.dni as DNI, p.nombres as nombres, p.apellidos as apellidos, a.semestrecursa as semestre, p.direccion as direccion,
            p.telf as telf,p.email as correo, p.imagen as imagen, p.genero as genero, u.name as username, u.password as psw, p.imagen as ruta
            from personas p
            inner join alumnos a on a.persona_id=p.id
            inner join users u on u.persona_id=p.id
            where
            u.id='".$idU."';");
        return $alumno;
    }


}



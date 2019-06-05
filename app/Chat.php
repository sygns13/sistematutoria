<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Chat extends Model
{
    protected $table = 'chats';
    protected $fillable = ['fecha', 'hora', 'mensaje', 'envia','borrado','user_id','tutoralumno_id'];
    protected $guarded = ['id'];

    
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function Tutoralumno()
    {
        return $this->belongsTo('App\Tutoralumno');
    }

    public static function messages($idTA)
    {
        $messages=DB::select("select p.id as idper, p.nombres as nombres, p.apellidos as apellidos, u.name, tu.nombre, u.email, c.fecha, c.hora, c.mensaje, tu.id as idtu, p.imagen, p.genero
from chats c
inner join users u on u.id=c.user_id
inner join personas p on u.persona_id=p.id
inner join tipousers tu on tu.id=u.tipouser_id
where c.tutoralumno_id='".$idTA."' and c.borrado='0' order by c.fecha, c.hora limit 100;");
        return $messages;
    }

 
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inhabilitacion extends Model
{
    protected $table='inhabilitacions';

    protected $fillable=['dni','documento','fechaemi','motivo','tipo','obs','fechaini','fechafin','user_id','tutor_id','activo','borrado'];

    protected $guard=['id'];

    public function user()
    {
    	return $this->belongsTo('app/User');
    }

    public function tutor()
    {
    	return $this->belongsTo('app/Tutor');
    }
}

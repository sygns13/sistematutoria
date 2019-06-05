<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipouser extends Model
{
    protected $table='tipousers';

    protected $fillable=['nombre','descripcion','activo'];

    protected $guarded=['id'];

    public function user()
    {
    	return $this->hasMany(User::class);
    }
}

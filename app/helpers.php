<?php
function nombremes($mes){
	setlocale(LC_TIME, 'spanish');
	$nombre=strftime("%B",mktime(0, 0, 0, $mes, 1, 2000));
	return $nombre;
  }

function getFecha(){
	$date = Carbon\Carbon::now();
	$date = $date->format('d-m-Y');
	return $date;
}


function hoy()
{
	$date = Carbon\Carbon::now();
	$mes=nombremes($date->format('m'));
	$dia=$date->format('d');
	$anio=$date->format('Y');
	return ''.$dia.' de '.strtolower($mes).' '.$anio;
}

function accesoUser($array=[])
	{
		foreach ($array as $key) {
			if ($key==Auth::user()->tipouser_id) {
				return true;
			}
		}
		return false;
	}




function pasFechaBD($fecha)
{	
	$fechadev="";
	if(strlen($fecha)==10)
	{
	$fechadev=substr($fecha, -4).'-'.substr($fecha, -7,2).'-'.substr($fecha, -10,2);
	}
	return $fechadev;
}

function pasFechaVista($fecha)
{	
	$fechadev="";
	if(strlen($fecha)==10)
	{
	$fechadev=substr($fecha, -2).'/'.substr($fecha, -5,2).'/'.substr($fecha, -10,4);
	}
	return $fechadev;
}

function genero($sexo)
{
	$genero="";
	if($sexo==2)
	{
		$genero="FEMENINO";
	}
	elseif($sexo==1)
	{
		$result="MASCULINO";
	}

	return $genero;
}

function estadoCivil($ecivil,$sexo)
{
	$result="";
	if($ecivil==0 && $sexo==1)
	{
		$result="SIN DATOS";
	}elseif($ecivil==1 && $sexo==1)
	{
		$result="SOLTERO";
	}elseif($ecivil==2 && $sexo==1)
	{
		$result="CASADO";
	}elseif($ecivil==3 && $sexo==1)
	{
		$result="VIUDO";
	}elseif($ecivil==4 && $sexo==1)
	{
		$result="DIVORCIADO";
	}

	if($ecivil==0 && $sexo==2)
	{
		$result="SIN DATOS";
	}elseif($ecivil==1 && $sexo==2)
	{
		$result="SOLTERA";
	}elseif($ecivil==2 && $sexo==2)
	{
		$result="CASADA";
	}elseif($ecivil==3 && $sexo==2)
	{
		$result="VIUDA";
	}elseif($ecivil==4 && $sexo==2)
	{
		$result="DIVORCIADA";
	}

	return $result;
}

?>
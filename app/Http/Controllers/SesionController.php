<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Tutor;
use App\User;
use App\Persona;
use App\Alumno;
use App\Tutoralumno;
use App\Inhabilitacion;
use App\Semestre;
use App\Informe;
use App\Evaluacion;
use App\Etapa;
use App\Dimensionpersona;
use App\Pregunta;
use App\Detallepregunta;
use App\Resultado;
use Storage;
use App\Tipouser;
use App\Tarea;
use App\Sesion;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Validation\Rule;

class SesionController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function verSesion(Request $data)
    {
        $idS=$data->idS;

        $sesion=Sesion::showSesionVista($idS);


        return response()->json(["view"=>view('adminlte::alumnoSesion',compact('sesion'))->render()]);
    }


    public function saveParticipacion(Request $data)
    {
        $idS=$data->idS;
        $fecnow = date('Y/m/d');

        $confirmarSesion=Sesion::find($idS);
        $confirmarSesion->confirmado="1";
        $confirmarSesion->fechaConfir=$fecnow;

        $confirmarSesion->save();

        $sesion=Sesion::showSesionVista($idS);


        return response()->json(["view"=>view('adminlte::alumnoSesion',compact('sesion'))->render()]);
    }

    public function soliCancelacion(Request $data)
    {
        $idS=$data->idS;
        $contenido=$data->v1;

        $fecnow = date('Y/m/d');

        $confirmarSesion=Sesion::find($idS);
        $confirmarSesion->descCalifAlumno=$contenido;
        $confirmarSesion->confirmado="2";
        $confirmarSesion->fechaConfir=$fecnow;
        
        $confirmarSesion->save();

        $sesion=Sesion::showSesionVista($idS);


        return response()->json(["view"=>view('adminlte::alumnoSesion',compact('sesion'))->render()]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function verMasSesion(Request $data)
    {
        $idS=$data->idS;

        $sesion=Sesion::showSesionVista($idS);


        return response()->json(["view"=>view('adminlte::alumnoVerMasSesion',compact('sesion'))->render()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function homePerfil1Alumno(Request $data)
    {   
        $iduser=Auth::user()->id;
         $evaluacionRes=Evaluacion::showEvaluacionsResueltas($iduser);

        return response()->json(["view"=>view('adminlte::alumnoHistoricos',compact('evaluacionRes'))->render()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

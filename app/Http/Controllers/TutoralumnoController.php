<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Tutor;
use App\User;
use App\Tutoralumno;
use App\Alumno;
use App\Persona;
use App\Semestre;
use App\Inhabilitacion;
use DB;
use Illuminate\Http\Response;
use Storage;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Validation\Rule;
use Validator;
use Auth;
use App\Tipouser;

class TutoralumnoController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(accesoUser([1,2])){
        $semestre=Semestre::where('activo','1')->get();

        $tutorAlumno=Tutoralumno::showTutorsAlumnos();

        return view('tutoralumnos.index',compact('semestre','tutorAlumno'));
    }
    else
        {



            return view('adminlte::home');
            
        }


        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function asignar(Request $data)
    {
        $idP=$data->idP;
        $idT=$data->idT;
        $idU=$data->idU;

        $semestre=Semestre::where('activo','1')->get();
        $tutor=Tutoralumno::showTutorPersona($idT);
        $alumnosTut=Tutoralumno::showAlumnosTutoreados($idT);
        $alumnosGen=Tutoralumno::showAlumnosGeneral();

return response()->json(["view1"=>view('tutoralumnos.controltutor',compact('semestre','tutor','alumnosTut'))->render(),"view2"=>view('tutoralumnos.funcion',compact('alumnosGen'))->render()]);

    }



    public function asignarAlumno(Request $data)
    {
        $idP=$data->idP;
        $idT=$data->idT;
        $idU=$data->idU;

        $idPA=$data->idAP;
        $idAA=$data->idAA;
        $idUA=$data->idUA;

        $semestre=Semestre::where('activo','1')->get();

        $idS="";
        foreach ($semestre as $dato) {
             $idS=$dato->id;
        }

        $AsignarTutor=new Tutoralumno();

        $AsignarTutor->tutor_id=$idT;
        $AsignarTutor->semestre_id=$idS;
        $AsignarTutor->alumno_id=$idAA;

        $AsignarTutor->activo="1";
        $AsignarTutor->borrado="0";

        $AsignarTutor->save();


        $tutor=Tutoralumno::showTutorPersona($idT);
        $alumnosTut=Tutoralumno::showAlumnosTutoreados($idT);
        $alumnosGen=Tutoralumno::showAlumnosGeneral();

return response()->json(["view1"=>view('tutoralumnos.controltutor',compact('semestre','tutor','alumnosTut'))->render(),"view2"=>view('tutoralumnos.funcion',compact('alumnosGen'))->render()]);

    }


    public function quitarAlumno(Request $data)
    {
        $idP=$data->idP;
        $idT=$data->idT;
        $idU=$data->idU;

        $idPA=$data->idAP;
        $idAA=$data->idAA;
        $idUA=$data->idUA;

        $idTA=$data->idTA;


        $delete=Tutoralumno::destroy($idTA);

        $semestre=Semestre::where('activo','1')->get();

       

        $tutor=Tutoralumno::showTutorPersona($idT);
        $alumnosTut=Tutoralumno::showAlumnosTutoreados($idT);
        $alumnosGen=Tutoralumno::showAlumnosGeneral();

return response()->json(["view1"=>view('tutoralumnos.controltutor',compact('semestre','tutor','alumnosTut'))->render(),"view2"=>view('tutoralumnos.funcion',compact('alumnosGen'))->render()]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

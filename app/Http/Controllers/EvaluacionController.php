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
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Validation\Rule;

class EvaluacionController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function verEval(Request $data)
    {
        $idE=$data->idE;

        $eval=Evaluacion::find($idE);

        $eval->estado='2';

        $eval->save();


        $evaluacion=Evaluacion::showEvaluacionAlumno($idE);

        $preguntas=Detallepregunta::showDetallePregunta($idE);

      



        return response()->json(["view"=>view('adminlte::alumnoPreguntas',compact('evaluacion','preguntas'))->render()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function homeAlumno(Request $data)
    {
                 $iduser=Auth::user()->id;
                $alumno=Alumno::showAlumnoUser($iduser);
                $tutorAlumno=Tutoralumno::showTutorDeAlumno($iduser);
                $evaluacion=Evaluacion::showEvaluacionsResolver($iduser);
                $evaluacionRes=Evaluacion::showEvaluacionsResueltas($iduser);

        return response()->json(["view1"=>view('adminlte::alumnoPerfil0',compact('alumno','tutorAlumno','evaluacion'))->render(),"view2"=>view('adminlte::alumnoPerfil1',compact('alumno','tutorAlumno','evaluacion','evaluacionRes'))->render()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function responderEval(Request $data)
    {
        $idE=$data->v1;
        $idPregs=json_decode(stripslashes($data->v2));
        $respuestas=json_decode(stripslashes($data->v3));

        $eval=Evaluacion::find($idE);

        $eval->estado='3';

        $eval->save();

        $longitud1 = count($idPregs);

        $html='0';
        $msj='1';
        $selector="";

         $cont2=0;

       for($i=0; $i<$longitud1; $i++)
        {

                $newResultado=new Resultado();

                    $newResultado->desresultado=$respuestas[$cont2];
                    $newResultado->detallepregunta_id=$idPregs[$cont2];
                    $newResultado->estado='1';

                    $newResultado->activo='1';
                    $newResultado->borrado='0';

                $newResultado->save();


                $cont2++;
            
        }

return response()->json(['html'=>$html,'msj'=>$msj,'selector'=>$selector]);
    }

    public function verMasEvaluacion(Request $data)
    {
        $idE=$data->idE;

        $evaluacion=Evaluacion::showEvaluacionAlumno($idE);

        $preguntas=Resultado::showResultadosPreguntas($idE);

          $notaProm=0;
        $cont=0;
        foreach ($preguntas as $dato) {
            $notaProm=$notaProm+floatval($dato->calif);
            $cont++;
        }
        if($notaProm>0)
        {
            $notaProm=$notaProm/$cont;
        }
        
        return response()->json(["view"=>view('adminlte::alumnoVerMasEvaluacion',compact('evaluacion','preguntas','notaProm'))->render()]);
    }


    
}

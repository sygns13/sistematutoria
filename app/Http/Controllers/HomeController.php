<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

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
use App\Diagnostico;
use App\Tarea;
use App\Sesion;
use DateTime;
use Storage;
use App\Tipouser;
use App\Chat;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Validation\Rule;



/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {

        $iduser=Auth::user()->id;

        $numuser=User::where('id',$iduser)->where('activo','1')->where('borrado','0')->count();

        if($numuser=='1'){
            //DB::statement("call Iniciarelementos();");
           
            if(accesoUser([1,2])){
                return view('adminlte::home');

            }elseif(accesoUser([3])){

                $idT=Tutor::showTutorIndex($iduser);

                $alumnosTut=Tutoralumno::showAlumnosTutoreados($idT);
                return view('adminlte::home',compact('alumnosTut'));
            }elseif(accesoUser([4])){



                $alumno=Alumno::showAlumnoUser($iduser);
                $tutorAlumno=Tutoralumno::showTutorDeAlumno($iduser);
                $evaluacion=Evaluacion::showEvaluacionsResolver($iduser);
                $evaluacionRes=Evaluacion::showEvaluacionsResueltas($iduser);

                return view('adminlte::alumno',compact('alumno','tutorAlumno','evaluacion','evaluacionRes'));
            }



        }
        else{
            Auth::logout();

          return redirect()->back()
            ->withErrors([
                'email' => 'El usuario del sistema se encuentra desactivado, comuncarse con el administrador del sistema.'
            ]);
        }


        
        return view('adminlte::home');

    }

    public function mensaje(Request $data)
    {
        $idP=$data->idP;
        $idT=$data->idT;
        $idU=$data->idU;

        $alumno=Alumno::showAlumno($idP);

        return response()->json(["view"=>view('adminlte::email',compact('idP','alumno'))->render()]);
        # code...
    }

    public function home(Request $data)
    {
        $iduser=Auth::user()->id;

        $idT=Tutor::showTutorIndex($iduser);

        $alumnosTut=Tutoralumno::showAlumnosTutoreados($idT);

        return response()->json(["view"=>view('adminlte::panelIni',compact('alumnosTut'))->render()]);
        

    }

    public function cargarInf(Request $data)
    {
        $idP=$data->idP;
        $idA=$data->idA;
        $idU=$data->idU;

        $idTA=$data->idTA;

        $alumno=Alumno::showAlumno($idP);

        $informes=Informe::where('tutoralumno_id',$idTA)->where('activo','1')->where('borrado','0')->get();

        return response()->json(["view"=>view('adminlte::informe',compact('idTA','alumno','idP','idA','idU'))->render(),"view1"=>view('adminlte::tabla',compact('informes'))->render()]);
        # code...
    }

    public function saveInf(Request $data)
    {
        $txtTitulo=$data->txtTitulo;
        $txtContenido=$data->txtContenido;
        $idTA=$data->idTA;

            $informe=new Informe;

            $informe->titulo=$txtTitulo;
            $informe->contenido=$txtContenido;

            $informe->activo='1';
            $informe->borrado='0';

            $informe->tutoralumno_id=$idTA;

            $informe->save();

            $html="";

            $aux="1";

            $informes=Informe::where('tutoralumno_id',$idTA)->where('activo','1')->where('borrado','0')->get();

            return response()->json(["view1"=>view('adminlte::tabla',compact('informes'))->render(),'html'=>$html,'aux'=>$aux ]);

    }

    public function verMasInforme(Request $data)
    {
        $txtTitulo=$data->txtTitulo;
        $idI=$data->idI;
        $txtidP=$data->txtidP;

        $fecnow = date('d/m/Y');

        $informe=Informe::find($idI);
        $persona=Persona::find($txtidP);

        return response()->json(['informe'=>$informe,'persona'=>$persona, 'fecnow'=>$fecnow ]);
    }

    public function cargar(Request $data)
    {
        $txtTitulo=$data->txtTitulo;
        $idI=$data->idI;
        $txtidP=$data->txtidP;

        $informe=Informe::find($idI);
        $persona=Persona::find($txtidP);

        return response()->json(["view"=>view('adminlte::editarInforme',compact('informe','persona'))->render(),'informe'=>$informe]);
    }

    public function editInf(Request $data)
    {
        $txtTitulo=$data->txtTitulo;
        $txtContenido=$data->txtContenido;
        $idI=$data->idI;

            $informe=Informe::find($idI);

            $informe->titulo=$txtTitulo;
            $informe->contenido=$txtContenido;

            $informe->save();

            $idTA=$informe->tutoralumno_id;

            $html="";

            $aux="1";

            $informes=Informe::where('tutoralumno_id',$idTA)->where('activo','1')->where('borrado','0')->get();

            return response()->json(["view1"=>view('adminlte::tabla',compact('informes'))->render(),'html'=>$html,'aux'=>$aux ]);

    }

    public function destroy(Request $data)
    {
        $txtTitulo=$data->txtTitulo;
        $txtContenido=$data->txtContenido;
        $idI=$data->idI;

            $informe=Informe::find($idI);

            $informe->borrado='1';

            $informe->save();

            $idTA=$informe->tutoralumno_id;

            $html="";

            $aux="1";

            $msj="Se eliminó exitosamente la Evaluacion";

            $informes=Informe::where('tutoralumno_id',$idTA)->where('activo','1')->where('borrado','0')->get();

            return response()->json(["view1"=>view('adminlte::tabla',compact('informes'))->render(),'html'=>$html,'aux'=>$aux ,'msj'=>$msj]);

    }

    public function cargarEval(Request $data)
    {
        $idP=$data->idP;
        $idA=$data->idA;
        $idU=$data->idU;

        $idTA=$data->idTA;

        $alumno=Alumno::showAlumno($idP);

        $evaluacions=Evaluacion::showEvaluacion( $idTA);

        $etapas=Etapa::where('activo','1')->where('borrado','0')->get();

        return response()->json(["view"=>view('adminlte::evaluacion',compact('idTA','alumno','idP','idA','idU','etapas'))->render(),"view1"=>view('adminlte::tablaEvaluacion',compact('evaluacions'))->render()]);
        # code...
    }

    public function cargarPreguntasEval(Request $data)
    {
        $idP=$data->idP;
        $idA=$data->idA;
        $idEta=$data->idEta;

        $idTA=$data->idTA;

        $etapa=Etapa::find($idEta);

        $fecnow = date('d/m/Y');


        $dimensiones=Dimensionpersona::where('activo','1')->where('borrado','0')->get();
        $idDim=0;

        foreach ($dimensiones as $key => $dato) {
            $idDim=$dato->id;
            break;
        }

        //$preguntas=Pregunta::where('dimensionpersona_id',$idDim)->where('etapa_id',$idEta)->where('activo','1')->where('borrado','0')->get();

        $preguntas=Pregunta::showPreguntaDimenEta($idEta,$idDim);


        $alumno=Alumno::showAlumno($idP);


        return response()->json(["view"=>view('adminlte::preguntasEval',compact('idTA','alumno','idP','idA','idU','etapa','dimensiones','preguntas','fecnow'))->render()]);
        # code...
    }

    public function cambiarDimen(Request $data)
    {
        $idDim=$data->v1;
        $idEta=$data->v2;

        $preguntas=Pregunta::showPreguntaDimenEta($idEta,$idDim);

        return response()->json(["view"=>view('adminlte::bancoPreguntas',compact('preguntas'))->render()]);

    }

    public function saveEval(Request $data)
    {
       $idTA=$data->v1;
       $idEta=$data->v2;
       $titulo=$data->v3;
       $idPregs=json_decode(stripslashes($data->v4));
       $idDim=json_decode(stripslashes($data->v5));
       $newPreg=json_decode(stripslashes($data->v6));

       $longitud1 = count($idPregs);

        $html='0';
        $msj='1';
        $selector="";



       $cont2=0;
       for($i=0; $i<$longitud1; $i++)
        {
            if(strval($idPregs[$i])=="0")
            {
                $newPregunta=new Pregunta();

                    $newPregunta->nombre=$newPreg[$cont2];
                    $newPregunta->dimensionpersona_id=$idDim[$cont2];
                    $newPregunta->etapa_id=$idEta;

                    $newPregunta->activo='2';
                    $newPregunta->borrado='0';

                $newPregunta->save();

                $idPregs[$i]=strval($newPregunta->id);
                $cont2++;
            }
        }

        $fecnow = date('Y/m/d');
        $newEvaluacion= new Evaluacion();

         $newEvaluacion->deseval=$titulo;
         $newEvaluacion->tutoralumno_id= $idTA;
         $newEvaluacion->etapa_id=$idEta;
         $newEvaluacion->estado='1';
         $newEvaluacion->fechatomada=$fecnow;

         $newEvaluacion->activo='1';
         $newEvaluacion->borrado='0';

         $newEvaluacion->save();

         for($i=0; $i<$longitud1; $i++)
        {
            $newDetPregunta=new Detallepregunta();

            $newDetPregunta->pregunta_id= $idPregs[$i];
            $newDetPregunta->evaluacion_id=$newEvaluacion->id;

            $newDetPregunta->activo='1';
            $newDetPregunta->borrado='0';

            $newDetPregunta->save();
        }

        $evaluacions=Evaluacion::showEvaluacion($idTA);

        return response()->json(["view1"=>view('adminlte::tablaEvaluacion',compact('evaluacions'))->render(),'html'=>$html,'msj'=>$msj,'selector'=>$selector]);



    }

    public function vermasEval(Request $data)
    {
        $txtTitulo=$data->txtTitulo;
        $idE=$data->idE;

        $evaluacion=Evaluacion::showEvaluacionAlumno($idE);
        $preguntas=Detallepregunta::showDetallePregunta($idE);


              $titulo="";
              $alumno="";
              $etapa="";
              $fecha="";

        foreach ($evaluacion as $key => $dato) {
              $titulo=$dato->deseval;
              $alumno=$dato->nomalumno.' '.$dato->apealumno;
              $etapa=$dato->etapa;
              $fecha=pasFechaVista($dato->fechatomada);
        }

      

       return response()->json(["view"=>view('adminlte::preguntasImprimir',compact('preguntas'))->render(),'titulo'=>$titulo,'alumno'=>$alumno, 'etapa'=>$etapa, 'fecha'=>$fecha ]);
    }

     public function destroyEval(Request $data)
    {
        $txtTitulo=$data->txtTitulo;

        $idE=$data->idE;

            $evaluacion=Evaluacion::find($idE);

            $evaluacion->borrado='1';

            $evaluacion->save();

            $idTA=$evaluacion->tutoralumno_id;

            $html="";

            $aux="1";
            $msj="Se eliminó exitosamente la Evaluacion";

            $evaluacions=Evaluacion::showEvaluacion($idTA);

            return response()->json(["view1"=>view('adminlte::tablaEvaluacion',compact('evaluacions'))->render(),'html'=>$html,'aux'=>$aux,'msj'=>$msj ]);

    }

    public function editarEval(Request $data)
    {
        $idE=$data->idE;

        $evaluacion=Evaluacion::showEvaluacionAlumno($idE);

        $etapas=Etapa::where('activo','1')->where('borrado','0')->get();

        $fecnow = date('d/m/Y');


        $dimensiones=Dimensionpersona::where('activo','1')->where('borrado','0')->get();
        $idDim="";
        $idP="";
        $idEta="";


        foreach ($dimensiones as $key => $dato) {
            $idDim=$dato->id;
            break;
        }

        foreach ($evaluacion as $key => $dato) {
             $idP=$dato->idper;
             $idEta=$dato->idetapa;
             $idTA=$dato->idtutoralumno;

        }

        //$preguntas=Pregunta::where('dimensionpersona_id',$idDim)->where('etapa_id',$idEta)->where('activo','1')->where('borrado','0')->get();

        $preguntas=Pregunta::showPreguntaDimenEta($idEta,$idDim);
        $etapa=Etapa::find($idEta);


        $alumno=Alumno::showAlumno($idP);

        $preguntasEval=Detallepregunta::showDetallePregunta($idE);


        return response()->json(["view"=>view('adminlte::editarEvaluacion',compact('idTA','alumno','idP','etapas','dimensiones','preguntas','fecnow','etapa','evaluacion','preguntasEval'))->render()]);
        # code...
    }

    public function editEval(Request $data)
    {
       $idTA=$data->v1;
       $idEta=$data->v2;
       $titulo=$data->v3;
       $idPregs=json_decode(stripslashes($data->v4));
       $idDim=json_decode(stripslashes($data->v5));
       $newPreg=json_decode(stripslashes($data->v6));

       $idEval=$data->v7;

       $longitud1 = count($idPregs);

        $html='0';
        $msj='1';
        $selector="";

        $idPregsDelete =array();

        $detalleDelete=Detallepregunta::showDetalleDelete($idEval);
        $contAux=0;


        foreach ($detalleDelete as $dato) {
            $idPregsDelete[$contAux]=$dato->idpreg;
            $contAux++;
        }

        $deletedRows = Detallepregunta::where('evaluacion_id', $idEval)->delete();

         
        

       $cont2=0;
       for($i=0; $i<$longitud1; $i++)
        {
            if(strval($idPregs[$i])=="0")
            {
                $newPregunta=new Pregunta();

                    $newPregunta->nombre=$newPreg[$cont2];
                    $newPregunta->dimensionpersona_id=$idDim[$cont2];
                    $newPregunta->etapa_id=$idEta;

                    $newPregunta->activo='2';
                    $newPregunta->borrado='0';

                $newPregunta->save();

                $idPregs[$i]=strval($newPregunta->id);
                $cont2++;
            }
        }

        $fecnow = date('Y/m/d');
        $editEvaluacion= Evaluacion::find($idEval);

         $editEvaluacion->deseval=$titulo;
         $editEvaluacion->tutoralumno_id= $idTA;
         $editEvaluacion->etapa_id=$idEta;
         $editEvaluacion->estado='1';
         $editEvaluacion->fechatomada=$fecnow;

         $editEvaluacion->activo='1';
         $editEvaluacion->borrado='0';

         $editEvaluacion->save();

         for($i=0; $i<$longitud1; $i++)
        {
            $newDetPregunta=new Detallepregunta();

            $newDetPregunta->pregunta_id= $idPregs[$i];
            $newDetPregunta->evaluacion_id=$editEvaluacion->id;

            $newDetPregunta->activo='1';
            $newDetPregunta->borrado='0';

            $newDetPregunta->save();
        }

        $longitud2 = count($idPregsDelete);

         for($i=0; $i<$longitud2; $i++)
        {
            $aux=0;
            for($j=0; $j<$longitud1; $j++)
        {
            if($idPregs[$j]==$idPregsDelete[$i]){
                $aux=1;
            }
        }
        if($aux==0){
            $deletePregs = Pregunta::destroy($idPregsDelete[$i]);
        }
            
        
        }

        $evaluacions=Evaluacion::showEvaluacion($idTA);

        return response()->json(["view1"=>view('adminlte::tablaEvaluacion',compact('evaluacions'))->render(),'html'=>$html,'msj'=>$msj,'selector'=>$selector]);



    }

    public function califEval(Request $data)
    {
        $idE=$data->idE;

        $evaluacion=Evaluacion::showEvaluacionAlumno($idE);

        $preguntas=Resultado::showResultadosPreguntas($idE);

        return response()->json(["view"=>view('adminlte::califEval',compact('evaluacion','preguntas'))->render()]);
    }


    public function savecalifEval(Request $data)
    {
        $idE=$data->v1;
        $idResps=json_decode(stripslashes($data->v2));
        $calificaciones=json_decode(stripslashes($data->v3));

        $eval=Evaluacion::find($idE);

        $eval->estado='4';

        $eval->save();

        $idTA=$eval->tutoralumno_id;

        $longitud1 = count($idResps);

        $html='0';
        $msj='1';
        $selector="";

         $cont2=0;

       for($i=0; $i<$longitud1; $i++)
        {

                $Respuestas=Resultado::find($idResps[$i]);

                 $Respuestas->califresultado= $calificaciones[$i];

                 $Respuestas->save();

                $cont2++;
            
        }


            $evaluacions=Evaluacion::showEvaluacion($idTA);

        return response()->json(["view"=>view('adminlte::tablaEvaluacion',compact('evaluacions'))->render(),'html'=>$html,'msj'=>$msj,'selector'=>$selector]);
    }

    public function diagnosticarEval(Request $data)
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


        return response()->json(["view"=>view('adminlte::diagnosticarEval',compact('evaluacion','preguntas','notaProm'))->render()]);
    }


    public function saveDiag(Request $data)
    {
        $txtTitulo=$data->txtTitulo;
        $txtContenido=$data->txtContenido;
        $idE=$data->idE;
        $idTA=$data->idTA;
        $fecnow = date('Y/m/d');

            $diagnostico=new Diagnostico;

            $diagnostico->descripcion=$txtContenido;
            $diagnostico->nomdiag=$txtTitulo;
            $diagnostico->fech=$fecnow;
            $diagnostico->evaluacion_id=$idE;

            $diagnostico->activo='1';
            $diagnostico->borrado='0';

            $diagnostico->save();

            $html="0";



            $msj='1';

            $selector="";


            $eval=Evaluacion::find($idE);

            $eval->estado='5';

            $eval->save();


        $evaluacions=Evaluacion::showEvaluacion($idTA);

        return response()->json(["view"=>view('adminlte::tablaEvaluacion',compact('evaluacions'))->render(),'html'=>$html,'msj'=>$msj,'selector'=>$selector]);

    }


    public function editdiagnosticarEval(Request $data)
    {
        $idE=$data->idE;

        $evaluacion=Evaluacion::showEvaluacionAlumno($idE);

        $preguntas=Resultado::showResultadosPreguntas($idE);

        $diagnostico=Diagnostico::where('evaluacion_id',$idE)->get();

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


        return response()->json(["view"=>view('adminlte::editDiagnostico',compact('evaluacion','preguntas','notaProm','diagnostico'))->render()]);
    }


    public function saveDiagEdit(Request $data)
    {
        $txtTitulo=$data->txtTitulo;
        $txtContenido=$data->txtContenido;
        $idE=$data->idE;
        $idTA=$data->idTA;
        $idDiag=$data->idDiag;

        $fecnow = date('Y/m/d');

            $diagnostico=Diagnostico::find($idDiag);

            $diagnostico->descripcion=$txtContenido;
            $diagnostico->nomdiag=$txtTitulo;
            $diagnostico->evaluacion_id=$idE;


            $diagnostico->save();


            $html="0";



            $msj='1';

            $selector="";


            $eval=Evaluacion::find($idE);

            $eval->estado='5';

            $eval->save();


        $evaluacions=Evaluacion::showEvaluacion($idTA);

        return response()->json(["view"=>view('adminlte::tablaEvaluacion',compact('evaluacions'))->render(),'html'=>$html,'msj'=>$msj,'selector'=>$selector]);

    }


    public function cargarTarea(Request $data)
    {
        $idP=$data->idP;
        $idA=$data->idA;
        $idU=$data->idU;

        $idTA=$data->idTA;

        $alumno=Alumno::showAlumno($idP);

        

        $tareas=Tarea::showTareasTutor($idTA);

        $etapas=Etapa::where('activo','1')->where('borrado','0')->get();

        $etapa1=Etapa::where('activo','1')->where('borrado','0')->first();

        $evaluacions=Evaluacion::showEvaluacionDiagnosticadas($idTA,$etapa1->id);

        return response()->json(["view"=>view('adminlte::tarea',compact('idTA','alumno','idP','idA','idU','etapas','evaluacions'))->render(),"view1"=>view('adminlte::tablaTarea',compact('tareas'))->render()]);
        # code...
    }


    public function cargarEvalsTarea(Request $data)
    {
        $idEta=$data->v1;
        $idTA=$data->v2;

        $evaluacions=Evaluacion::showEvaluacionDiagnosticadas($idTA,$idEta);

          return response()->json(["view"=>view('adminlte::cbsEvalTarea',compact('evaluacions'))->render()]);

    }

    public function saveTarea(Request $data)
    {
        $titulo=$data->titulo;
        $fechaEntrega=$data->fechaEntrega;
        $contenido=$data->contenido;
        $idTA=$data->idTA;
        $idDiag=$data->idDiag;

        $newTarea=new Tarea;

        $newTarea->nombre=$titulo;
        $newTarea->descripcion=$contenido;
        $newTarea->diagnostico_id=$idDiag;
        $newTarea->estado='1';
        $newTarea->respuestas='';
        $newTarea->rutaresp='';
        $newTarea->activo='1';
        $newTarea->calif='';
        $newTarea->borrado='0';
        $newTarea->tutoralumno_id=$idTA;
        $newTarea->fechaentrega=pasFechaBD($fechaEntrega);

        $newTarea->save();

        $html="";

        $aux="1";

        $tareas=Tarea::showTareasTutor($idTA);

        return response()->json(["view"=>view('adminlte::tablaTarea',compact('tareas'))->render(),'html'=>$html,'aux'=>$aux ]);

    }

    public function vermasTarea(Request $data)
    {
        $titulo=$data->titulo;
        $idT=$data->idT;

        $tarea=Tarea::showTareaVista($idT);



              $titulo="";
              $alumno="";
              $etapa="";
              $fecha = date('d/m/Y');

        foreach ($tarea as $key => $dato) {
              $titulo=$dato->nombreTar;
              $alumno=$dato->nomalumno.' '.$dato->apealumno;
              $etapa=$dato->etapa;
    
        }

      

       return response()->json(["view"=>view('adminlte::tareaImp',compact('tarea'))->render(),'titulo'=>$titulo,'alumno'=>$alumno, 'etapa'=>$etapa, 'fecha'=>$fecha ]);
    }

    public function destroyTarea(Request $data)
    {


        $idT=$data->idT;
        $idTA=$data->idTA;

            $tarea=Tarea::find($idT);

            $tarea->borrado='1';

            $tarea->save();

  

            $html="";

            $aux="1";
            $msj="Se eliminó exitosamente la Tarrea";

            $tareas=Tarea::showTareasTutor($idTA);


            return response()->json(["view"=>view('adminlte::tablaTarea',compact('tareas'))->render(),'html'=>$html,'aux'=>$aux ,'msj'=>$msj ]);
    }

      public function editarTarea(Request $data)
    {
        $idT=$data->idT;

        $tarea=Tarea::showTareaVista($idT);

        $etapas=Etapa::where('activo','1')->where('borrado','0')->get();

        $idEta="";
        $idTA="";

        foreach ($tarea as $key => $dato) {
             $idEta=$dato->ideta;
             $idTA=$dato->idtutoralumno;

        }

        //$preguntas=Pregunta::where('dimensionpersona_id',$idDim)->where('etapa_id',$idEta)->where('activo','1')->where('borrado','0')->get();

        $evaluacions=Evaluacion::showEvaluacionDiagnosticadas($idTA,$idEta);


        return response()->json(["view"=>view('adminlte::editarTarea',compact('idTA','tarea','evaluacions','etapas'))->render()]);
        # code...
    }


    public function saveTareaEdit(Request $data)
    {
        $titulo=$data->titulo;
        $fechaEntrega=$data->fechaEntrega;
        $contenido=$data->contenido;
        $idTA=$data->idTA;
        $idDiag=$data->idDiag;
        $idT=$data->idT;

        $editTarea=Tarea::find($idT);

        $editTarea->nombre=$titulo;
        $editTarea->descripcion=$contenido;
        $editTarea->diagnostico_id=$idDiag;
        $editTarea->tutoralumno_id=$idTA;
        $editTarea->fechaentrega=pasFechaBD($fechaEntrega);

        $editTarea->save();

        $html="";

        $aux="1";

        $tareas=Tarea::showTareasTutor($idTA);

        return response()->json(["view"=>view('adminlte::tablaTarea',compact('tareas'))->render(),'html'=>$html,'aux'=>$aux ]);

    }


    public function cargarSesion(Request $data)
    {
        $idP=$data->idP;
        $idA=$data->idA;
        $idU=$data->idU;

        $idTA=$data->idTA;

        $alumno=Alumno::showAlumno($idP);

        

        $sesions=Sesion::showSesionsTutors($idTA);

        $etapas=Etapa::where('activo','1')->where('borrado','0')->get();

        $etapa1=Etapa::where('activo','1')->where('borrado','0')->first();

        $evaluacions=Evaluacion::showEvaluacionDiagnosticadas($idTA,$etapa1->id);

        return response()->json(["view"=>view('adminlte::sesion',compact('idTA','alumno','idP','idA','idU','etapas','evaluacions'))->render(),"view1"=>view('adminlte::tablaSesion',compact('sesions'))->render()]);
        # code...
    }

    public function saveSesion(Request $data)
    {
        $titulo=$data->titulo;
        $fechaSesion=$data->fechaSesion;
        $tipoSesion=$data->tipoSesion;
        $horaSesion=$data->horaSesion;
        $contenido=$data->contenido;
        $idTA=$data->idTA;
        $idDiag=$data->idDiag;
        $fecnow = date('Y/m/d');
        $fechaS=pasFechaBD($fechaSesion);

        $html="";
        $aux="1";
        $selector="";


        $date1 = new DateTime($fechaS);
        $date2 = new DateTime($fecnow);

        if($date1<=$date2)
        {
        $html="La fecha de Sesión no puede ser igual o anterior a la fecha de hoy, ingrese una fecha válida";
        $aux="0";
        $selector="fechaSesion";
        }
        else{


        $newSesion=new Sesion;

        $newSesion->titulo=$titulo;
        $newSesion->detalles=$contenido;
        $newSesion->fech=$fecnow;
        $newSesion->diagnostico_id=$idDiag;
        $newSesion->estado='1';
        $newSesion->desresultados='';
        $newSesion->activo='1';
        $newSesion->borrado='0';
        $newSesion->fechaSesion=$fechaS;
        $newSesion->tipo=$tipoSesion;
        $newSesion->hora=$horaSesion;
        $newSesion->tutoralumno_id=$idTA;
        $newSesion->califTutor='';
        $newSesion->califAlumno='';
        $newSesion->descCalifAlumno='';
        $newSesion->confirmado='0';

        $newSesion->save();

        }

        $sesions=Sesion::showSesionsTutors($idTA);


        return response()->json(["view"=>view('adminlte::tablaSesion',compact('sesions'))->render(),'html'=>$html,'aux'=>$aux,'selector'=>$selector]);

    }

    public function verMasSesion(Request $data)
    {
        $titulo=$data->titulo;
        $idS=$data->idS;

        $sesion=Sesion::showSesionVista($idS);



              $titulo="";
              $alumno="";
              $etapa="";
              $fecha = date('d/m/Y');

        foreach ($sesion as $key => $dato) {
              $titulo=$dato->nombresesion;
              $alumno=$dato->nomalumno.' '.$dato->apealumno;
              $etapa=$dato->etapa;
    
        }

      

       return response()->json(["view"=>view('adminlte::sesionImp',compact('sesion'))->render(),'titulo'=>$titulo,'alumno'=>$alumno, 'etapa'=>$etapa, 'fecha'=>$fecha ]);
    }

     public function destroySesion(Request $data)
    {


        $idS=$data->idS;
        $idTA=$data->idTA;

            $sesion=Sesion::find($idS);

            $sesion->borrado='1';

            $sesion->save();

  

            $html="";

            $aux="1";
            $msj="Se eliminó exitosamente la Sesión";

            $sesions=Sesion::showSesionsTutors($idTA);


        return response()->json(["view"=>view('adminlte::tablaSesion',compact('sesions'))->render(),'html'=>$html,'aux'=>$aux,'msj'=>$msj]);


    }

    public function editarSesion(Request $data)
    {
        $idS=$data->idS;

        $sesion=Sesion::showSesionVista($idS);

        $etapas=Etapa::where('activo','1')->where('borrado','0')->get();

        $idEta="";
        $idTA="";

        foreach ($sesion as $key => $dato) {
             $idEta=$dato->ideta;
             $idTA=$dato->idtutoralumno;

        }

        //$preguntas=Pregunta::where('dimensionpersona_id',$idDim)->where('etapa_id',$idEta)->where('activo','1')->where('borrado','0')->get();

        $evaluacions=Evaluacion::showEvaluacionDiagnosticadas($idTA,$idEta);


        return response()->json(["view"=>view('adminlte::editarSesion',compact('idTA','sesion','evaluacions','etapas'))->render()]);
        # code...
    }


    public function saveSesionEdit(Request $data)
    {
        $titulo=$data->titulo;
        $fechaSesion=$data->fechaSesion;
        $tipoSesion=$data->tipoSesion;
        $horaSesion=$data->horaSesion;
        $contenido=$data->contenido;
        $idTA=$data->idTA;
        $idDiag=$data->idDiag;
        $fecnow = date('Y/m/d');
        $fechaS=pasFechaBD($fechaSesion);

        $idS=$data->idS;

        $html="";
        $aux="1";
        $selector="";


        $date1 = new DateTime($fechaS);
        $date2 = new DateTime($fecnow);

        if($date1<=$date2)
        {
        $html="La fecha de Sesión no puede ser igual o anterior a la fecha de hoy, ingrese una fecha válida";
        $aux="0";
        $selector="fechaSesion";
        }
        else{


        $editSesion=Sesion::find($idS);

        $editSesion->titulo=$titulo;
        $editSesion->detalles=$contenido;
        $editSesion->diagnostico_id=$idDiag;

        $editSesion->fechaSesion=$fechaS;
        $editSesion->tipo=$tipoSesion;
        $editSesion->hora=$horaSesion;
        $editSesion->tutoralumno_id=$idTA;


        $editSesion->save();

        }

        $sesions=Sesion::showSesionsTutors($idTA);


        return response()->json(["view"=>view('adminlte::tablaSesion',compact('sesions'))->render(),'html'=>$html,'aux'=>$aux,'selector'=>$selector]);

    }

    public function califTarea(Request $data)
    {
        $idT=$data->idT;

        $tarea=Tarea::showTareaVista($idT);


        return response()->json(["view"=>view('adminlte::califTarea',compact('tarea'))->render()]);
    }

    public function saveCalifTarea(Request $data)
    {
         $idT=$data->v1;
         $idTA=$data->v2;
         $calif=$data->v3;
         $motivo=$data->v4;

         $tarea=Tarea::find($idT);

        $tarea->estado='4';
        $tarea->calif=$calif;
        $tarea->descCalif=$motivo;

        $tarea->save();


        $html='0';
        $msj='1';
        $selector="";

        $tareas=Tarea::showTareasTutor($idTA);

        return response()->json(["view"=>view('adminlte::tablaTarea',compact('tareas'))->render(),'html'=>$html,'msj'=>$msj,'selector'=>$selector]);


    }

    public function cancelSesion(Request $data)
    {
        $idS=$data->idS;

        $sesion=Sesion::showSesionVista($idS);


        return response()->json(["view"=>view('adminlte::cancelSesion',compact('sesion'))->render()]);
    }

    public function saveCancelSesion(Request $data)
    {
         $idS=$data->v1;
         $idTA=$data->v2;
         $motivo=$data->v3;

         $sesion=Sesion::find($idS);

        $sesion->estado='3';
        $sesion->desresultados=$motivo;

        $sesion->save();


        $html="0";
        $aux="1";
        $selector="";


        $sesions=Sesion::showSesionsTutors($idTA);


        return response()->json(["view"=>view('adminlte::tablaSesion',compact('sesions'))->render(),'html'=>$html,'aux'=>$aux,'selector'=>$selector]);
    }

    public function califSesion(Request $data)
    {
        $idS=$data->idS;

        $sesion=Sesion::showSesionVista($idS);


        return response()->json(["view"=>view('adminlte::califSesion',compact('sesion'))->render()]);
    }

    public function saveCalifSesion(Request $data)
    {
         $idS=$data->v1;
         $idTA=$data->v2;
         $calif=$data->v3;
         $motivo=$data->v4;

         $sesion=Sesion::find($idS);

        $sesion->estado='2';
        $sesion->califTutor=$calif;
        $sesion->desresultados=$motivo;

        $sesion->save();


        $html="0";
        $aux="1";
        $selector="";


        $sesions=Sesion::showSesionsTutors($idTA);


        return response()->json(["view"=>view('adminlte::tablaSesion',compact('sesions'))->render(),'html'=>$html,'aux'=>$aux,'selector'=>$selector]);
    }

    public function cargarChat(Request $data)
    {
        $idP=$data->idP;
        $idA=$data->idA;
        $idU=$data->idU;
        $idTA=$data->idTA;

         $chat=Chat::messages($idTA);

         $lastchat=Chat::orderBy('id', 'desc')->limit(1)->get();
         $idLastMsj="";
         foreach ($lastchat as $dato) {
            $idLastMsj=$dato->id;
         }



         $alumno=Persona::find($idP);

        return response()->json(["view"=>view('adminlte::chatDocente',compact('chat','alumno','idTA','idLastMsj'))->render()]);
    }

    public function enviarChat(Request $data)
    {

        
        $idTA=$data->v1;
        $msj=$data->v2;

        $iduser=Auth::user()->id;

        $fecnow = date('Y/m/d');
        $horanow = date('H:i:s');

        $newChat=new Chat;

        $newChat->fecha=$fecnow;
        $newChat->hora=$horanow;
        $newChat->mensaje=$msj;
        $newChat->envia='1';
        $newChat->borrado='0';
        $newChat->user_id=$iduser;
        $newChat->tutoralumno_id=$idTA;

        $newChat->save();

        $chat=Chat::messages($idTA);



        return response()->json(["view"=>view('adminlte::mensajeDocente',compact('chat'))->render()]);
    }

    public function cargarMsjs(Request $data)
    {

        
        $idTA=$data->v1;

        $chat=Chat::messages($idTA);

        $lastchat=Chat::orderBy('id', 'desc')->limit(1)->get();
         $idLastMsj="";
         foreach ($lastchat as $dato) {
            $idLastMsj=$dato->id;
         }

        return response()->json(["view"=>view('adminlte::mensajeDocente',compact('chat'))->render(),'idLastChat'=>$idLastMsj]);
    }


  


}
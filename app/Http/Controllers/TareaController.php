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


class TareaController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  public function verTarea(Request $data)
    {
        $idT=$data->idT;

        $tarea=Tarea::find($idT);

        $tarea->estado='2';

        $tarea->save();


        $tareas=Tarea::showTareaVista($idT);




        return response()->json(["view"=>view('adminlte::alumnoTareas',compact('tareas'))->render()]);
    }

    public function imagen(Request $request)
    {
        $archivo = $request->file('archivo');
        $oldimg = $request->input('nomImg');

        $aux=date('d-m-Y').'-'.date('H-i-s');


        $response="";
         
        if (1==2){
            
            $response="Validación Fallida";
        }

        else{
            
            if(strlen($oldimg)>0)
            {
            Storage::disk('tareas')->delete($oldimg);
            }

            $nombre=$archivo->getClientOriginalName();
            $extension=$archivo->getClientOriginalExtension();
            $nuevoNombre=$aux.".".$extension;
            $subir=Storage::disk('tareas')->put($nuevoNombre, \File::get($archivo));
            $rutaImagen="tareas/".$nuevoNombre;

            if($subir){
                $response=$nuevoNombre;

            }
            else{
                $response="Error al subir";
            }
        }

        return $response;
       // echo "Subiendo".$nombre;
       // return response()->json($per);

    }

    public function borrarimagen(Request $data)
    {
        $oldimg=$data->img;
        if(strlen($oldimg)>0)
        {
            Storage::disk('tareas')->delete($oldimg);
        }
    }


    public function responderTarea(Request $data)
    {
        $idT=$data->v1;
        $contenido=$data->v2;
        $archivo=$data->v3;

        $fecnow = date('Y/m/d');


        $tarea=Tarea::find($idT);

        $tarea->respuestas=$contenido;
        $tarea->rutaresp=$archivo;
        $tarea->estado='3';
        $tarea->fecharesuelta=$fecnow;

        $tarea->save();

         $html='0';
        $msj='1';
        $selector="";





return response()->json(['html'=>$html,'msj'=>$msj,'selector'=>$selector]);
    }

    public function verMasTarea(Request $data)
    {
       $idT=$data->idT;

        $tarea=Tarea::showTareaVista($idT);

        return response()->json(["view"=>view('adminlte::alumnoVerMasTarea',compact('tarea'))->render()]);

    }
}

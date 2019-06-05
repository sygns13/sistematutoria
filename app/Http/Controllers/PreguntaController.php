<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Etapa;
use App\Dimensionpersona;
use App\Pregunta;
use App\User;
use DB;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Validation\Rule;
use Validator;
use Auth;

class PreguntaController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(accesoUser([1,2])){

        $dimensiones=Dimensionpersona::where('activo','1')->where('borrado','0')->get();
        $etapas=Etapa::where('activo','1')->where('borrado','0')->get();

        $idE="0";
        $idD="0";
        $auxE=0;
        $auxD=0;

        $nomEta="";
        $nomDim="";
        foreach ($etapas as $dato) {
            if($auxE==0)
            {
            $idE=$dato->id;
            $auxE=1;
            $nomEta=$dato->nometapa;
            }
            else
            {
                break; 
            }
        }

        foreach ($dimensiones as $dato) {
            if($auxD==0)
            {
            $idD=$dato->id;
            $auxD=1;
            $nomDim=$dato->nomdimen;
            }
            else
            {
                break; 
            }
        }

        $preguntas=Pregunta::where('activo','1')->where('borrado','0')->where('dimensionpersona_id',$idD)->where('etapa_id',$idE)->get();

        return view('bancopreguntas.index',compact('preguntas','dimensiones','etapas','auxE','auxD','idE','idD','nomEta','nomDim'));

    }
      
        else
        {


            return view('adminlte::home');
            
        }
    }

    public function create(Request $data)
    {
        $nom=$data->nom;
        $idE=$data->v1;
        $idD=$data->v2;

        $input  = array('nombre' => $nom);
        $reglas = array('nombre' => 'unique:preguntas,nombre');

        $validator = Validator::make($input, $reglas);

        $html='0';
        $msj='1';
        $selector="";

        if (1==2) {
            $html='1';
            $msj='El nombre de la dimensión personal ingresada ya se encuentra registrado.';
            $selector='#txtnom';
        }
        else{
            $newPregunta=new Pregunta();

            $newPregunta->nombre=$nom;
            $newPregunta->dimensionpersona_id=$idD;
            $newPregunta->etapa_id=$idE;

            $newPregunta->activo='1';
            $newPregunta->borrado='0';

            $newPregunta->save();
        }

        $dimenSelect=Dimensionpersona::find($idD);
        $etapaSelect=Etapa::find($idE);

        $nomDim= $dimenSelect->nomdimen;
        $nomEta= $etapaSelect->nometapa;


        $preguntas=Pregunta::where('activo','1')->where('borrado','0')->where('dimensionpersona_id',$idD)->where('etapa_id',$idE)->get();


        return response()->json(["view"=>view('bancopreguntas.tabla',compact('preguntas','nomEta','nomDim'))->render(),'html'=>$html,'msj'=>$msj,'selector'=>$selector]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cbuchange(Request $data)
    {
        $dimensiones=Dimensionpersona::where('activo','1')->where('borrado','0')->get();
        $etapas=Etapa::where('activo','1')->where('borrado','0')->get();

        $idE=$data->v1;
        $idD=$data->v2;
        $auxE=1;
        $auxD=1;

        $nomEta="";
        $nomDim="";

        $dimenSelect=Dimensionpersona::find($idD);
        $etapaSelect=Etapa::find($idE);

        $nomDim= $dimenSelect->nomdimen;
        $nomEta= $etapaSelect->nometapa;


        $preguntas=Pregunta::where('activo','1')->where('borrado','0')->where('dimensionpersona_id',$idD)->where('etapa_id',$idE)->get();

return response()->json(["view1"=>view('bancopreguntas.controles',compact('dimensiones','etapas','auxE','auxD','idE','idD'))->render(),"view2"=>view('bancopreguntas.tabla',compact('preguntas','nomEta','nomDim'))->render()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function cargar(Request $data)
    {
        $idP=$data->idP;


      $pregunta=Pregunta::find($idP);

        return response()->json(["view"=>view('bancopreguntas.editar',compact('pregunta'))->render()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit1(Request $data)
    {
       
        $nom=$data->nom;
        $idE=$data->v1;
        $idD=$data->v2;

        $idP=$data->v3;


        $input  = array('nombre' => $nom);
        $reglas = array('nombre' => 'unique:preguntas,nombre,'.$idP);

        $validator = Validator::make($input, $reglas);

         $html='0';
        $msj='1';
        $selector="";

        if (1==2)
        {
            $html='1';
            $msj='El nombre de la etapa ingresada ya se encuentra registrada. para otra etapa';
            $selector='#txtnom';
        }
        else{

            $editPregunta=Pregunta::find($idP);

            $editPregunta->nombre=$nom;
   
        
            $editPregunta->save();
        }

     
        $dimenSelect=Dimensionpersona::find($idD);
        $etapaSelect=Etapa::find($idE);

        $nomDim= $dimenSelect->nomdimen;
        $nomEta= $etapaSelect->nometapa;


        $preguntas=Pregunta::where('activo','1')->where('borrado','0')->where('dimensionpersona_id',$idD)->where('etapa_id',$idE)->get();


        return response()->json(["view"=>view('bancopreguntas.tabla',compact('preguntas','nomEta','nomDim'))->render(),'html'=>$html,'msj'=>$msj,'selector'=>$selector]);

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
    public function destroy(Request $data)
    {
        $idP=$data->idP;
        $idE=$data->v1;
        $idD=$data->v2;



            $deletePregunta = Pregunta::find($idP);

            $deletePregunta->borrado='1';

            $deletePregunta->save();
            
            $html='0';
            $msj='1';

            $msj='Se eliminó correctamente la Pregunta Seleccionada';

        
  
        $dimenSelect=Dimensionpersona::find($idD);
        $etapaSelect=Etapa::find($idE);

        $nomDim= $dimenSelect->nomdimen;
        $nomEta= $etapaSelect->nometapa;


        $preguntas=Pregunta::where('activo','1')->where('borrado','0')->where('dimensionpersona_id',$idD)->where('etapa_id',$idE)->get();


        return response()->json(["view"=>view('bancopreguntas.tabla',compact('preguntas','nomEta','nomDim'))->render(),'html'=>$html,'msj'=>$msj]);


    }
}

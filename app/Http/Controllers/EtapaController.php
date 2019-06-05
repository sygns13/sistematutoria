<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Etapa;
use App\User;
use DB;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Validation\Rule;
use Validator;
use Auth;

class EtapaController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(accesoUser([1,2])){
        $etapas=Etapa::where('activo','1')->where('borrado','0')->get();

        return view('etapas.index',compact('etapas'));

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
     public function create(Request $data)
    {
        $nom=$data->nom;


        $input  = array('nometapa' => $nom);
        $reglas = array('nometapa' => 'unique:etapas,nometapa');

        $validator = Validator::make($input, $reglas);

        $html='0';
        $msj='1';
        $selector="";

        if ($validator->fails()) {
            $html='1';
            $msj='El nombre de la etapa ingresada ya se encuentra registrada.';
            $selector='#txtnom';
        }
        else{
            $newEtapa=new Etapa();

            $newEtapa->nometapa=$nom;

            $newEtapa->activo='1';
            $newEtapa->borrado='0';

            $newEtapa->save();
        }

        $etapas=Etapa::where('activo','1')->where('borrado','0')->get();
        
        return response()->json(["view"=>view('etapas.tabla',compact('etapas'))->render(),'html'=>$html,'msj'=>$msj,'selector'=>$selector]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function cargar(Request $data)
    {
        $idE=$data->idE;


      $etapa=Etapa::find($idE);

        return response()->json(["view"=>view('etapas.editar',compact('etapa'))->render()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit1(Request $data)
    {
       
        $idE=$data->idE;

        $nom=$data->nom;


        $input  = array('nometapa' => $nom);
        $reglas = array('nometapa' => 'unique:etapas,nometapa,'.$idE);

        $validator = Validator::make($input, $reglas);

         $html='0';
        $msj='1';
        $selector="";

        if ($validator->fails())
        {
            $html='1';
            $msj='El nombre de la etapa ingresada ya se encuentra registrada. para otra etapa';
            $selector='#txtnom';
        }
        else{

            $editEtapa=Etapa::find($idE);

            $editEtapa->nometapa=$nom;
   
        
            $editEtapa->save();
        }

     
    $etapas=Etapa::where('activo','1')->where('borrado','0')->get();
        
        return response()->json(["view"=>view('etapas.tabla',compact('etapas'))->render(),'html'=>$html,'msj'=>$msj,'selector'=>$selector]);

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
        $idE=$data->idE;




        $consulta=DB::table('etapas')
                    ->join('evaluacions', 'evaluacions.etapa_id', '=', 'etapas.id')
                    ->where('evaluacions.activo','1')->where('evaluacions.borrado','0')
                    ->where('etapas.id',$idE)->count();

        $consulta1=DB::table('etapas')
                    ->join('preguntas', 'preguntas.etapa_id', '=', 'etapas.id')
                    ->where('preguntas.activo','1')->where('preguntas.borrado','0')
                    ->where('etapas.id',$idE)->count();


        $html='0';
        $msj='1';

        if($consulta!="0" )
        {
        $html='1';
        $msj='No se pudo eliminar al Docente debido a que cuenta con registro de evaluaciones de tutoría asociadas a ella';
        }
        elseif($consulta1!="0" )
        {
        $html='1';
        $msj='No se pudo eliminar al Docente debido a que cuenta con registro de preguntas asociadas a ella';
        }
        
        else
        {
            $deleteEtapa = Etapa::find($idE);

            $deleteEtapa->borrado='1';
            $deleteEtapa->nometapa='--'.$deleteEtapa->nometapa.'--';

            $deleteEtapa->save();


            $msj='Se eliminó correctamente la Etapa Seleccionada';

        }
  
          $etapas=Etapa::where('activo','1')->where('borrado','0')->get();
        
        return response()->json(["view"=>view('etapas.tabla',compact('etapas'))->render(),'html'=>$html,'msj'=>$msj]);


    }
}

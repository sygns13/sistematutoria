<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Dimensionpersona;
use App\User;
use DB;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Validation\Rule;
use Validator;
use Auth;

class DimensionpersonaController extends Controller
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

        return view('dimensiones.index',compact('dimensiones'));

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
        $desc=$data->desc;

        $input  = array('nomdimen' => $nom);
        $reglas = array('nomdimen' => 'unique:dimensionpersonas,nomdimen');

        $validator = Validator::make($input, $reglas);

        $html='0';
        $msj='1';
        $selector="";

        if ($validator->fails()) {
            $html='1';
            $msj='El nombre de la dimensión personal ingresada ya se encuentra registrado.';
            $selector='#txtnom';
        }
        else{
            $newDimension=new Dimensionpersona();

            $newDimension->nomdimen=$nom;
            $newDimension->desdimen=$desc;

            $newDimension->activo='1';
            $newDimension->borrado='0';

            $newDimension->save();
        }

        $dimensiones=Dimensionpersona::where('activo','1')->where('borrado','0')->get();
        
        return response()->json(["view"=>view('dimensiones.tabla',compact('dimensiones'))->render(),'html'=>$html,'msj'=>$msj,'selector'=>$selector]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function cargar(Request $data)
    {
        $idD=$data->idD;


      $dimension=Dimensionpersona::find($idD);

        return response()->json(["view"=>view('dimensiones.editar',compact('dimension'))->render()]);
    }

    public function edit1(Request $data)
    {
       
        $idD=$data->idD;

        $nom=$data->nom;
        $desc=$data->desc;

        $input  = array('nomdimen' => $nom);
        $reglas = array('nomdimen' => 'unique:dimensionpersonas,nomdimen,'.$idD);

        $validator = Validator::make($input, $reglas);

         $html='0';
        $msj='1';
        $selector="";

        if ($validator->fails())
        {
            $html='1';
            $msj='El nombre de la dimensión personal ingresada ya se encuentra registrado. para otra dimensión';
            $selector='#txtnom';
        }
        else{

            $editDimension=Dimensionpersona::find($idD);

            $editDimension->nomdimen=$nom;
            $editDimension->desdimen=$desc;
   
        
            $editDimension->save();
        }

        $dimensiones=Dimensionpersona::where('activo','1')->where('borrado','0')->get();
        
        return response()->json(["view"=>view('dimensiones.tabla',compact('dimensiones'))->render(),'html'=>$html,'msj'=>$msj,'selector'=>$selector]);


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
     public function destroy(Request $data)
    {
        $idD=$data->idD;




        $consulta=DB::table('dimensionpersonas')
                    ->join('preguntas', 'preguntas.dimensionpersona_id', '=', 'dimensionpersonas.id')
                    ->where('preguntas.activo','1')->where('preguntas.borrado','0')
                    ->where('dimensionpersonas.id',$idD)->count();



        $html='0';
        $msj='1';

        if($consulta=="0")
        {
            $deleteDim = Dimensionpersona::find($idD);

            $deleteDim->borrado='1';
            $deleteDim->nomdimen='--'.$deleteDim->nomdimen.'--';

            $deleteDim->save();


            $msj='Se eliminó correctamente la Dimensión Seleccionada';

        }
        else{
        $html='1';
        $msj='No se pudo eliminar al Docente debido a que cuenta con registro de preguntas asociadas a él';
        }

         
 $dimensiones=Dimensionpersona::where('activo','1')->where('borrado','0')->get();
        
        return response()->json(["view"=>view('dimensiones.tabla',compact('dimensiones'))->render(),'html'=>$html,'msj'=>$msj]);
        

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Alumno;
use App\User;
use App\Persona;
use App\Tutoralumno;
use DB;
use Illuminate\Http\Response;
use Storage;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Validation\Rule;
use Auth;

class AlumnoController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $alumnos = Alumno::where('borrado','=','0')->get();
       // return response()->json($per);
if(accesoUser([1,2])){
        $alumnos=DB::select("select p.id as idper,a.id as idalum,u.id as idusu,a.codigo as codigo, p.nombres as nombres, p.apellidos as apellidos, a.semestrecursa as semestre, p.direccion as direccion,
            p.telf as telf,p.email as correo, p.imagen as imagen, p.genero as genero
            from personas p
            inner join alumnos a on a.persona_id=p.id
            inner join users u on u.persona_id=p.id
            where a.activo='1' and a.borrado='0'
            order by 5,4,3 ;");

        return view('Alumno.index',['alumnos'=> $alumnos]);
    }
    else
        {



            return view('adminlte::home');
            
        }
    }

    public function nuevoAlumno($v1,$v2,$v3,$v4,$v5,$v6,$v7,$v8,$v9,$v10,$ruta,$v11){

        //echo "Bien ahi";
        $input1  = array('dni' => $v2);
        $reglas1 = array('dni' => 'required|unique:personas,dni');

        $input2  = array('codigo' => $v1);
        $reglas2 = array('codigo' => 'required|unique:alumnos,codigo');

        $input3  = array('email' => $v8);
        $reglas3 = array('email' => 'required|email|unique:personas,email');

        $input4  = array('email' => $v8);
        $reglas4 = array('email' => 'required|email|unique:users,email');

        $input5  = array('name' => $v9);
        $reglas5 = array('name' => 'unique:users,name');


        $html='1';
        $msj='Se registró correctamente al alumno';



        $imagen="";
        if($ruta=="0"){
         $imagen="";
        }
        else{
            $imagen="img/perfilAlumnos/".$ruta;;
        }

        $validator1 = Validator::make($input1, $reglas1);
        $validator2 = Validator::make($input2, $reglas2);
        $validator3 = Validator::make($input3, $reglas3);
        $validator4 = Validator::make($input4, $reglas4);
        $validator5 = Validator::make($input5, $reglas5);


        if ($validator1->fails())
        {
            $html='0';
            $msj='El DNI ingresado ya se encuentra registrado';
        }
        elseif ($validator2->fails()) {
            $html='0';
            $msj='El Código ingresado ya se encuentra registrado';
        }
        elseif ($validator3->fails()) {
            $html='0';
            $msj='El email ingresado ya se encuentra registrado o no tiene el formato correcto "example@dominio.com"';
        }
         elseif ($validator4->fails()) {
            $html='0';
            $msj='El email ingresado ya se encuentra registrado';
        }
         elseif ($validator5->fails()) {
            $html='0';
            $msj='El username ingresado ya se encuentra registrado';
        }
        else{



        $persona = new Persona();

        
        $persona->dni=$v2;
        $persona->nombres=$v3;
        $persona->apellidos=$v4;
        $persona->email=$v8;
        $persona->telf=$v6;
        $persona->direccion=$v7;
        $persona->imagen=$imagen;
        $persona->activo='1';
        $persona->genero=$v11;
        $persona->borrado='0';

        $persona->save();

       /* $perso =Persona::where('borrado','=','0')
                ->where('dni','=',$v2)
                ->get();*/
        $perso =Persona::where('dni','=',$v2)->get();
        $idPer="0";

        foreach($perso as $dato) {
            $idPer=$dato->id;
            }

        $alumno = new Alumno();

        $alumno->codigo=$v1;
        $alumno->semestrecursa=$v5;     
        $alumno->persona_id=$idPer;
        $alumno->asignado='0';
        $alumno->activo='1';
        $alumno->borrado='0';

        $alumno->save();

        $usuario = new User();

        $usuario->name=$v9;
        $usuario->email=$v8;
        $usuario->password=bcrypt($v10);
        $usuario->tipouser_id='4';
        $usuario->persona_id=$idPer;
        $usuario->activo='1';
        $usuario->borrado='0';

        $usuario->save();

        //echo'Guud'; 
        }

        

        $alumnos=DB::select("select p.id as idper,a.id as idalum,u.id as idusu,a.codigo as codigo, p.nombres as nombres, p.apellidos as apellidos, a.semestrecursa as semestre, p.direccion as direccion,
            p.telf as telf,p.email as correo, p.imagen as imagen, p.genero as genero
            from personas p
            inner join alumnos a on a.persona_id=p.id
            inner join users u on u.persona_id=p.id
            where a.activo='1' and a.borrado='0'
            order by 5,4,3 ;");

        

        return response()->json(["view"=>view('alumno.tabla',compact('alumnos'))->render(),'html'=>$html,'msj'=>$msj]);
    }


        public function cargar (Request $request)
        {
            $idPer=$request->idP;
            $idAlum=$request->idA;
            $idUser=$request->idU;


            $alumnosEdit=DB::select("select p.id as idper,a.id as idalum,u.id as idusu,a.codigo as codigo, p.dni as DNI, p.nombres as nombres, p.apellidos as apellidos, a.semestrecursa as semestre, p.direccion as direccion,
            p.telf as telf,p.email as correo, p.imagen as imagen, p.genero as genero, u.name as username, u.password as psw, p.imagen as ruta
            from personas p
            inner join alumnos a on a.persona_id=p.id
            inner join users u on u.persona_id=p.id
            where a.activo='1' and a.borrado='0'
            and p.id='".$idPer."' and a.id='".$idAlum."' and u.id='".$idUser."';");

        return response()->json(["view"=>view('alumno.editar',compact('alumnosEdit'))->render()]);

        }


        public function subirimagen(Request $request)
    {
           
        $archivo = $request->file('archivo');
        $dni = $request->input('ocudni');
        $input  = array('image' => $archivo) ;
        $reglas = array('image' => 'required|image|mimes:jpeg,jpg,bmp,png,gif|max:900');
        $validator = Validator::make($input, [
            'image' => 'required',
        ]);


         
        if ($validator->fails())
        {
          //return view("mensajes.msj_rechazado")->with("msj","El archivo no es una imagen valida");

            //return response()->json(["view"=>view('planillas.tabla',compact('planilla'))->render(),'html'=>$html]);

            echo "Validacion Fallida";
        }

        else
        {
            $nombre=$archivo->getClientOriginalName();
            $extension=$archivo->getClientOriginalExtension();
            $nuevoNombre=$dni.".".$extension;
            $subir=Storage::disk('assets')->put($nuevoNombre, \File::get($archivo));
            $rutaImagen="img/perfilAlumnos/".$nuevoNombre;

            if($subir){
                echo $nuevoNombre;

            }
            else{
                echo "Error al subir";
            }
        }

       // echo "Subiendo".$nombre;
       // return response()->json($per);

       
    }

     public function editar(Request $request)
    {
            $idPer=$request->idP;
            $idAlum=$request->idA;
            $idUser=$request->idU;

            $codigo=$request->cod;
            $dni=$request->docdni;
            $nom=$request->name;
            $ape=$request->apell;
            $gen=$request->genro;
            $seme=$request->sem;
            $telf=$request->fono;
            $dir=$request->direc;
            $mail=$request->correo;
            $user=$request->usu;
            $psw=$request->pass;


        $input1  = array('dni' => $dni);
        $reglas1 = array('dni' => 'required|unique:personas,dni,'.$idPer);

        $input2  = array('codigo' => $codigo);
        $reglas2 = array('codigo' => 'required|unique:alumnos,codigo,'.$idAlum);

        $input3  = array('email' => $mail);
        $reglas3 = array('email' => 'required|email|unique:personas,email,'.$idPer);

        $input4  = array('email' => $mail);
        $reglas4 = array('email' => 'required|email|unique:users,email,'.$idUser);

        $input5  = array('name' => $user);
        $reglas5 = array('name' => 'unique:users,name,'.$idUser);


        $html='1';
        $msj='Se registró correctamente al alumno';

/*
       $validator1 = Validator::make($request, [
        'docdni' => ['required', Rule::unique('personas')->ignore($idPer->id),],
        ]);*/



        $validator1 = Validator::make($input1, $reglas1);
        $validator2 = Validator::make($input2, $reglas2);
        $validator3 = Validator::make($input3, $reglas3);
        $validator4 = Validator::make($input4, $reglas4);
        $validator5 = Validator::make($input5, $reglas5);


        if ($validator1->fails())
        {
            $html='0';
            $msj='El DNI ingresado ya se encuentra registrado';
        }
        elseif ($validator2->fails()) {
            $html='0';
            $msj='El Código ingresado ya se encuentra registrado';
        }
        elseif ($validator3->fails()) {
            $html='0';
            $msj='El email ingresado ya se encuentra registrado o no tiene el formato correcto "example@dominio.com"';
        }
         elseif ($validator4->fails()) {
            $html='0';
            $msj='El email ingresado ya se encuentra registrado';
        }
         elseif ($validator5->fails()) {
            $html='0';
            $msj='El username ingresado ya se encuentra registrado';
        }
        else{


        $persona =Persona::find($idPer);

        $persona->dni=$dni;
        $persona->nombres=$nom;
        $persona->apellidos=$ape;
        $persona->email=$mail;
        $persona->telf=$telf;
        $persona->direccion=$dir;     
        $persona->genero=$gen;

        $persona->save();
          

        $alumno =Alumno::find($idAlum);

        $alumno->codigo=$codigo;
        $alumno->semestrecursa=$seme;     

        $alumno->save();

        $usuario = User::find($idUser);

        $usuario->name=$user;
        $usuario->email=$mail;
        $usuario->password=bcrypt($psw);

        $usuario->save();


          $html='1';
          $msj='Exito';

        }

        $alumnos=DB::select("select p.id as idper,a.id as idalum,u.id as idusu,a.codigo as codigo, p.nombres as nombres, p.apellidos as apellidos, a.semestrecursa as semestre, p.direccion as direccion,
            p.telf as telf,p.email as correo, p.imagen as imagen, p.genero as genero
            from personas p
            inner join alumnos a on a.persona_id=p.id
            inner join users u on u.persona_id=p.id
            where a.activo='1' and a.borrado='0'
            order by 5,4,3 ;");

        return response()->json(["view"=>view('alumno.tabla',compact('alumnos'))->render(),'html'=>$html,'msj'=>$msj]);
    }


    public function editimagen(Request $request)
    {
           
        $archivo = $request->file('archivo2');
        $dni = $request->input('ocudni2');
        $idPer = $request->input('idPerEimg');
        $idUser = $request->input('idUsuEimg');
        $idAlum = $request->input('idAluEimg');
        $input  = array('image' => $archivo) ;
        $reglas = array('image' => 'required|image|mimes:jpeg,jpg,bmp,png,gif|max:900');
        $validator = Validator::make($input, [
            'image' => 'required',
        ]);

        $html='1';
        $msj='Se modificó correctamente la imagen del alumno';
         
        if ($validator->fails())
        {
          //return view("mensajes.msj_rechazado")->with("msj","El archivo no es una imagen valida");

            //return response()->json(["view"=>view('planillas.tabla',compact('planilla'))->render(),'html'=>$html]);

            //echo "Validacion Fallida";

        $html='0';
        $msj='Validacion de Imagen Fallida';
        }

        else
        {
            $nombre=$archivo->getClientOriginalName();
            $extension=$archivo->getClientOriginalExtension();
            $nuevoNombre=$dni.".".$extension;
            $subir=Storage::disk('assets')->put($nuevoNombre, \File::get($archivo));
            $rutaImagen="img/perfilAlumnos/".$nuevoNombre;

            if($subir){
                //echo $nuevoNombre;
                 $persona =Persona::find($idPer);

                 $persona->imagen=$rutaImagen;

                 $persona->save();

                echo $nuevoNombre;

            }
            else{
                $html='0';
                $msj='Eerror al subir la imagen';
            }
        }

       // echo "Subiendo".$nombre;
       // return response()->json($per);


       
    }


    public function delete(Request $data)
    {
        $idAl=$data->idA;

        $html='1';
        $msj='Se eliminó correctamente la imagen del alumno';

        $asignado=Tutoralumno::where('alumno_id',$idAl)->where('activo','1')->where('borrado','0')->get();

        $aux=0;

        foreach ($asignado as $dato) {
        $aux=1;    
        }

        if($aux==1){
        $html='0';
        $msj='No se puede elimianr al alumno debido a que tiene procesos de tutoría en el sistema';
        }
        elseif($aux==0)
        {
            $alumno=Alumno::find($idAl);

            $alumno->activo='0';
            $alumno->borrado='1';

            $alumno->save();
        }

        $alumnos=DB::select("select p.id as idper,a.id as idalum,u.id as idusu,a.codigo as codigo, p.nombres as nombres, p.apellidos as apellidos, a.semestrecursa as semestre, p.direccion as direccion,
            p.telf as telf,p.email as correo, p.imagen as imagen, p.genero as genero
            from personas p
            inner join alumnos a on a.persona_id=p.id
            inner join users u on u.persona_id=p.id
            where a.activo='1' and a.borrado='0'
            order by 5,4,3 ;");


        return response()->json(["view"=>view('alumno.tabla',compact('alumnos'))->render(),'html'=>$html,'msj'=>$msj]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Myperfil()
    {
        $iduser=Auth::user()->id;

        $alumno=DB::select("select p.id as idper,a.id as idalum,u.id as idusu,a.codigo as codigo, p.dni as DNI, p.nombres as nombres, p.apellidos as apellidos, a.semestrecursa as semestre, p.direccion as direccion,
            p.telf as telf,p.email as correo, p.imagen as imagen, p.genero as genero, u.name as username, u.password as psw, p.imagen as ruta
            from personas p
            inner join alumnos a on a.persona_id=p.id
            inner join users u on u.persona_id=p.id
            where a.activo='1' and a.borrado='0'
            and  u.id='".$iduser."';");

        return response()->json(["view"=>view('adminlte::alumnoPerfil',compact('alumno'))->render()]);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function editarPerfil(Request $request)
    {
            $idPer=$request->idP;
            $idAlum=$request->idA;
            $idUser=$request->idU;

            $telf=$request->fono;
            $dir=$request->direc;
            $mail=$request->correo;
            $user=$request->usu;
            $psw=$request->pass;




        $input3  = array('email' => $mail);
        $reglas3 = array('email' => 'required|email|unique:personas,email,'.$idPer);

        $input4  = array('email' => $mail);
        $reglas4 = array('email' => 'required|email|unique:users,email,'.$idUser);

        $input5  = array('name' => $user);
        $reglas5 = array('name' => 'unique:users,name,'.$idUser);


        $html='1';
        $msj='Se registró correctamente al alumno';

/*
       $validator1 = Validator::make($request, [
        'docdni' => ['required', Rule::unique('personas')->ignore($idPer->id),],
        ]);*/



        $validator3 = Validator::make($input3, $reglas3);
        $validator4 = Validator::make($input4, $reglas4);
        $validator5 = Validator::make($input5, $reglas5);



        if ($validator3->fails()) {
            $html='0';
            $msj='El email ingresado ya se encuentra registrado o no tiene el formato correcto "example@dominio.com"';
        }
         elseif ($validator4->fails()) {
            $html='0';
            $msj='El email ingresado ya se encuentra registrado';
        }
         elseif ($validator5->fails()) {
            $html='0';
            $msj='El username ingresado ya se encuentra registrado';
        }
        else{


        $persona =Persona::find($idPer);

        $persona->email=$mail;
        $persona->telf=$telf;
        $persona->direccion=$dir;     

        $persona->save();
          

        $usuario = User::find($idUser);

        $usuario->name=$user;
        $usuario->email=$mail;
        $usuario->password=bcrypt($psw);

        $usuario->save();


          $html='1';
          $msj='Exito';

        }

        $alumno=DB::select("select p.id as idper,a.id as idalum,u.id as idusu,a.codigo as codigo, p.dni as DNI, p.nombres as nombres, p.apellidos as apellidos, a.semestrecursa as semestre, p.direccion as direccion,
            p.telf as telf,p.email as correo, p.imagen as imagen, p.genero as genero, u.name as username, u.password as psw, p.imagen as ruta
            from personas p
            inner join alumnos a on a.persona_id=p.id
            inner join users u on u.persona_id=p.id
            where a.activo='1' and a.borrado='0'
            and  u.id='".$idUser."';");


        return response()->json(["view"=>view('adminlte::alumnoPerfil',compact('alumno'))->render(),'html'=>$html,'msj'=>$msj]);
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

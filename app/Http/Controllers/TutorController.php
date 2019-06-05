<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Tutor;
use App\User;
use App\Persona;
use App\Tutoralumno;
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


class TutorController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(accesoUser([1,2])){
        $tutors=Tutor::showTutors();

        return view('docentes.index',['tutors'=> $tutors]);

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
     public function buscarAgreFun(Request $data){
         $bus=$data->bus;
    


      $filas=50;
      if (!isset($data->pos)) $nPag=0; else $nPag=$data->pos;
      $inicio=$nPag*$filas;

        $agremiadosC=DB::select("where u.tipouser_id='8' and a.borrado='0' and u.borrado='0' and p.borrado='0' and
            ( p.apellidos like '%".$bus."%' or p.nombres like '%".$bus."%' or a.numRegistro like '%".$bus."%'  or concat(p.apellidos,' ',p.nombres) like '%".$bus."%' or concat(p.nombres,' ',p.apellidos) like '%".$bus."%') order by a.numRegistro;");

        $agremiados=DB::select("where u.tipouser_id='8' and a.borrado='0' and u.borrado='0' and p.borrado='0' and
            ( p.apellidos like '%".$bus."%' or p.nombres like '%".$bus."%' or a.numRegistro like '%".$bus."%'  or concat(p.apellidos,' ',p.nombres) like '%".$bus."%' or concat(p.nombres,' ',p.apellidos) like '%".$bus."%') order by a.numRegistro  LIMIT ".$inicio.",".$filas.";");

$n=0;
foreach ($agremiadosC as $dato) {
 $n++;
}

$totalPag=floor($n/$filas);

if(($n%$filas)>0) $totalPag++;

   return response()->json(["view"=>view('agremiados.tabla',compact('agremiados','n','nPag','totalPag','filas'))->render()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $data)
    {
        $docente=json_decode(stripslashes($data->array));//Array Con Data del docente
        $video=$data->v;//Video


        //var_dump($docente);

        $input4  = array('email' => $docente[9]);
        $reglas4 = array('email' => 'required|email|unique:users,email');

        $input5  = array('name' => $docente[10]);
        $reglas5 = array('name' => 'unique:users,name');

        $aux=0;

        $aux=DB::table('personas')->where('personas.borrado','0')->where('personas.dni',$docente[1])
        ->join('tutors', 'personas.id', '=', 'tutors.persona_id')->where('tutors.borrado','0')->count();



        
        $validator4 = Validator::make($input4, $reglas4);
        $validator5 = Validator::make($input5, $reglas5);

        $html='0';
        $msj='1';
        $selector="";

        if($aux>0)
        {
            $html='1';
            $msj='El DNI o CE del Docente ingresado ya se encuentra registrado';
            $selector='#txtDNI';
        }
        elseif ($validator4->fails()) {
            $html='1';
            $msj='El email ingresado ya se encuentra registrado, o no tiene el formato correcto';
            $selector='#txtmail';
        }
         elseif ($validator5->fails()) {
            $html='1';
            $msj='El username ingresado ya se encuentra registrado';
            $selector='#txtuser';
        }
        else{



            $nuevaPersona=new Persona();

            $nuevaPersona->dni=$docente[1];

            $nuevaPersona->nombres=$docente[2];
            $nuevaPersona->apellidos=$docente[3];
            $nuevaPersona->genero=$docente[4];
            $nuevaPersona->email=$docente[9];
            $nuevaPersona->telf=$docente[5];
            $nuevaPersona->direccion=$docente[6];
            $nuevaPersona->imagen=$docente[12];
            $nuevaPersona->tipoDocu=$docente[0];

            $nuevaPersona->activo="1";
            $nuevaPersona->borrado="0";


            $nuevaPersona->save();


            $nuevodocente=new Tutor();

            $nuevodocente->especialidad=$docente[7];
            $nuevodocente->persona_id=$nuevaPersona->id;
            $nuevodocente->video=$video;

            $nuevodocente->activo="1";
            $nuevodocente->borrado="0";

            $nuevodocente->save();


    
            $nuevouser= new User();

            $nuevouser->name=$docente[10];
            $nuevouser->email=$docente[9];
            $nuevouser->password=bcrypt($docente[11]);
            $nuevouser->tipouser_id='3';
            $nuevouser->persona_id=$nuevaPersona->id;
            $nuevouser->activo='1';
            $nuevouser->borrado='0';

            $nuevouser->save();
      


        }


 
    



        $tutors=Tutor::showTutors();



       


        return response()->json(["view"=>view('docentes.tabla',compact('tutors'))->render(),'html'=>$html,'msj'=>$msj,'selector'=>$selector]);
    }

    public function subirimagen(Request $request)
    {
           
        $archivo = $request->file('archivo');
        $oldimg = $request->input('nomImg');
        //$dni = $request->input('ocudni');

        $aux=date('d-m-yyy').'-'.date('H-i-s');
        $input  = array('image' => $archivo) ;
        $reglas = array('image' => 'required|image|mimes:jpeg,jpg,bmp,png,gif');
        $validator = Validator::make($input, [
            'image' => 'required',
        ]);

        


        $response="";
         
        if ($validator->fails())
        {
          //return view("mensajes.msj_rechazado")->with("msj","El archivo no es una imagen valida");

            //return response()->json(["view"=>view('planillas.tabla',compact('planilla'))->render(),'html'=>$html]);

            $response="Validacion Fallida";
        }

        else
        {
            if(strlen($oldimg)>0)
            {
            Storage::disk('fotosTutors')->delete($oldimg);
            }

            $nombre=$archivo->getClientOriginalName();
            $extension=$archivo->getClientOriginalExtension();
            $nuevoNombre=$aux.".".$extension;
            $subir=Storage::disk('fotosTutors')->put($nuevoNombre, \File::get($archivo));
            $rutaImagen="img/perfilTutores/".$nuevoNombre;

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
           //Storage::disk('assets')->delete($oldimg);

            Storage::disk('fotosTutors')->delete($oldimg);

        }
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
        $idT=$data->idT;
        $idU=$data->idU;

      $editTutor=Tutor::showTutorPersona($idT);

        return response()->json(["view"=>view('docentes.editar',compact('editTutor'))->render()]);
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
    public function edit1(Request $data)
    {
        $editDocente=json_decode(stripslashes($data->array));//Array Con Data del agremiado
        $video=$data->v;//Video

        $aux=0;

        $aux=DB::table('personas')->where('personas.borrado','0')->where('personas.dni',$editDocente[1])->where('personas.id','<>',$editDocente[9])
        ->join('tutors', 'personas.id', '=', 'tutors.persona_id')->where('tutors.borrado','0')->count();



         $html='0';
        $msj='1';
        $selector="";

        if ($aux>0)
        {
            $html='1';
            $msj='El DNI o CE del Docente ingresado ya se encuentra registrado para otro agremiado';
            $selector='#txtDNIE';
        }
        else{

            $editpersona=Persona::find($editDocente[9]);

            $editpersona->dni=$editDocente[1];
            $editpersona->tipoDocu=$editDocente[0];
            $editpersona->nombres=$editDocente[2];
            $editpersona->apellidos=$editDocente[3];
            $editpersona->genero=$editDocente[4];
            
            $editpersona->telf=$editDocente[5];
            $editpersona->direccion=$editDocente[6];
        
            $editpersona->save();


            $edTutor=Tutor::find($editDocente[10]);

            $edTutor->especialidad=$editDocente[7];
            $edTutor->video=$video;


            $edTutor->save();
            


        }


        $tutors=Tutor::showTutors();


        return response()->json(["view"=>view('docentes.tabla',compact('tutors'))->render(),'html'=>$html,'msj'=>$msj,'selector'=>$selector]);
    }


    public function edit2(Request $data)
    {
        $idUsu=$data->idU;
        $mail=$data->mail;
        $user=$data->user;
        $psw=$data->psw;

        $idPer=$data->idp;


        $input4  = array('email' => $mail);
        $reglas4 = array('email' => 'required|email|unique:users,email,'.$idUsu);

        $input5  = array('name' => $user);
        $reglas5 = array('name' => 'unique:users,name,'.$idUsu);
      

        $validator4 = Validator::make($input4, $reglas4);
        $validator5 = Validator::make($input5, $reglas5);


        $html='0';
        $msj='1';
        $selector="";

        if ($validator4->fails()) {
            $html='1';
            $msj='El email ingresado ya se encuentra registrado para otro usuario';
            $selector='#txtmailE';
        }
         elseif ($validator5->fails()) {
            $html='1';
            $msj='El username ingresado ya se encuentra registrado para otro usuario';
            $selector='#txtuserE';
        }
        else{

            $editUsuario=User::find($idUsu);

            $editUsuario->name=$user;
            $editUsuario->email=$mail;
            $editUsuario->password=bcrypt($psw);

            $editUsuario->save();


            $editPer=Persona::find($idPer);

            $editPer->email=$mail;

            $editPer->save();

        }


        $tutors=Tutor::showTutors();



        return response()->json(["view"=>view('docentes.tabla',compact('tutors'))->render(),'html'=>$html,'msj'=>$msj,'selector'=>$selector]);
    }


    public function subirimagenE(Request $request)
    {
           
        $archivo = $request->file('archivoE');
        $oldimg = $request->input('nomImgE');
        $efoto = $request->input('efoto');


        //$dni = $request->input('ocudni');

        $aux=date('d-m-yyy').'-'.date('H-i-s');
        $input  = array('image' => $archivo) ;
        $reglas = array('image' => 'required|image|mimes:jpeg,jpg,bmp,png,gif');
        $validator = Validator::make($input, [
            'image' => 'required',
        ]);

        


        $response="";
         
        if ($validator->fails())
        {
          //return view("mensajes.msj_rechazado")->with("msj","El archivo no es una imagen valida");

            //return response()->json(["view"=>view('planillas.tabla',compact('planilla'))->render(),'html'=>$html]);

            $response="Validacion Fallida";
        }

        else
        {
            if(strlen($oldimg)>0 && $oldimg!=$efoto)
            {
                Storage::disk('fotosTutors')->delete($oldimg);
            }

            $nombre=$archivo->getClientOriginalName();
            $extension=$archivo->getClientOriginalExtension();
            $nuevoNombre=$aux.".".$extension;
            $subir=Storage::disk('fotosTutors')->put($nuevoNombre, \File::get($archivo));
            $rutaImagen="img/perfilTutores/".$nuevoNombre;

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
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit3(Request $data)
    {
        $idper=$data->idp;
        $foto=$data->foto;




        $html='0';
        $msj='1';
        $selector="";



            $editPer=Persona::find($idper);

            $editPer->imagen=$foto;

            $editPer->save();



        $tutors=Tutor::showTutors();

        return response()->json(["view"=>view('docentes.tabla',compact('tutors'))->render(),'html'=>$html,'msj'=>$msj,'selector'=>$selector]);
    }

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
        $idPer=$data->idPer;
        $idtut=$data->idtut;
        $idUser=$data->idUser;



        $consulta=DB::table('tutors')
                    ->join('tutoralumnos', 'tutoralumnos.tutor_id', '=', 'tutors.id')
                    ->where('tutors.activo','1')->where('tutors.borrado','0')
                    ->where('tutors.id',$idtut)->count();



        $html='0';
        $msj='1';

        if($consulta=="0")
        {
            $deleteTutor = Tutor::find($idtut);

            $deleteTutor->borrado='1';

            $deleteTutor->save();

            $deletePersona = Persona::find($idPer);

            $deletePersona->borrado='1';
            $deletePersona->dni='-'.$deletePersona->dni.'-';

            $deletePersona->save();

            $deleteUser = User::find($idUser);

            $deleteUser->borrado='1';
            $deleteUser->name='-'.$deleteUser->name.'-';
            $deleteUser->email='-'.$deleteUser->email.'-';

            $deleteUser->save();


            $msj='Se eliminó correctamente al Docente Seleccionado';

        }
        else{
        $html='1';
        $msj='No se pudo eliminar al Docente debido a que cuenta con registro de trámites o pagos en él.';
        }

         

        $tutors=Tutor::showTutors();

return response()->json(["view"=>view('docentes.tabla',compact('tutors'))->render(),'html'=>$html,'msj'=>$msj]);

    }

    public function vermas(Request $data)
    {
        $idPer=$data->idPer;
        $idtuto=$data->idtuto;
        $idUser=$data->idUser;

    $tutorVerMas=Tutor::showTutorPersona($idtuto);



return response()->json(["view"=>view('docentes.verMasHabilitado',compact('tutorVerMas'))->render()]);


    }
    public function baja(Request $data)
    {
        $docu=$data->docu;
        $fece=$data->fece;
        $motiv=$data->motiv;
        $tip=$data->tip;
        $obsB=$data->obsB;

        $idP=$data->idP;
        $idT=$data->idT;
        $idU=$data->idU;

       
        $fechaemi=pasFechaBD($fece);


        $html='0';
        $msj='1';



        $fecha = date('Y/m/d');



         $fechafin="";

         if(strlen($fechafin)=="0")
         {
            $fechafin=null;
         }
         
        DB::table('inhabilitacions')
    ->where('tutor_id', $idT)
    ->update(['activo' => '0']);
            
            $nuevaInhab=new Inhabilitacion();

            $nuevaInhab->documento=$docu;
            $nuevaInhab->fechaemi=$fechaemi;
            $nuevaInhab->motivo=$motiv;
            $nuevaInhab->tipo=$tip;
            $nuevaInhab->obs=$obsB;
            $nuevaInhab->fechaini=$fecha;
            $nuevaInhab->fechafin=$fechafin;
            $nuevaInhab->user_id=Auth::user()->id;;
            $nuevaInhab->tutor_id=$idT;
            $nuevaInhab->activo='1';
            $nuevaInhab->borrado='0';
   

            $nuevaInhab->save();


            $editUser=User::find($idU);

            $editUser->activo=$tip;

            $editUser->save();


            $edTutor=Tutor::find($idT);

            $edTutor->activo=$tip;

            $edTutor->save();


        $msj='Se registró la desactivación del Docente seleccionado correctamente';

        

$tutors=Tutor::showTutors();

        return response()->json(["view"=>view('docentes.tabla',compact('tutors'))->render(),'html'=>$html,'msj'=>$msj]);

       


    }

    public function alta(Request $data)
    {
        $docu=$data->docu;
        $fece=$data->fece;
        $motiv='10';
        $tip='1';
        $obsB=$data->obsB;

        $idP=$data->idP;
        $idT=$data->idT;
        $idU=$data->idU;

       
        $fechaemi=pasFechaBD($fece);


        $html='0';
        $msj='1';



        $fecha = date('Y/m/d');



         $fechafin="";

         if(strlen($fechafin)=="0")
         {
            $fechafin=null;
         }
         

    DB::table('inhabilitacions')
    ->where('tutor_id', $idT)
    ->update(['activo' => '0']);
        
            
            $nuevaInhab=new Inhabilitacion();

            $nuevaInhab->documento=$docu;
            $nuevaInhab->fechaemi=$fechaemi;
            $nuevaInhab->motivo=$motiv;
            $nuevaInhab->tipo=$tip;
            $nuevaInhab->obs=$obsB;
            $nuevaInhab->fechaini=$fecha;
            $nuevaInhab->fechafin=$fechafin;
            $nuevaInhab->user_id=Auth::user()->id;;
            $nuevaInhab->tutor_id=$idT;
            $nuevaInhab->activo='1';
            $nuevaInhab->borrado='0';
   

            $nuevaInhab->save();


            $editUser=User::find($idU);

            $editUser->activo=$tip;

            $editUser->save();


            $edTutor=Tutor::find($idT);


            $edTutor->activo=$tip;

            $edTutor->save();


        $msj='Se registró la reactivación del docente seleccionado correctamente';

        


       

$tutors=Tutor::showTutors();

        return response()->json(["view"=>view('docentes.tabla',compact('tutors'))->render(),'html'=>$html,'msj'=>$msj]);

       


    }

    public function VerPerfilTutor(Request $data)
    {
        $idTutor=$data->idTutor;

        $tutor=Tutor::showTutorPersona($idTutor);

        return response()->json(["view"=>view('adminlte::alumnoPerfilTutor',compact('tutor'))->render()]);
    }

    public function Myperfil()
    {   
        $iduser=Auth::user()->id;
        $idT=Tutor::showTutorIndex($iduser);
        $tutor=Tutor::showTutorPersona($idT);

        return response()->json(["view"=>view('adminlte::miPerfil',compact('tutor'))->render()]);
    }
}

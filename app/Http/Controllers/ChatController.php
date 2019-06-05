<?php

namespace App\Http\Controllers;

use App\Events\MessageSentEvent;

use Illuminate\Http\Request;
use Auth;
use App\Chat;
use App\Persona;
use DB;

class ChatController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

public function index()
    {
        return view('chat');
    }
    
        public function fetch()
    {
        $iduser=Auth::user()->id;


         $idTA="2";

         $chats=Chat::messages($idTA);

       // return \App\Message::with('user')->get();
        return $chats;
    }

    public function sentMessage()
    {
        $user = Auth::user();
        $idTA = "2";
        $mensaje = "mensaje";

        $fecnow = date('Y/m/d');
        $hora = date('H:i:s');

        $message=new Chat();

        $message->fecha= $fecnow;
        $message->hora= $hora;
        $message->mensaje= $mensaje;
        $message->envia= '1';
        $message->borrado= '1';
        $message->user_id= $user->id;
        $message->tutoralumno_id= $idTA;

        $message->save();



        broadcast(new MessageSentEvent($user, $message));

    }

    public function cargarChat(Request $data)
    {
        $idP=$data->idP;
        $idT=$data->idT;
        $idU=$data->idU;
        $idTA=$data->idTA;

         $chat=Chat::messages($idTA);

         $lastchat=Chat::orderBy('id', 'desc')->limit(1)->get();
         $idLastMsj="";
         foreach ($lastchat as $dato) {
            $idLastMsj=$dato->id;
         }
  

         $tutor=Persona::find($idP);

        return response()->json(["view"=>view('adminlte::chatAlumno',compact('chat','tutor','idTA','idLastMsj'))->render()]);
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



        return response()->json(["view"=>view('adminlte::mensajeAlumno',compact('chat'))->render()]);
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

        return response()->json(["view"=>view('adminlte::mensajeAlumno',compact('chat'))->render(),'idLastChat'=>$idLastMsj]);
    }

}

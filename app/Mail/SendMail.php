<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use App\user;
use App\Tutor;
use Auth;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(request $data)
    {
            $iduser=Auth::user()->id;
            $user=user::find($iduser);

            $idtutor=Tutor::showTutorIndex($iduser);

            $tutor=Tutor::showTutorPersona($idtutor);

            $tutorname="";

            foreach ($tutor as  $dato) {
                $tutorname=$dato->apellidos.', '.$dato->nombres;
            }

        return $this->view('mail',['name'=>$user->name,'msg'=>$data->txtmsj,'tutor'=>$tutorname])->to($data->txtemail)->subject($data->txtAsunto)->from($user->email);
    }
}

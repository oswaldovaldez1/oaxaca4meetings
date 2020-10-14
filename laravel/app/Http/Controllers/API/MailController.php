<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Mail\Correo;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail(Request $request){

        $datos = new \stdClass();
        $datos->from =\config('mail')['username'];
        $datos->txtNombre=$request->txtNombre;
        $datos->txtTelefono=$request->txtTelefono;
        $datos->txtEmail=$request->txtEmail;
        $datos->txtEmpresa=$request->txtEmpresa;
        $datos->txtMensaje=$request->txtMensaje;
         $datos->view = 'mail.index';
         $datos->text = 'mail.index';
         $datos->fromname = $request->txtNombre;
        $datos->subject = 'Contacto desde el sitio de oaxaca4meetings.com';
        $resp=Mail::to("info@oaxaca4meetings.com")->bcc("direccióngeneral@oaxaca4meetings.com")->send(new
        Correo($datos));

            return response()->json(["respuesta"=>"ok"],200);

    }
}

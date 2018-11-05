<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class MSGController extends Controller
{
    public function sendMail(Request $request){
        $title = "DADOS FORNECIDOS PELO CANDIDATO";
        $guarian_name = 'guarian_name';
        $address = 'address';
        $cpf = 'cpf';
        $email = 'email';
        $phone = 'phone';
        $student_name = 'student_name';
        Mail::send('emails.send', ['title' => $title, 'guarian_name' => $guarian_name, 
        'address' => $address, 'cpf' => $cpf, 'email' => $email, 'phone' => $phone, 'student_name' => $student_name], function ($message)
        {
            
            $message->from('suptec01@dronekids.com.br', 'DKS Matriculas');

            $message->to('suptec01@dronekids.com.br');
            $message->subject('Matricula - teste');

        });


        return response()->json(['message' => 'Request completed']);
    }
}

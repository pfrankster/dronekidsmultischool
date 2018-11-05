<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class MSGController extends Controller
{
    public function sendMail(Request $request){
        $title = "DADOS FORNECIDOS PELO CANDIDATO";
        $guardian_name = $request->guardian_name;
        $address = $request->address;
        $cpf = $request->cpf;
        $email = $request->email;
        $phone = $request->phone;
        $student_name = $request->student_name;
        Mail::send('emails.send', ['title' => $title, 'guardian_name' => $guardian_name, 
        'address' => $address, 'cpf' => $cpf, 'email' => $email, 'phone' => $phone, 'student_name' => $student_name], function ($message)
        {
            
            $message->from('suptec01@dronekids.com.br', 'DKS Matriculas');

            $message->to('suptec01@dronekids.com.br');
            $message->subject('Matricula - teste');

        });


        return response()->json(['message' => 'Request completed']);
    }
    public function create_pay_url(Request $request){
        $site = 'https://www.pay2u.com.br/webservice/Checkout.ashx?chave=';
        $enroll_id = '&codigoPedido='.$request->enroll_id;
        $course_value = '&valorPedido='.$request->course_value;
        $n_installments = '&NumParcelas='.$request->n_installments;
        $cpf = '&CPF='.$request->cpf;
        $guardian_name = '&Nome='.$request->guardian_name;
        $payment_type = '&FormaPagamento='.$request->payment_type;//??????? how to pat this?
        $txt_buy = '&textoCompra=DRONEKIDS'.$request->guardian_name;
        $return_url = '&urlRetornoSite=http://www.dronekids.com.br';
        $url = $site.$enroll_id.$course_value.$n_installments.$cpf.$guardian_name.$payment_type.$txt_buy.$return_url;
    }
}

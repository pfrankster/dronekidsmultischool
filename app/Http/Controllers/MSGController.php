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

    static function create_pay_url(Request $request, $others){
        $site = 'https://www.pay2u.com.br/webservice/Checkout.ashx';
        $chave= '?chave='.'23EB832D-EE20-4CAD-A158-F4F799625486';
        $enroll_id = '&codigoPedido='.$others['enroll_id'];
        $course_value = '&valorPedido='.$others['course_value'];
        $n_installments = '&NumParcelas='.$others['n_installments'];
        $cpf = str_replace('/','',$request->cpf);
        $cpf = str_replace('.','',$cpf);
        $cpf = str_replace('-','',$cpf);
        $cpf = '&CPF='.$cpf;
        $guardian_name = str_replace(' ','%20',$request->guardian_name);
        $guardian_name = '&Nome='.$guardian_name;
        $payment_type = '&FormaPagamento='.$request->payment_type;//??????? how to pat this?
        $txt_buy = '&textoCompra=DRONEKIDS';
        $return_url = '&urlRetornoSite=http://www.dronekids.com.br';
        $url = $site.$chave.$enroll_id.$course_value.$n_installments.$cpf.$guardian_name.$payment_type.$txt_buy.$return_url;
        return $url;
    }
}

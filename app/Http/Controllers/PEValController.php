<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\DBController;
use App\Http\Controllers\MSGController;
// use App\Http\Requests;
// use App\Http\Controllers\Controller;

class PEValController extends Controller
{
    public function Validation()
    {
    	return view('preenrollment');
    }

    public function ValidationPost(Request $request)
    {
		// dd($request);
    	$validatedData = $this->validate($request,[
				'guardian_name' => 'bail|required|max:255',
				'cpf' => 'bail|required|max:18|cpf',
				'phone' => 'bail|required|max:19|regex:/^(\([0-9]{2}\))\s([0-9]{4,5})\-([0-9]{4})/u',
				'relation' => 'bail|required',
				'address' => 'bail|required|max:100',
				'state' => 'bail|required|max:100',
				'city' => 'bail|required|max:100',
				'email' => 'bail|required|email|max:255',
				'student_name' => 'bail|required|max:255',
				'gender' => 'bail|required',
				'school' => 'bail|required',
				'class' => 'bail|required',
				'section' => 'bail|required',
				'payment_type' => 'bail|required',
				'terms' => 'bail|accepted'
    		],[]);

		$enroll_id = DBController::submit_preenrollment($request);
		$url = SELF::processe_data($request , $enroll_id);
		return view('preenrolled')->with('pay_link', $url);
		// dd('You are successfully added all fields.');
		
	}
	
	public function processe_data(Request $request , $enroll_id){
		$class_data = DBController::get_class_data((int)$request->class);
		
		// $value_class = 0;
		$course_value = $class_data->monthly_tution_fee;
		$n_installments = 1;

		if ($request->payment_type ==2){
			// $value_class = $class_data->monthly_tution_fee;
			$n_installments = 6;
		}

		// $enroll_id;
		$tmp = array("course_value"=>$course_value,"n_installments"=>$n_installments, "enroll_id"=>$enroll_id);
		// $new = array_merge($request,$tmp);
		$url = MSGController::create_pay_url($request,$tmp);
		// dd($url);
		return $url;
	}
}

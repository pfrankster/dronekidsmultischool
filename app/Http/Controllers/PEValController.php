<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\DBController;
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
    	$validatedData = $this->validate($request,[
				'guardian_name' => 'bail|required|max:255',
				'cpf' => 'bail|required|max:18',
				//regex:/^\(([0-9]{2})\)\s*([0-9]{4,5})[- ]*[0-9]{4}$/i
				'phone' => 'bail|required|max:19',
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

		DBController::submit_preenrollment($request);
		return view('preenrolled');
		// dd('You are successfully added all fields.');
		
    }
}

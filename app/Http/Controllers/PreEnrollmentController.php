<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PreEnrollmentController extends Controller
{
    public function preEnrollmentValidation()
    {
    	return view('preenrollment');
    }

    public function preEnrollmentValidationPost(Request $request)
    {
    	$this->validate($request,[
				'guardianName' => 'required|max:255',
				'guardianCPF' => 'required|max:18',
				//regex:/^\(([0-9]{2})\)\s*([0-9]{4,5})[- ]*[0-9]{4}$/i
				'guardianPhone' => 'required|max:19',
				'guardianRelation' => 'required',
				'address' => 'required|max:100',
				'state' => 'required|max:100',
				'city' => 'required|max:100',
				'email' => 'required|email|max:255',
				'studentName' => 'required|max:255',
				'studentGender' => 'required',
				'pmSchool' => 'required',
				'pmClass' => 'required',
				'pmSection' => 'required',
				'pmPaymantType' => 'required',
				'ApmTermsAccept' => 'accepted'
    		],[
				//=====  EN  =====
				// 'guardianName.required' => ' The Guardian Name is required.',
				// 'guardianCPF.required' => ' The <> <> is required.',
				// 'guardianPhone.required' => ' The <> <> is required.',
				// 'guardianRelation.required' => ' The <> <> is required.',
				// 'address.required' => ' The <> <> is required.',
				// 'state.required' => ' The <> <> is required.',
				// 'city.required' => ' The <> <> is required.',
				// 'email.required' => ' The <> <> is required.',
				// 'studentName.required' => ' The <> <> is required.',
				// 'studentGender.required' => ' The <> <> is required.',
				// 'ApmTermsAccept.accepted' => ' The Terms of Contract must be accepted',
				// 'firstname.min' => ' The first name must be at least 5 characters.',

    			// 'firstname.max' => ' The first name may not be greater than 35 characters.',
    			// 'lastname.min' => ' The last name must be at least 5 characters.',
				// 'lastname.max' => ' The last name may not be greater than 35 characters.',
				
				//=====  BR  =====
				'guardianName.required' => ' O Nome do Responsavel é obrigatorio',
				'ApmTermsAccept.accepted' => ' Os termos de contratos precisão ser aceitos',
				'guardianPhone.regex' => 'O numero do telefonico não é valido' 
    		]);

		dd('You are successfully added all fields.');
		// return view('preenrollment');
    }
}

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
				'guardianName' => 'required',
				'guardianCPF' => 'required',
				'guardianPhone' => 'required',
				'guardianRelation' => 'required',
				'address' => 'required',
				'state' => 'required',
				'city' => 'required',
				'email' => 'required',
				'studentName' => 'required',
				'studentGender' => 'required',
				'pmSchool' => 'required',
				'pmClass' => 'required',
				'pmSection' => 'required',
				'pmPaymantType' => 'required',
				// 'ApmTermsAccept' => 'required'
    		],[
				// 'guardianName.required' => ' The <> <> is required.',
				// 'guardianCPF.required' => ' The <> <> is required.',
				// 'guardianPhone.required' => ' The <> <> is required.',
				// 'guardianRelation.required' => ' The <> <> is required.',
				// 'address.required' => ' The <> <> is required.',
				// 'state.required' => ' The <> <> is required.',
				// 'city.required' => ' The <> <> is required.',
				// 'email.required' => ' The <> <> is required.',
				// 'studentName.required' => ' The <> <> is required.',
				// 'studentGender.required' => ' The <> <> is required.',

				

    			// 'firstname.min' => ' The first name must be at least 5 characters.',

    			// 'firstname.max' => ' The first name may not be greater than 35 characters.',
    			// 'lastname.min' => ' The last name must be at least 5 characters.',
    			// 'lastname.max' => ' The last name may not be greater than 35 characters.',
    		]);

    	dd('You are successfully added all fields.');
    }
}

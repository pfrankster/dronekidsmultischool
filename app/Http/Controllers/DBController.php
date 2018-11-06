<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
class DBController extends Controller
{
    static function get_shools(){
        return DB::table('schools')->where('status',1)->get(); 
    }

    public function get_classes_by(Request $request){
        $result =  DB::table('classes')->where([['school_id','=',$request->school_id],['status','=',1]])->get();
        return response()->json($result);
    }
    public function get_sections_by(Request $request){
        $result =  DB::table('sections')->where([['school_id','=',$request->school_id],['class_id','=',$request->class_id],['status','=',1]])->get();
        return response()->json($result);
    }

    static function get_payment_types(){
        return DB::table('paymant_types')->get();
    }

    static function submit_preenrollment(Request $request){
        $id = DB::table('pre_enrollments')->insertGetId([
            'guardian_name' => $request->guardian_name, 
            'guardian_cpf' => $request->cpf,
            'guardian_phone' => $request->phone,
            'address' => $request->address,
            'state' => $request->state,
            'city' => $request->city,
            'email' => $request->email,
            'guardian_relation' => $request->relation,
            'student_name' => $request->student_name,
            'student_gender' => $request->gender,
            'section_id' => (int)$request->section,
            'payment_type_id' => (int)$request->payment_type
            ]
        );
        return $id;
    }

    static function get_class_data($class_id){
        return DB::table('classes')->where('id',$class_id)->first();
    }
}
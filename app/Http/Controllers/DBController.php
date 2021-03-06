<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class DBController extends Controller
{

    // ========== Get School ==========
    static function get_shools(){
        return DB::table('schools')->where('status',1)->orderBy('school_name', 'asc')->get(); 
    }
    // ========== Get School by ==========
    public function get_school_by(Request $request){
        $result =  DB::table('schools')->where([['city_id','=',$request->city_id],['status','=',1]])->orderBy('school_name', 'asc')->get();
        return response()->json($result);
    }
    // ========== Get Class by ==========
    public function get_classes_by(Request $request){
        $result =  DB::table('classes')->where([['school_id','=',$request->school_id],['status','=',1]])->orderBy('name', 'asc')->get();
        return response()->json($result);
    }
    // ========== Get Section by ==========
    public function get_sections_by(Request $request){
        $result =  DB::table('sections')->where([['school_id','=',$request->school_id],['class_id','=',$request->class_id],['status','=',1]])->orderBy('name', 'asc')->get();
        return response()->json($result);
    }
    // ========== Get Payment Type ==========
    static function get_payment_types(){
        return DB::table('paymant_types')->orderBy('name', 'asc')->get();
    }
    // ========== submit Preenrollment ==========
    static function submit_preenrollment(Request $request){
        $id = DB::table('pre_enrollments')->insertGetId([
            'guardian_name' => $request->guardian_name, 
            'guardian_cpf' => $request->cpf,
            'guardian_phone' => $request->phone,
            'address' => $request->address,
            'state' => $request->state,
            'city' => $request->city,
            'state_id' => $request->state,
            'city_id' => $request->city,
            'email' => $request->email,
            'guardian_relation' => $request->relation,
            'student_name' => $request->student_name,
            'student_gender' => $request->gender,
            'student_age' => $request->student_age,
            'section_id' => (int)$request->section,
            'payment_type_id' => (int)$request->payment_type,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        );
        return $id;
    }

    static function get_class_data($class_id){
        return DB::table('classes')->where('id',$class_id)->first();
    }

    static function get_preenrollments(){
        return DB::table('pre_enrollments')->get();
    }

    static function get_states(){
        return DB::table('state')->orderBy('name', 'asc')->get();
    }

    static function get_city(Request $request){
        return DB::table('city')->where('uf_id',$request->uf_id)->orderBy('name', 'asc')->get();
    }

    static function get_states_with_courses(){
        $stateList = DB::table('schools')->where('status',1)->pluck('state_id'); 
        return DB::table('state')->whereIn('id',$stateList)->orderBy('name', 'asc')->get();
    }
    static function get_city_with_courses(Request $request){
        $cityList = DB::table('schools')->where('status',1)->pluck('city_id'); 
        return DB::table('city')->whereIn('id',$cityList)->where('uf_id',$request->uf_id)->orderBy('name', 'asc')->get();
    }
    // static function add_guardian($obj){
    //     $id = DB::table('guardians')->insertGetId([
    //         'school_id' => $objs->school, 
    //         'user_id' => SELF::add_user($obj),
    //         'name' => $obj->guardian_name,
    //         'phone' => $request->phone,
    //         'present_address' => $obj->full_address,
    //         'status' => 1,
    //         'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
    //         'created_by' => 0,
    //         'modified_at' => Carbon::now()->format('Y-m-d H:i:s'),
    //         'modified_by' => 0,
    //         ]
    //     );
    //     return $id;
    // }

    // static function add_student($obj, $guardian_id){
    //    $id = DB::table('students')->insertGetId([
    //         'school_id' => $objs->school, 
    //         'guardian_id' => $guardian_id, 
    //         'user_id' => SELF::add_user($obj),
    //         'registration_no' => 0,
    //         // 'group' => 0,
    //         'name' => $obj->student_name,
    //         'phone' => $request->phone,
    //         'present_address' => $obj->full_address,
    //         'gender' => $obj->gender,
    //         'dob' => Carbon::now()->format('Y-m-d'),
    //         'status' => 1,
    //         'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
    //         'created_by' => 0,
    //         'modified_at' => Carbon::now()->format('Y-m-d H:i:s'),
    //         'modified_by' => 0,
    //         ]
    //     );
    //     return $id;
    // }

    // static function add_enrollment($obj, $student_id){
    //     $id = DB::table('enrollments')->insertGetId([
    //         'student_id' => $student_id,
    //         'school_id' => $objs->school, 
    //         'class_id' => $objs->class, 
    //         'section_id' => $objs->section, 
    //         'academic_year_id' => 0,
    //         // 'roll_no' => ,
    //         'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
    //         'modified_at' => Carbon::now()->format('Y-m-d H:i:s'),
    //         $data['status']     = 1,
    //     ]);
    //     return $id;
    // }

    // static function add_user($obj){
    //     $id = DB::table('users')->insertGetId([
    //         'school_id' => $objs->school, 
    //         'role_id' => $objs->role,
    //         'password' => "",//str_random(6),
    //         // 'temp_password' => "";//str_random(6),
    //         'email' => $request->email,
    //         'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
    //         'modified_at' => Carbon::now()->format('Y-m-d H:i:s'),
    //         $data['status']     = 1,
    //     ]);
    //     return $id;
    // }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DataBaseController extends Controller
{
    private static $tSchoolName = 'schools';
    private static $tSchoolIdName = 'school_id';
    private static $tClassName = 'classes';
    private static $tSectionName = 'sections';
    private static $tPaymantTypeName = 'paymant_types';
    private static $tPreEnrollmentName = 'pre_enrollments';
    static function getShools(){
        return DB::table(self::$tSchoolName)->get();
        // return [(object) ["id"=>1,"nome"=>"Boleto"],(object) ["id"=>2,"nome"=>"Cartão"]];
        // return DB::table('tmp_schools')->get();
        
    }
    // public function getClasses(){
    //     return response()->json(DB::table('tmp_classes')->get());
    // }

    // public function getSections(){
    //     return response()->json(DB::table('tmp_sections')->get());
    // }

    public function getClassesBy(Request $request){
        // $conn = DB::connection('droneKids');
        // $result =  $conn->table( self::$tClassName)->where(self::$tSchoolIdName,$request->schoolId)->get();
        // $classId = DB::table('tmp_sections')->where('schoolId',$request->schoolId)->pluck('classId');
        // $result = DB::table('tmp_classes')->whereIn("id",$classId)->get();
        // return response()->json(['ids' => $classId]);
        $result =  DB::table( self::$tClassName)->where(self::$tSchoolIdName,$request->schoolId)->get();
        return response()->json($result);
    }
    public function getSectionsBy(Request $request){
        // $conn = DB::connection('droneKids');
        // $result =  $conn->table(self::$tSectionName)->where(self::$tSchoolIdName,$request->schoolId)->get();
        $result =  DB::table(self::$tSectionName)->where(self::$tSchoolIdName,$request->schoolId)->get();
        return response()->json($result);
        // return response()->json(DB::table('tmp_sections')->where([['schoolId',$request->schoolId],['classId',$request->classId]])->get());
    }

    static function getPaymentTypes(){
        // $conn = DB::connection('mysql');
        // return $conn->table(self::$tPaymantTypeName)->get();
        return DB::table(self::$tPaymantTypeName)->get();
        // return [(object) ["id"=>1,"name"=>"Boleto"],(object) ["id"=>2,"name"=>"Cartão"]];
    }

    public function submitPreEnrollment(Request $request){
        DB::table(self::$tPreEnrollmentName)->insertGetId([
            // 'guardianName' => "teste12", 
            // 'guardianCPF' => "testeCPF",
            // 'guardianPhone' => "(00) 0000-0000",
            // 'address' => "testeAddress",
            // 'state' => "testeState",
            // 'city' => "testeCity",
            // 'email' => "teste@teste.com",
            // 'guardianRelation' => "TestRelatin",
            // 'studentName' => "Student",
            // 'studentGender' => "male",
            // 'sectionId' => 1,
            // 'paymentTypeId' => 1,
            'guardian_name' => $request->guardianName, 
            'guardian_cpf' => $request->guardianCPF,
            'guardian_phone' => $request->guardianPhone,
            'address' => $request->address,
            'state' => $request->state,
            'city' => $request->city,
            'email' => $request->email,
            'guardian_relation' => $request->guardianRelation,
            'student_name' => $request->studentName,
            'student_gender' => $request->studentGender,
            'section_id' => (int)$request->sectionId,
            'payment_type_id' => (int)$request->paymantType
            ]
        );

        
        // return response()->json(["Complite "]);
    }
}

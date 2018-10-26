<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DataBaseController extends Controller
{
    static function getShools(){
        $conn = DB::connection('droneKids');
        return DB::connection('droneKids')->table('escolas')->get();
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
        $conn = DB::connection('droneKids');
        $result =  $conn->table('cursos')->where("escolaid",$request->schoolId)->get();
        // $classId = DB::table('tmp_sections')->where('schoolId',$request->schoolId)->pluck('classId');
        // $result = DB::table('tmp_classes')->whereIn("id",$classId)->get();
        // return response()->json(['ids' => $classId]);
        return response()->json($result);
    }
    public function getSectionsBy(Request $request){
        $conn = DB::connection('droneKids');
        $result =  $conn->table('turmas')->where("idescola",$request->schoolId)->get();
        return response()->json($result);
        // return response()->json(DB::table('tmp_sections')->where([['schoolId',$request->schoolId],['classId',$request->classId]])->get());
    }

    static function getPaymentTypes(){
        // return DB::table('paymant_types')->get();
        return [(object) ["id"=>1,"name"=>"Boleto"],(object) ["id"=>2,"name"=>"Cartão"]];
    }

    public function submitPreEnrollment(Request $request){
        DB::table('pre_enrollments')->insertGetId([
            'guardianName' => $request->guardianName, 
            'guardianCPF' => $request->guardianCPF,
            'guardianPhone' => $request->guardianPhone,
            'address' => $request->address,
            'state' => $request->state,
            'city' => $request->city,
            'email' => $request->email,
            'guardianRelation' => $request->guardianRelation,
            'studentName' => $request->studentName,
            'studentGender' => $request->studentGender,
            'sectionId' => $request->sectionId,
            'paymentTypeId' => $request->paymantType]
        );

        
        // return response()->json(["Complite "]);
    }
    
}

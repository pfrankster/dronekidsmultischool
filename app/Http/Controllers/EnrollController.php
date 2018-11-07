<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\DBController;

class EnrollController extends Controller
{
    static function scheduled(){
        $list = DBController::get_preenrollments();
        foreach($list as $obj){
            if($obj->status = 2){

            }
        }
    }
    static function enroll($obj){
        $guardian_id = DBController::add_guardian($obj);
        $student_id = DBController::add_student($obj,$guardian_id);
        DBController::add_enrollment($obj,$student_id);
    }
}


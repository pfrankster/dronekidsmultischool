<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TmpPaymanTypeController extends Controller
{
    public function show($id)
    {

        return view('user.profile', ['user' => TmpPaymanType::findOrFail($id)]);
    }
    //
}

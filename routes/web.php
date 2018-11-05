<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('preenrollment');
});
// Route::get('preenrollment', function () {
//     return view('preenrollment');
// });

Route::post('pvalidation','PEValController@ValidationPost');

Route::post('getclass', 'DBController@get_classes_by');
Route::post('getsections', 'DBController@get_sections_by');

Route::post('submitpreenroll', 'DBController@submit_preenrollment');

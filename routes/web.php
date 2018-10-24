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
    return view('home');
});

Route::get('/preenrollment', function () {
    return view('preenrollment');
});
Route::get('/preenrollmentTeste', function () {
    return view('tests/preenrollment');
});


// Route::get('preenrollment', 'PreEnrollmentController@preEnrollmentValidation');
Route::post('preenrollment', 'PreEnrollmentController@preEnrollmentValidationPost');


Route::get('preenrollment/test', 'TmpSectionController@testfunction');
Route::post('preenrollment/test', 'TmpSectionController@testfunction');

Route::post('getClasses', 'DataBaseController@getClassesBy');
Route::post('getSections', 'DataBaseController@getSectionsBy');

Route::post('submitpreenroll', 'DataBaseController@submitPreEnrollment');

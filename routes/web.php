<?php

use Illuminate\Support\Facades\Route;

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

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('/auth/login');
});

Route::group(['middleware' => 'auth'], function () {

Route::get('/dashboard', 'App\Http\Controllers\DoctorController@index');

Route::get('/account', 'App\Http\Controllers\DoctorController@account');

//doctor routes

Route::get('/doctors', 'App\Http\Controllers\DoctorController@doctors');

Route::post('/createdoctor', [ "uses" => 'App\Http\Controllers\DoctorController@createDoctor', "as" => "doctor.create"]);

Route::get('/doctor/{id}', [ "uses" => 'App\Http\Controllers\DoctorController@edit', "as" => "doctor.edit"]);

Route::put('/updatedoctor', [ "uses" => 'App\Http\Controllers\DoctorController@update', "as" => "doctor.update"]);

Route::delete('/doctordelete/{id}', [ "uses" => 'App\Http\Controllers\DoctorController@destroy', "as" => "doctor.delete"]);

Route::get('/doctors/show', [ "uses" => 'App\Http\Controllers\DoctorController@show', "as" => "doctor.show"]);

//Patient routes

Route::get('/patients', 'App\Http\Controllers\PatientController@index');

Route::post('/createpatient', [ "uses" => 'App\Http\Controllers\PatientController@store', "as" => "patient.create"]);

Route::get('/patient/{id}', [ "uses" => 'App\Http\Controllers\PatientController@edit', "as" => "patient.edit"]);

Route::put('/updatepatient', [ "uses" => 'App\Http\Controllers\PatientController@update', "as" => "patient.update"]);

Route::delete('/patientdelete/{id}', [ "uses" => 'App\Http\Controllers\PatientController@destroy', "as" => "patient.delete"]);

//Examination routes

//Route::get('/examinations', 'App\Http\Controllers\ExaminationController@index');//->except(['index']);

Route::get('examinations/{type?}', ["uses" => "App\Http\Controllers\ExaminationController@index", "as" => "examinations.index"])->where('type', '(unchecked|checked)');

Route::post('/createexamination', ["uses" => 'App\Http\Controllers\ExaminationController@store', "as" => "examinations.store"]);

Route::get('/examinationedit/{id}', ["uses" => 'App\Http\Controllers\ExaminationController@edit', "as" => "examinations.edit"]);

Route::put('/updateexamination', ["uses" => 'App\Http\Controllers\ExaminationController@update', "as" => "examinations.update"]);

Route::delete('/examinationdelete/{id}', [ "uses" => 'App\Http\Controllers\ExaminationController@destroy', "as" => "examinations.delete"]);
});
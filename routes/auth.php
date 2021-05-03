<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [ "uses" => 'App\Http\Controllers\DoctorController@login', "as" => "login"]);
Route::get('/register','App\Http\Controllers\DoctorController@register');

Route::post('/registerpage', [ "uses" => 'App\Http\Controllers\DoctorController@store', "as" => "doctor.store"]);
Route::get('/loginpage', [ "uses" => 'App\Http\Controllers\DoctorController@loginDoctor', "as" => "doctor.login"]);
Route::get('/logout', ["uses" => 'App\Http\Controllers\DoctorController@logout', "as" => "logout"]);


route::get('/login/user/{user?}/{id?}', ["uses" => "App\Http\Controllers\DoctorController@urlLogin", "as" => "user.urlLogin"]);
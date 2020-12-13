<?php

use App\Http\Controllers\LoginWithSocialiteController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    if(auth()->check()){
        return view("index");
    }
    return view('auth.login');
});

Route::post("/resend-email/{email}/{name}/{id}",[UserController::class,'sendEmail']);
Route::post("/register-user",[UserController::class,'registerUser'])->name("registeruser");
Route::get("/verify-user-email/{email}/{id}",[UserController::class,"registerVerifyUser"]);
//Route socialate
Route::get('authorized/google', [LoginWithSocialiteController::class,'redirectToGoogle']);
Route::get('authorized/google/callback', [LoginWithSocialiteController::class,'handleGoogleCallback']);
Route::get('/authorized/facebook', [LoginWithSocialiteController::class,'redirectToFacebook']);
Route::get('/authorized/facebook/callback', [LoginWithSocialiteController::class,'handleFacebookCallback']);
Route::get("/logout",[UserController::class,'logoutUser']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('index');
})->name('dashboard');


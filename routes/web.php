<?php

use App\Http\Controllers\LoginWithSocialiteController;
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
    
    return view('auth.login');
});


//Route socialate
Route::get('authorized/google', [LoginWithSocialiteController::class,'redirectToGoogle']);
Route::get('authorized/google/callback', [LoginWithSocialiteController::class,'handleGoogleCallback']);
Route::get('/authorized/twitter', [LoginWithSocialiteController::class,'redirectTotwitter']);
Route::get('/authorized/twitter/callback', [LoginWithSocialiteController::class,'handletwitterCallback']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('index');
})->name('dashboard');

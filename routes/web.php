<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\ForgotController;
use App\Http\Controllers\DashController;
use App\Http\Controllers\ProfileController;

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
    return view('welcome');
});

//signin
Route::get('/login', [LoginController::class, 'loginshow'])->name('loginshow');
Route::post('/loginaction', [LoginController::class, 'login'])->name('loginaction');

//signup
Route::get('/signup', [SignupController::class, 'signupshow'])->name('signupshow');
Route::post('/signup', [SignupController::class, 'signup'])->name('signup');

//forgot password
Route::get('/forgot', function () {
return view('forgot');
})->name('forgot');
Route::post('/forgotaction', [ForgotController::class, 'forgot'])->name('forgotaction');

//dashboard
Route::get('/dashboard', [DashController::class, 'dashboard'])->name('dashboard');
//dashboard
Route::get('/dashboardadmin', [DashController::class, 'dashadmin'])->name('dashboardadmin');

//profile
Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
Route::post('/profileaction', [ProfileController::class, 'profileaction'])->name('profileaction');

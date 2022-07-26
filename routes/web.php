<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;

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
    return view('login');
});

Route::view("/sign", 'signup');
Route::view("/dashboard", 'dashboard');
Route::view('/AddCompany', 'Company.companyAdd');


Route::post("/login",[UserController::class,'login'])->name('login');
Route::get("/logout",[UserController::class,'logout'])->name('logout');
Route::post("/signup",[UserController::class,'signup'])->name('signup');

Route::group(['middleware'=>['AuthCheck']],function(){
    Route::resource('company', CompanyController::class);
    Route::resource('employee', EmployeeController::class);
    Route::get("/AddEmployee",[EmployeeController::class,'AddEmployee'])->name('AddEmployee');
});



<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CompanyEmployeeController;


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

// home page logic
Route::get('/', function () {
    if (session()->has('LoggedUser')) {
        return view('dashboard');
    } else {
        return redirect('login');
    }
});

// Resource routes:
Route::resources([
//    'login' => LoginController::class,
    'employees' => EmployeeController::class,
    'companies' => CompanyController::class,
//    'companies.employees' => CompanyEmployeeController::class
]);

// login / logout
Route::get('login', [LoginController::class, 'create']);
Route::post('login', [LoginController::class, 'store']);
Route::get('logout', [LoginController::class, 'destroy']);



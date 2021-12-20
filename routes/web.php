<?php


use App\Http\Controllers\LogoController;
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
    return view('dashboard');
//    if (session()->has('LoggedUser')) {
//        return view('dashboard');
//    } else {
//        return redirect('login');
//    }
});

// login / logout
Route::get('login', [LoginController::class, 'index']);
Route::post('login', [LoginController::class, 'store']);
Route::get('logout', [LoginController::class, 'destroy']);

// Resource routes:
Route::resources([
//    'auth' => AuthController::class,
    'employees' => EmployeeController::class,
    'companies' => CompanyController::class,
    'logos' => LogoController::class,

]);

//Route::resource('companies.employees', CompanyEmployeeController::class)->shallow();



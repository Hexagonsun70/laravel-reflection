<?php

use App\Http\Controllers\LogoController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Artisan;
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

// Home Page Logic:
Route::get('/', function () {
    return view('dashboard');
});

// Login / Logout:
Route::get('login', [LoginController::class, 'index']);
Route::post('login', [LoginController::class, 'store']);
Route::get('logout', [LoginController::class, 'destroy']);

// Resource routes:
Route::resources([
    'employees' => EmployeeController::class,
    'companies' => CompanyController::class,
    'logos' => LogoController::class,
]);

Route::get('storage-link', function () {
    Artisan::call('storage:link');

    dd("Storage is linked!");
});

Route::get('db-reset', function () {
    Artisan::call('migrate:fresh --seed');

    dd("Fresh migration and database seeded!");
});

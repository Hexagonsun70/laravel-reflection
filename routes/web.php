<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use Illuminate\Database\Eloquent\Model;

use App\Providers\Collection;

use App\Models\Company;
use App\Models\Employee;

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
        return view('home');
    } else {
        return redirect('login');
    }
});

// login / logout
Route::get('login', [LoginController::class, 'create']);
Route::post('login', [LoginController::class, 'store']);
Route::get('logout', [LoginController::class, 'destroy']);


Route::get('/employees', function () {
    return view('employees.index', [
        'employees' => Employee::paginate(10),
        'companies' => Company::all()
    ]);
});


Route::get('companies/{id}', function ($id) {
    $employees = Employee::where('company_id', $id)->orderBy('first_name')->get();
    $result = Company::select('name')->where('id', $id)->get();
    $company = substr($result, 10, -3);
    return view('company-employees', [
        'employees' => $employees,
        'company' => $company
        ]);
});


Route::get('companies', function () {
    return view('companies', [
        'companies' => Company::all()
    ]);
});

Route::get('companies/all/table', function () {
    return view('companies-table', [
       'companies' => Company::paginate(5)
    ]);
});

Route::resource('employees', EmployeeController::class);


//Route::get('/employees/create', [EmployeeController::class, 'createEmployee']);
//Route::post('/employees/create', [EmployeeController::class, 'storeEmployee'])->name('employees.create');
//Route::get('/showEmployee/{id}', [EmployeeController::class, 'showEmployee']);
//Route::get('/edit-employees-{id}', [EmployeeController::class, 'editEmployee']);
//Route::patch('/showEmployee/{id}', [EmployeeController::class, 'updateEmployee']);
//Route::delete('/showEmployee/{id}', [EmployeeController::class, 'destroyEmployee']);


//Route::get('/company/create', [CompanyController::class, 'createCompany']);
//Route::post('/index', [CompanyController::class, 'storeCompany']);
//Route::get('/showCompany/{id}', [CompanyController::class, 'showCompany']);
//Route::get('/showCompany/{id}/edit', [Companyontroller::class, 'editCompany']);
//Route::patch('/showCompany/{id}', [CompanyController::class, 'updateCompany']);
//Route::delete('/showCompany/{id}', [CompanyController::class, 'destroyCompany']);

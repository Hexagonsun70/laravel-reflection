<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('employees.index', [
            'employees' => DB::table('employees')->paginate(15)
        ]);
    }

    public function editEmployee($id)
    {
        return view('employee.edit', [
            'employee' => Employee::find($id)
    ]);
    }
}

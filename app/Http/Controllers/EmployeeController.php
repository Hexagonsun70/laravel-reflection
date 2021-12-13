<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Employee;
use App\Models\Company;
use App\Http\Requests;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('employees.index', [
            'employees' => Employee::paginate(10),
            'companies' => Company::all()
        ]);
    }

    public function create()
    {
        return view('employees.create', [
            'companies' => Company::all()
        ]);
    }

    public function store(){

        Employee::create($this->validateEmployee());
        return redirect()->route('employees.index')->with('success', 'Employee added!');
    }

    public function show(Employee $employee)
    {
        return view('employees.show', [
            'employee' => Employee::find($employee->id),
            'companies' => Company::all()
        ]);
    }

    public function edit(Employee $employee)
    {
        //Route model binding means we don't need to use findorfail() here
        return view('employees.edit', [
            'employee' => Employee::find($employee->id),
            'companies' => Company::all()
        ]);
    }

    public function update(Employee $employee)
    {
        ddd($this->validate($employee));
        $attributes = $this->validateEmployee($employee);

        $employee->update($attributes);

        return redirect()->route('employees.index')->with('success', 'Employee Updated!');
    }

    public function destroy(Employee $employee){
        $employee->delete();
        return redirect('/index')->with('success', 'Employee Deleted!');
    }


}

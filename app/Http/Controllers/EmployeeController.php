<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Company;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('employees.index', [
            'employees' => Employee::orderBy('company_id')->paginate(10),
        ]);
    }

    public function create()
    {
        return view('employees.create', [
            'companies' => Company::all()
        ]);
    }

    public function store()
    {
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
        $attributes = $this->validateEmployee($employee);

        $employee->update($attributes);

        return redirect()->route('employees.show', [
            'employee' => $employee,
        ])->with('success', $employee->first_name . ' ' . $employee->last_name . ' Updated!');
    }

    public function destroy(Employee $employee){
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee Deleted!');
    }

    public function validateEmployee(?Employee $employee = null): array
    {
        $employee ??= new Employee();
        return request()->validate([
            'company_id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required',
                'regex:/^([a-z\d\.-]+)@([a-z\d-]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/',
                Rule::unique('employees', 'email')->ignore($employee)
            ],
            'phone_number' => 'required', Rule::unique('employees', 'phone_number')->ignore($employee),
        ]);
    }


}

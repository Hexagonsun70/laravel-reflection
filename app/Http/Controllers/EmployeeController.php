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
            'employees' => Employee::sortable()
            ->with('company')
            ->orderBy('first_name')
            ->orderBy('last_name')
            ->filter(request(['search']))
            ->paginate(10)
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
        $employee = Employee::create($this->validateEmployee());
        return redirect()
            ->route('employees.show', $employee)
            ->with('success', 'Employee ' . $employee->first_name . ' ' . $employee->last_name .  ' created!');
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

    public function updateCompanyEmployee(Employee $employee, $company)
    {
        $attributes = $this->validateEmployee($employee);

        $employee->update($attributes);

        return redirect()->route()('/companies/' . $company->id, [
            'company' => $company,
            'employees' => Employee::where('company_id', $company->id)
                ->filter(request(['search']))
                ->sortable()
                ->orderBy('first_name')
                ->orderBy('last_name')
                ->paginate(10),
        ])->with('success', $employee->first_name . ' ' . $employee->last_name . ' Updated!');
    }

    public function destroy(Employee $employee){
        $employee->delete();
        return redirect()->route('employees.index')
            ->with('success', $employee->first_name . ' ' . $employee->last_name . ' Deleted!');
    }

    public function validateEmployee(?Employee $employee = null): array
    {
        $employee ??= new Employee();
        return request()->validate([
            'company_id' => 'required',
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => ['required', 'max:255',
                'regex:/^([A-z\d\.-]+)@([A-z\d-]+)\.([A-z]{2,8})(\.[A-z]{2,8})?$/',
                Rule::unique('employees', 'email')->ignore($employee)
            ],
            'phone_number' => ['required', 'regex:/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/',
            Rule::unique('employees', 'phone_number')->ignore($employee)]
        ]);
    }


}

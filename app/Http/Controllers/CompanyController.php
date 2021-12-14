<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Validation\Rule;

class CompanyController extends Controller
{
    public function index()
    {
        return view('companies.index', [
            'companies' => Company::paginate(5)
        ]);
    }

    public function create()
    {
        return view('company.create', [
            'companies' => Company::all()
        ]);
    }

    public function store(){
        Company::create($this->validateCompany());
        return redirect()->route('company.index')->with('success', 'Company added!');
    }

    public function show(Company $company)
    {
        return view('companies.show', [
            'company' => Company::find($company->id),
        ]);
    }

    public function edit(Company $company)
    {
        //Route model binding means we don't need to use findorfail() here
        return view('companies.edit', [
            'company' => Company::find($company->id),
        ]);
    }

    public function update(Company $company)
    {
        $attributes = $this->validateCompany($company);

        $company->update($attributes);

        return redirect()->route('companies.show', [
            'company' => $company,
        ])->with('success', 'Company Updated!');
    }

    public function destroy(Company $company){
        $company->delete();
        return redirect()->route('companies.index')
            ->with('success', 'Company Deleted!');
    }

    public function validateCompany(?Company $company = null): array
    {
        $company ??= new Company();
        return request()->validate([
            'name' => 'required',
            'email' => ['required',
                'regex:/^([a-z\d\.-]+)@([a-z\d-]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/',
                Rule::unique('employees', 'email')->ignore($company)
            ],
            'logo' => 'required',
            'website' => ['required',
                'regex:/^((https?|ftp|smtp):\/\/)?(www.)?[a-z0-9]+\.[a-z]+(\/[a-zA-Z0-9#]+\/?)*$/',
                Rule::unique('employees', 'email')->ignore($company)],

        ]);
    }


}

<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use App\Models\Logo;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::filter(request(['search']))
            ->sortable()
            ->paginate(10);

        return view('companies.index', compact('companies'));
    }

    public function create()
    {
        return view('companies.create', [
            'companies' => Company::all(),
            'logos' => Logo::all()
//            'image' => request()->file('image')->store('image', 'public')
        ]);
    }

    public function store(){
        $company = Company::create($this->validateCompany());
        return redirect()
            ->route('companies.index')
            ->with('success', $company->name . ' added!');
    }

    public function show(Company $company)
    {

        return view('companies.show', [
            'company' => $company,
            'employees' => Employee::where('company_id', $company->id)
                ->filter(request(['search']))
                ->sortable()
                ->orderBy('first_name')
                ->orderBy('last_name')
                ->paginate(10),
        ]);
    }

    public function edit(Company $company)
    {
        //Route model binding means we don't need to use findorfail() here
        return view('companies.edit', [
            'company' => $company,
            'logos' => Logo::all()
        ]);
    }

    public function update(Company $company)
    {
        $attributes = $this->validateCompany($company);

        $company->update($attributes);

        return redirect()->route('companies.show', [
            'company' => $company,
        ])->with('success', $company->name . ' Updated!');
    }

    public function destroy(Company $company){
        $company->employees()->delete();
        $company->delete();
        return redirect()->route('companies.index')
            ->with('success', $company->name . ' and Associated Employees Deleted!');
    }

    public function validateCompany(?Company $company = null): array
    {
        $company ??= new Company();
        return request()->validate([
            'name' => 'required',
            'email' => ['required', 'regex:/(?i)^([A-z\d\.-]+)@([A-z\d-]+)\.([A-z]{2,8})(\.[A-z]{2,8})?$/',
                Rule::unique('companies', 'email')->ignore($company)],
            'logos' => 'required',
            'website' => ['required',
                'regex:/[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&=]*)/',
                Rule::unique('companies', 'website')->ignore($company)]
        ]);
    }


}

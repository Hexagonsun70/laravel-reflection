<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Company;
use App\Models\Employee;



class AdminController extends Controller
{
    public function adminPanel(){
        if (session()->has('LoggedUser')) {
            return view('admin-panel', [
                'companies' => Company::paginate(5)
            ]);
        } else {
            return redirect('login');
        }
    }
}

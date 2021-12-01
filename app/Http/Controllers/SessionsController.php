<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function create()
    {
        return view('home');
    }

    public function store()
    {
        //validate the request
        $attributes = request()->validate([
           'email' => 'required|exists:users,email',
            'password' => 'required|exists:users,password'
        ]);

        //attempt to log in the user based on the provided credentials
        if (Auth::attempt($attributes)) {
            return redirect('/admin-panel')->with('success', 'Welcome Back!');
        }

        // auth failed, flash error message
        throw ValidationException::withMessages([
           'email' => 'Your provided credentials are invalid. Please try again'
        ]);
//        return back()
//            ->withInput()
//            ->WithErrors(['email' => 'Your provided credentials are invalid. Please try again']);
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye!');
    }
}

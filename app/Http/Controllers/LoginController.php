<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function create()
    {
        return view('dashboard');
    }


    public function store(Request $request)
    {
        //validate the request
        $credentials = $request->validate([
           'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        //attempt to log in the user based on the provided credentials
        if (Auth::attempt($credentials)) {
            // 'session regenerate' in place to stop session fixation attacks.
            request()->session()->regenerate();
            return redirect('/login')->with('success', 'Welcome Back!');
        } else {
        //auth failed, flash error message
        throw ValidationException::withMessages([
           'email' => 'Your provided credentials are invalid. Please try again',
            'password' => 'Your provided credentials are invalid. Please try again'
        ]);
        }
//        return back()
//            ->withInput()
//            ->WithErrors(['email' => 'Your provided credentials are invalid. Please try again']);
    }

    public function destroy(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        return redirect('/login')->with('success', 'Goodbye!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        //validate the request
        $attributes = request()->validate([
           'email' => 'required|exists:users,email',
            'password' => 'required|exists:users,password'
        ]);

        //attempt to log in the user based on the provided credentials
        if (auth()->attempt($attributes)) {
            // redirect with a success flash message
            return redirect('/')->with('success', 'Welcome Back!');
        }

        // auth failed, flash error message
        throw ValidationException::withMessages([
           'email' => 'Your provided credentials are invalid. Please try again',
            'password' => 'Your provided credentials are invalid. Please try again'
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

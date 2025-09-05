<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }
    public function store(Request $request)
    {
        // validate
        $attributes = request()->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        
        // attempt to authenticate and login the user
        if(!Auth::attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'The provided credentials do not match our records.',
            ]);
        };

        // regenarate the session token
        request()->session()->regenerate();
        
        //redirect
        return redirect('/jobs');
    }
    public function destroy()
    {
        Auth::logout();
        return redirect('/');
    }
}

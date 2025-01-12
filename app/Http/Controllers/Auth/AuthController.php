<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if(!empty(Auth::check())){
           return redirect('panel/dashboard');
        }

        return view('auth.login');
    }

    // Handle login request
    public function login(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        // Attempt to log the user in
        if (Auth::attempt($credentials)) {
            return redirect()->intended('panel/dashboard');
        }

        return redirect()->back()->with('error','Please Enter Current Email and Password');

    }

    public function logout()
    {
        Auth::logout();
        return redirect(url(''));
    }
}

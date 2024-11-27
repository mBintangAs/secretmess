<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    function index() {
        return view('auth.login');
    }
    function login(Request $request) {
        $credentials = $request->only('name', 'password');
        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();
            if (auth()->user()->role == 1) {
                return redirect()->route('dashboard.admin');
            }
            return redirect()->intended('dashboard');
        }
        dd($credentials);
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
        
    }
    function logout() {
        auth()->logout();
        return redirect('/');
    }
}

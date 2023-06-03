<?php

namespace App\Http\Controllers;

use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function show(string $current = 'Home') : View {
        $user = Auth::user()->name;

        return view('admin', [
            'current' => $current,
            'user' => $user
        ]);
    }

    public function showLogin() : View {
        return view('admin', [
            'current' => 'login',
            'user' => ''
        ]);
    }


    public function login(Request $request) : RedirectResponse {
        $credentials = $request->validate([
            'name' => 'required|regex:/^[a-zA-Z0-9\s]+$/|between:3,60',
            'password' => 'required|ascii|between:8,64',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect('/admin');
        }
        
        return back()->withErrors([
            'name' => 'The provided credentials do not match our records.',
        ])->onlyInput('name');
    }

    public function register(Request $request) : RedirectResponse {
    }
}

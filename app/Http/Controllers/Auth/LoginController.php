<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{


    public function showLoginForm()
    {
        return view('auth.login');
    }
    
            public function login(Request $request)
        {
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            if (Auth::attempt($credentials)) {
                return redirect()->route('dashboard.show'); // Redirige vers le dashboard après login
            }

            return back()->withErrors([
                'email' => 'Email ou mot de passe incorrect.',
            ]);




        }
}

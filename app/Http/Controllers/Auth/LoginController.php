<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; 

class LoginController extends Controller
{
    use AuthenticatesUsers;
    
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required|string',
            'password' => 'required|string|min:8',
        ]);

        $credentials = $request->only('password');

        if (filter_var($request->login, FILTER_VALIDATE_EMAIL)) {
            $credentials['email'] = $request->login;
        } else {
            $credentials['name'] = $request->login;
        }

        if (Auth::attempt($credentials)) {
            if (Auth::user()->roles === 'admin' || Auth::user()->roles === 'owner') {
                if ($request->session()->has('url.intended')) {
                    return redirect()->intended('/dashboard');
                }
                return redirect('/dashboard');
            } else {
                return redirect('/');
            }
        }

        return redirect()->back()->withInput($request->only('login'))->withErrors([
            'login' => 'These credentials do not match our records.',
        ]);
    }
}
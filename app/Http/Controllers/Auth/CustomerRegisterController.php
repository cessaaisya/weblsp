<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Customers;

class CustomerRegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:customers',
            'email' => 'required|string|email|max:255|unique:customers',
            'password' => 'required|string|min:1',
            'phone' => 'required|string|max:255',
            'address1' => 'required|string|max:255',
            'address2' => 'nullable|string|max:255',
            'address3' => 'nullable|string|max:255',
        ]);

        Customers::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'address1' => $request->address1,
            'address2' => $request->address2,
            'address3' => $request->address3,
        ]);
        

        return redirect()->route('login.login')->with('success', 'Registration successful! Please login.');
    }
}
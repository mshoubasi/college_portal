<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('home');
        } else {
            return back()->withInput()->withErrors([
                'email' => 'Invalid credentials.',
            ]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}

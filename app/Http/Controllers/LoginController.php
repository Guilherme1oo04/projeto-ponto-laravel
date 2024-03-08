<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login() {
        if (Auth::check()) {
            return redirect()->back();
        }
        return view('login');
    }

    public function authenticate(Request $request) {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if(Auth::user()->super_admin) {
                return redirect()->route('admin.home');
            }

            return redirect()->route('home');
        }

        return redirect()->route('auth.login')->with('message', 'Falha no Login');

    }

    public function logout() {
        Auth::logout();

        return redirect()->route('auth.login');
    }
}

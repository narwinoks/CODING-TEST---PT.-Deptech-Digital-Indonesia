<?php

namespace App\Http\Controllers\Web\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        return view('features.auth.login');
    }

    public function processLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $data = $request->only('email', 'password');
        if (Auth::attempt($data)) {
            return redirect()->route('home.index')->with('success', 'Login Success');
        } else {
            return redirect()->back()->with('danger', 'Invalid Username or Password !');
        }
    }
}

<?php

namespace App\Http\Controllers\Web\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
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
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logout Success');
    }

    public function profile(Request $request)
    {
        return view('features.auth.profile');
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        if ($user->email == $request->email) {
            $emailRules = "required";
        } else {
            $emailRules = "required|unique:users";
        }
        $request->validate([
            'email' => $emailRules,
            'first_name' => 'required',
            'last_name' => 'required'
        ]);

        $data = $request->only('email', 'first_name', 'last_name');
        $oldUser = User::find($user->id);
        if ($oldUser) {
            $oldUser->update($data);
            return redirect()->back()->with('success', 'Update Profile Success !');
        } else {
            return redirect()->back()->with('danger', 'Data not found');
        }
    }
}

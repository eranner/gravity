<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function login() {
        return view('login');
    }

    public function loginUser(Request $request){
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (auth()->attempt($credentials)) {
            // Authentication passed...
            return redirect()->route('dashboard');
        } else {
            return redirect()->back()->withInput()->withErrors(['email' => 'Invalid username or password.']);
        }
    }

    public function logout() {
        auth()->logout();
        return redirect()->route('main');

    }
}

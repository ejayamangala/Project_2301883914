<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{
    public function index(){
        return view ('login', [
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if ($request->remember){
            Cookie::queue('email',$credentials['email'],60);
            Cookie::queue('password',$credentials['password'],60);
        }
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if(Auth::user()->role == 'admin'){
                return redirect()->intended('/homeadmin');
            }
            return redirect()->intended('/homeuser');
        }

        return back()->with('fail','Login Failed !!!');
    }

    public function logout(){
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/home');
    }
}



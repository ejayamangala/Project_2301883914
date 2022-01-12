<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public static function index(){
        if(Auth::user()->role == 'admin'){
            return view('homeadmin', ['user' => User::paginate(6)]);
        }
    }

    public static function search(){
        if(Auth::user()->role == 'admin'){
            return view('searchadmin',['user' => User::paginate(6)]);
        }
    }

    public function manageuser()
    {
        if(Auth::user()->role == 'admin'){
            return view ('manageuser', [
                'title' => 'manageuser'
            ], ['user' => User::all()]);
        }
    }


}

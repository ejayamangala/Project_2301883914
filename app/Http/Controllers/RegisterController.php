<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    public function index(){
        return view ('register', [
            'title' => 'register'
        ]);
    }

    public function index2(){
        return view ('insertuser', [
            'title' => 'insertuser'
        ]);
    }
    public function db(Request $request){

        $file =  $request->file('user_img');
        $imageName = time().'_'.$file->getClientOriginalName();

        Storage::putFileAs('public/images',$file,$imageName);
        $imagePath = 'images/'.$imageName;

        $request->validate([
            'name' => 'required|max:30',
            'email' => 'required|email:dns|unique:users',
            'phone'=> 'required|numeric',
            'password' => 'required|min:8',
            'confirmpassword' => 'required|same:password',
            'gender' => ['required', 'string'],
            'role' => 'string',
            'user_img' => 'required'
        ]);

        $request['password'] = bcrypt($request['password']);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = $request->password;
        $user->gender = $request->gender;
        $user->user_img = $imagePath;

        $user->save();
        return redirect('/login')->with('success','Registration Successfull !!!');


    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $query = request('search_query');

        $user = User::Where('name', 'like', '%' . request('search_query') . '%')->paginate(6);
        return view('user' , ['user' => $user]);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

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
        return view('homeadmin', ['user' => User::paginate(6)]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //

        if(Auth::user()->role == 'admin'){
            return view('detailprofiladmin' ,[
                'user' =>$user]
            );
        }elseif(Auth::user()->role == ""){
            return view('detailprofil')->with('user', auth()->user());
        }
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */


    public function edit(User $user)
    {
        //

        $data['title'] = 'Update Profil';
        $data['user'] = $user;
        if(Auth::user()->role == 'admin'){
            return view('updateprofiladmin', $data );
        }
        elseif(Auth::user()->role == ""){
            return view('updateprofil')->with('user', auth()->user());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */


    public function update(Request $request, User $user)
    {
        //
        $request->validate([
            'name' => 'required|max:30',
            'email' => 'required|email:dns',
            'phone'=> 'required|numeric',
            'password' => 'required|min:8',
            'confirmpassword' => 'required|same:password',
            'gender' => ['required', 'string'],
            'user_img' => 'required'
        ]);
        $file =  $request->file('user_img');
        $imageName = time().'_'.$file->getClientOriginalName();

        Storage::putFileAs('public/images',$file,$imageName);
        $imagePath = 'images/'.$imageName;

        $request['password'] = bcrypt($request['password']);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = $request->password;
        $user->gender = $request->gender;
        $user->user_img = $imagePath;
        $user->save();
        if(Auth::user()->role == 'admin'){
            return view('homeadmin', ['user' => User::paginate(6)]);
        }else{
            return redirect('/homeuser')->with('success', 'Update Profil Success');
        }

    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        $user->delete();
        return redirect('/manageuser')->with('success', 'Delete User Berhasil');
    }
}

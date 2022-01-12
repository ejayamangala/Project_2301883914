<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = "Admin";
        $user->email = "admin@sehatkuy.net";
        $user->phone = "admin@sehatkuy.net";
        $user->password = bcrypt('adminsehatkuy');
        $user->gender = "Male";
        $user->role = "admin";
        $user->user_img = "images/edward.jpg";
        $user->save();
        User::insert([
        ]);


    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
//    use RegistersUsers;

    /**
     *
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create()
    {
        return User::create([
            'name' => "sm.sergey",
            'email' => "sm.sergey.v@yandex.ru",
            'password' => Hash::make("sm.sergey.v@yandex.ru"),
        ]);
    }
}

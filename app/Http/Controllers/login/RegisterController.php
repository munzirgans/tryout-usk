<?php

namespace App\Http\Controllers\login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function user(){
        return view("login.registeruser");
    }

    public function reg_user(Request $req){
        $this->validate($req,[
            "fullname" => "required|regex:/^[a-zA-Z\s]+$/u",
            "email" => "required|email",
            "password" => "required|max:18|min:8|confirmed",
            "handphone" => "required|numeric",
        ]);
        $fullname = $req->input("fullname");
        $email = $req->input("email");
        $password = $req->input("password");
        $handphone = $req->input("handphone");
        User::create([
            "fullname"  => $fullname,
            "email" => $email,
            "password" => Hash::make($password),
            "handphone" => $handphone,
            "role" => "user"
        ]);
        return redirect()->route("login.index");
    }
}

<?php

namespace App\Http\Controllers\login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\User;
use Session;

class LoginController extends Controller
{
    public function index(){
        $message = "";
        return view("login.login", ["message" => $message]);
    }
    public function login(Request $req){
        $email = $req->input("email");
        $password = $req->input("password");
        $message = "";
        $user = User::where("email", $email)->first();
        if(isset($user)){
            if(Hash::check($password, $user->password)){
                Session::put( "user",$user);
                if ($user->role == "admin"){
                    return redirect()->route("admin.dashboard");
                }
            }else{
                $message = "Email atau password anda salah !";
                return view("login.login", ["message" => $message]);
            }
        }else{
            $message = "Email atau password anda salah !";
            return view("login.login", ["message" => $message]);
        }
    }
}

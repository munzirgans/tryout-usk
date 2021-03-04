<?php

namespace App\Http\Controllers\admin\profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\User;
use File;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(){
        $user = User::find(Session::get("user")->id);
        return view("admin.profile.index", ["user" => $user]);
    }
    public function edit($id){
        $user = User::find($id);
        return view("admin.profile.data.edit", ["u" => $user]);
    }
    public function update(Request $req, $id){
        $this->validate($req,[
            "fullname" => "required|regex:/^[a-zA-Z\s]+$/u",
            "email" => "required|email",
            "address" => "required",
        ]);
        $user = User::find($id);
        if($req->file("photo") != null){
            File::delete("assets/images/users/".$user->photo);
            $photo = $req->file("photo");
            $user->fullname = $req->input("fullname");
            $user->email = $req->input("email");
            $user->address = $req->input("address");
            $user->save();
            $photo->move("assets/images/users", $photo->getClientOriginalName());
        }else{
            $user->fullname = $req->input("fullname");
            $user->email = $req->input("email");
            $user->address = $req->input("address");
            $user->save();
        }
        return redirect()->route("profile.index");
    }
    public function password_index(){
        $message = "";
        return view("admin.profile.password.edit", ["message" => $message]);
    }
    public function password(Request $req){
        $message = "";
        $user = User::find($req->input("id"));
        if(Hash::check($req->input("old_password"), $user->password)){
            $this->validate($req,[
                "old_password" => "required",
                "password" => "required|confirmed",
            ]);
            $user->password = Hash::make($req->input("password"));
            $user->save();
            return redirect()->route("profile.index");
        }else{
            $message = "Old Password is not same !";
            return view("admin.profile.password.edit", ["message" => $message]);
        }
    }
}

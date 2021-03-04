<?php

namespace App\Http\Controllers\admin\courier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class CourierController extends Controller
{
    public function index(){
        $users = User::where("role", "courier")->get();
        return view("admin.courier.index", ["users" => $users]);
    }
    public function add(){
        return view("admin.courier.add");
    }
    public function store(Request $req){
        $this->validate($req,[
            "photo" => "required|image",
            "fullname" => "required|regex:/^[a-zA-Z\s]+$/u",
            "email" => "required|email",
            "address" => "required",
            "password" => "required|confirmed",
            "handphone" => "required|numeric",
        ]);
        $photo = $req->file("photo");
        User::create([
            "photo" => $photo->getClientOriginalName(),
            "fullname" => $req->input("fullname"),
            "email" => $req->input("email"),
            "password" => Hash::make($req->input("password")),
            "role" => "courier",
            "address" => $req->input("address"),
            "handphone" => $req->input("handphone")
        ]);
        $photo->move("assets/images/users/", $photo->getClientOriginalName());
        return redirect()->route("courier.index");
    }
    public function delete($id){
        User::find($id)->delete();
        return redirect()->route("courier.index");
    }
    public function edit($id){
        $user = User::find($id);
        return view("admin.courier.edit",["u" => $user]);
    }
    public function update(Request $req, $id){
        $this->validate($req,[
            "photo" => "image",
            "fullname" => "required|regex:/^[a-zA-Z\s]+$/u",
            "email" => "required|email",
            "address" => "required",
            "password" => "required|confirmed",
            "handphone" => "required|numeric",
        ]);
        $user = User::find($id);
        if($req->has("photo")){
            $photo = $req->file("photo");
            $user->photo = $photo->getClientOriginalName();
            $user->fullname = $req->input("fullname");
            $user->email = $req->input("email");
            $user->handphone = $req->input("handphone");
            $user->address = $req->input("address");
            $user-save();

        }else{
            $user->fullname = $req->input("fullname");
            $user->email = $req->input("email");
            $user->handphone = $req->input("handphone");
            $user->address = $req->input("address");
            $user->save();
        }
        return redirect()->route("courier.index");
    }
}

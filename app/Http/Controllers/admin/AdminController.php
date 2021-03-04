<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Hash;
use Session;
use App\User;


class AdminController extends Controller
{
    public function index(){
        $user = count(User::where("role", "user")->get());
        $courier = count(User::where("role", "courier")->get());
        $product = count(Product::all());
        return view("admin.dashboard.index",["user" => $user, "courier" => $courier, "product" => $product]);
    }
    public function logout(){
        Session::flush();
        return redirect()->route("login.index");
    }
}

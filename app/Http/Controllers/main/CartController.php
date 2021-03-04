<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Cart;
use App\Product;
use Session;

class CartController extends Controller
{
    public function index(){
        $cart = Cart::where("user_id",Session::get("user")->id)->get();
        $total = Cart::select(DB::raw("SUM(price) as total"))->where("user_id", Session::get("user")->id)->first();
        return view("main.cart.index",["cart"=>$cart, "total" => $total]);
    }
    public function store(Request $req){
        $product= Product::find($req->input("id"));
        Cart::create([
            "user_id" => Session::get("user")->id,
            "photo" => $product->photo,
            "name" => $product->name,
            "qty" => $req->input("qty"),
            "price" => $product->price * $req->input("qty"),
        ]);
        return redirect()->route("main.cart");
    }
    public function delete($id){
        Cart::find($id)->delete();
        return redirect()->route("main.cart");
    }
    public function edit($id){
        $cart = Cart::find($id);
        return view("main.cart.edit",["cart" => $cart]);
    }
    public function update(Request $req, $id){
        $cart = Cart::find($id);
        $cart->qty = $req->input("qty");
        $cart->save();
        return redirect()->route("main.cart");
    }
}

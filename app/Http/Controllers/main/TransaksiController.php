<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cart;
use Session;
use App\User;

class TransaksiController extends Controller
{
    public function index(){
        return view('main.transaction.index');
    }
    public function payment(){
        $id =  Session::get("user")->id;
        $cart = Cart::where("user_id", $id)->get();
        foreach($cart as $c){
            Cart::create([
                "user_id" => $id,
                "product_id" => $c->product_id,
                "price" => $c->price,
                "qty" => $c->qty,
                "address" => User::where("id", $id)->first()->address,
            ]);
        }
        return redirect()->route("main.order");
    }
}

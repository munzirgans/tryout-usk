<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Cart;

class ProductController extends Controller
{
    public function index($id){
        $product = Product::where("id", $id)->first();
        return view("main.product.index",["p" => $product]);
    }
}

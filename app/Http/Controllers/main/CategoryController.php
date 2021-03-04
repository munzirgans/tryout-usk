<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class CategoryController extends Controller
{
    public function index($name){
        $product = Product::where("category", $name)->get();
        return view("main.category.index",["product" => $product, "name" => $name]);
    }
}

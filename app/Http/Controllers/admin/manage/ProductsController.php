<?php

namespace App\Http\Controllers\admin\manage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Config;

class ProductsController extends Controller
{
    public function index(){
        $products = Product::all();
        return view("admin.manage.products.index", ["products" => $products]);
    }
    public function add(){
        $configs = Config::all();
        return view("admin.manage.products.add", ["configs" => $configs]);
    }
    public function store(Request $req){
        $this->validate($req,[
            "name" => "required|regex:/^[a-zA-Z\s]+$/u",
            "photo" => "image",
            "category" => "required",
            "stock" => "required|numeric",
            "price" => "required|numeric",
            "description" => "required",
            "star" => "required|numeric"
        ]);
        $name = $req->input("name");
        $category = $req->input("category");
        $stock = $req->input("stock");
        $price = $req->input("price");
        $photo = $req->file("photo");
        $star = $req->input("star");
        $description = $req->input("description");
        Product::create([
            "name" =>$name,
            "category" => $category,
            "stock" => $stock,
            "price" => $price,
            "star" => $star,
            "description" => $description,
            "photo" => $photo->getClientOriginalName(),
        ]);
        $photo->move("assets/images/products", $photo->getClientOriginalName());
        return redirect()->route("manage.products.index");
    }
    public function edit($id){
        $product = Product::find($id);
        $configs = Config::all();
        return view("admin.manage.products.edit", ["p" => $product, "configs" => $configs]);
    }
    public function delete($id){
        Product::find($id)->delete();
        return redirect()->route("manage.products.index");
    }
    public function update($id, Request $req){
        $this->validate($req, [
            "name" => "required|regex:/^[a-zA-Z\s]+$/u",
            "photo" => "image",
            "category" => "required",
            "stock" => "required|numeric",
            "price" => "required|numeric",
            "description" => "required",
            "star" => "required|numeric"
        ]);
        $products = Product::find($id);
        if($req->has("photo")){
            $photo = $req->file("photo");
            $products->name = $req->input("name");
            $products->photo = $photo->getClientOriginalName();
            $products->category = $req->input("category");
            $products->stock = $req->input("stock");
            $products->price = $req->input("price");
            $products->description = $req->input("description");
            $products->star = $req->input("star");
            $products->save();
            $photo->move("assets/images/products", $photo->getClientOriginalName());
        }else{
            $products->name = $req->input("name");
            $products->category = $req->input("category");
            $products->stock = $req->input("stock");
            $products->price = $req->input("price");
            $products->description = $req->input("description");
            $products->star = $req->input("star");
            $products->save();
        }
        return redirect()->route("manage.products.index");
    }
}

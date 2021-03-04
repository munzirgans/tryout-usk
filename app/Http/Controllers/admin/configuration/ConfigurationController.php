<?php

namespace App\Http\Controllers\admin\configuration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Config;
use File;
class ConfigurationController extends Controller
{
    public function index(){
        $config = Config::all();
        return view("admin.configuration.index", ["config" => $config]);
    }
    public function add(){
        return view("admin.configuration.add");
    }
    public function store(Request $req){
        $this->validate($req,[
            "photo" => "required|image",
            "category" => "required|regex:/^[a-zA-Z\s]+$/u",
        ]);
        $photo = $req->file("photo");
        Config::create([
            "category" => $req->input("category"),
            "photo" => $photo->getClientOriginalName(),
        ]);
        $photo->move("assets/images/category",$photo->getClientOriginalName());
        return redirect()->route("configuration.category.index");
    }
    public function edit($id){
        $c = Config::find($id);
        return view("admin.configuration.edit", ["c" => $c]);
    }
    public function delete($id){
        Config::find($id)->delete();
        return redirect()->route("configuration.category.index");
    }
    public function update(Request $req, $id){
        $config = Config::find($id);
        $this->validate($req,[
            "category" => "required|regex:/^[a-zA-Z\s]+$/u",
            "photo" => "image"
        ]);
        if($req->has("photo")){
            $photo = $req->file("photo");
            File::delete("assets/images/category/".$config->photo);
            $config->photo = $photo->getClientOriginalName();
            $config->category = $req->input("category");
            $config->save();
            $photo->move("assets/images/category", $photo->getClientOriginalName());
        }else{
            $config->category = $req->input("category");
            $config->save();
        }
        return redirect()->route("configuration.category.index");
    }
}

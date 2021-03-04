<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Config;

class MainController extends Controller
{
    public function home(){
        $config = Config::all();
        return view("main.home.index", ["config" => $config]);
    }
}

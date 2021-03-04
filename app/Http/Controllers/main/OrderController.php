<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\Cart;
use Session;
use App\User;

class OrderController extends Controller
{
    public function index(){
        return view("main.order.index");
    }
    public function detail(){
        return view("main.order.detail");
    }

}

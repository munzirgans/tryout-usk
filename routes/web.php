<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(["middleware" => "Login"], function(){
    Route::get("login", "login\LoginController@index")->name("login.index");
    Route::post("login", "login\LoginController@login")->name("login.login");
    Route::prefix("register")->group(function(){
        Route::get("user", "login\RegisterController@user")->name("register.user");
        Route::post("user", "login\RegisterController@reg_user")->name("register.user.post");
    });
});
Route::group(["middleware" => "Logged"],function(){
    Route::prefix("admin")->group(function(){
        Route::get("/", "admin\AdminController@index")->name("admin.dashboard");
        Route::get("logout", "admin\AdminController@logout")->name("admin.logout");

        Route::prefix("manage")->group(function(){
            Route::prefix("products")->group(function(){
                Route::get("/" , "admin\manage\ProductsController@index")->name("manage.products.index");
                Route::get("add", "admin\manage\ProductsController@add")->name("manage.products.add");
                Route::get('edit/{id}', "admin\manage\ProductsController@edit")->name("manage.products.edit");
                Route::get("delete/{id}", "admin\manage\ProductsController@delete")->name("manage.products.delete");
                Route::post("update/{id}", "admin\manage\ProductsController@update")->name("manage.products.update");
                Route::post("store", "admin\manage\ProductsController@store")->name("manage.products.store");
            });
        });
        Route::prefix("configuration")->group(function(){
            Route::prefix("category")->group(function(){
                Route::get("/", "admin\configuration\ConfigurationController@index")->name("configuration.category.index");
                Route::get("add", "admin\configuration\ConfigurationController@add")->name("configuration.category.add");
                Route::get("edit/{id}","admin\configuration\ConfigurationController@edit")->name("configuration.category.edit");
                Route::get("delete/{id}","admin\configuration\ConfigurationController@delete")->name("configuration.category.delete");

                Route::post("update/{id}","admin\configuration\ConfigurationController@update")->name("configuration.category.update");
                Route::post("store", "admin\configuration\ConfigurationController@store")->name("configuration.category.store");
            });
        });
        Route::prefix("courier")->group(function(){
            Route::get("/", "admin\courier\CourierController@index")->name("courier.index");
            Route::get("add", "admin\courier\CourierController@add")->name("courier.add");
            Route::get("delete/{id}", "admin\courier\CourierController@delete")->name("courier.delete");
            Route::get("edit/{id}", "admin\courier\CourierController@edit")->name("courier.edit");
            Route::post("store", "admin\courier\CourierController@store")->name("courier.store");
            Route::post("update/{id}","admin\courier\CourierController@update")->name("courier.update");
        });
        Route::prefix("profile")->group(function(){
            Route::get("/", "admin\profile\ProfileController@index")->name("profile.index");
            Route::get("edit/{id}", "admin\profile\ProfileController@edit")->name("profile.edit");
            Route::post("update/{id}","admin\profile\ProfileController@update")->name("profile.update");
            Route::post("password", "admin\profile\ProfileController@password")->name("profile.password");
            Route::get("password", "admin\profile\ProfileController@password_index")->name("profile.password.index");
        });
    });
});

Route::get("/", "main\MainController@home")->name("main.home");
Route::get("product/{id}", "main\ProductController@index")->name("main.product");
Route::get("cart", "main\CartController@index")->name("main.cart");
Route::get("order", "main\OrderController@index")->name("main.order");
Route::get("order/{id}","main\OrderController@detail")->name("main.order.detail");
Route::get("category/{name}", "main\CategoryController@index")->name("main.category");
Route::post("cart/store","main\CartController@store")->name("main.cart.store");
Route::get("cart/delete/{id}", "main\CartController@delete")->name("main.cart.delete");
Route::get("cart/edit/{id}", "main\CartController@edit")->name("main.cart.edit");
Route::post("cart/update/{id}", "main\CartController@update")->name("main.cart.update");
Route::get("payment", "main\TransaksiController@index")->name("main.transaksi");
Route::get("payment/cash", "main\TransaksiController@payment")->name("main.transaksi.payment");

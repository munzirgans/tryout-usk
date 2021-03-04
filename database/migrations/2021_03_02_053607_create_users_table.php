<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\User;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments("id");
            $table->string("photo");
            $table->string("fullname");
            $table->string("email");
            $table->text("password");
            $table->string("handphone");
            $table->text("address");
            $table->string("role");
            $table->timestamps();
        });

        #Demo Account#
        User::create([
            "photo" => "donald.jpg",
            "fullname" => "Muhammad Munzir",
            "email" => "munzirmz36@gmail.com",
            "password" => '$2y$10$kxS.d6Cjq1uL3/bgvXNbbeJijHbpXmXz3y6hmkEjx1gYOrHisUWmu',
            "handphone" => "081220304127",
            "address" => "Jl. Pucung 3",
            "role" => "admin"
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

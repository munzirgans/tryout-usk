<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ["photo", "name", "qty", "price", "user_id"];
}

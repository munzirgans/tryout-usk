<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ["name","photo", "category", "stock", "price", "description", "star"];
}

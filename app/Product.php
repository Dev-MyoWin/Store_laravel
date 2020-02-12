<?php

namespace App;

use App\Category;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=['lock_products','name','category_id','amount'];

    public function category(){

    return $this->belongsTo(Category::class);

    }
}

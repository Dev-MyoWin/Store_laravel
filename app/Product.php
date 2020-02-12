<?php

namespace App;

use App\Category;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=['lock_products','name','amount','category_id'];

    public function category()
    {
      return $this->belongsto(Category::class);
    }
}

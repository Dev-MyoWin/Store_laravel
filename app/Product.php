<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Product extends Model
{
    protected $fillable=['lock_products','name','amount','category_id'];

    public function category()
    {
      return $this->belongsto(Category::class);
    }
}

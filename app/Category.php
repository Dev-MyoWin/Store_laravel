<?php

namespace App;

use App\Product;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=['name'];

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}

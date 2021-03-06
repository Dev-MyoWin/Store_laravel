<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    public function product()
    {
      $product->category()->associate($category)->save();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'name'=>'required|unique:products',
          'image' =>'required',
          'category_id' =>'required',
          'amount'=>'required|min:1|max:6'
        ];
    }
}

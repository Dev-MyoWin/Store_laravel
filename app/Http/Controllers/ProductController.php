<?php

namespace App\Http\Controllers;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProduct;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.index',['products'=>Product::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create',['categories'=>Category::all()]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduct $request)
    {
      // $product= new Product;
      // $product->lock_products="false";
      // $product->name=$request->product_name;
      // $product->category=$request->product_category;
      // $product->amount=$request->amount;
      // $product->save();
      Product::create(['name'=>$request->name,'amount'=>$request->amount,'category_id'=>$request->category_id]);

      return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('products.edit',['edit'=>Product::find($id)],['categories'=>Category::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        Product::where('id',$id)->update(['name'=>$request->name,'category_id'=>$request->category_id,'amount'=>$request->amount]);
        return redirect()->route('products.index',['product'=>$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::find($id);
        $product->delete();
        return redirect()->route('products.index');
    }

    public function lock(Request $request){
        $id = $request->id;
        $lock = Product::find($id);
        if($lock->lock_products == 'false'){
        Product::where('id',$id)->update(['lock_products'=>'true']);
        }
        else{
        Product::where('id',$id)->update(['lock_products'=>'false']);
        }
        return redirect()->route('products.index');
    }
}

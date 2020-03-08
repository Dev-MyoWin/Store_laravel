<?php

namespace App\Http\Controllers;
use App\Product;
use App\Category;
use App\Notification;
use App\History;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        return view('products.index',['products'=>Product::paginate(9)]);
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
      $file = $request->file('image');

      $file_name = uniqid().'_'.$request->image->getClientOriginalName();

      $file->move(public_path().'/image/author/',$file_name);

      Product::create(['image'=>$file_name,'name'=>$request->name,'amount'=>$request->amount,'category_id'=>$request->category_id]);

      History::create(['description'=> Auth::user()->name." added "." product ".$request->name]);

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
        $file = $request->file('image');

        $product = Product::where('id',$id)->first();

        $file_name = uniqid().'_'.$request->image->getClientOriginalName();

        $file->move(public_path().'/image/author/',$file_name);

        Product::where('id',$id)->update(['image'=>$file_name,'name'=>$request->name,'amount'=>$request->amount]);

        History::create(['description'=> Auth::user()->name." edited "." product ".$product->name]." as ".$request->name);

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
        // $product=Product::find($id);
        // return $product;
        // $product->delete();
        // return redirect()->route('products.index');
    }

    public function lock(Request $request){
        $id = $request->id;
        $product = Product::whereId($id)->first();
        $lock = Product::find($id);
        if($lock->lock_products == 'false'){
        Product::where('id',$id)->update(['lock_products'=>'true']);
        History::create(['description'=> Auth::user()->name." locked "." product ".$product->name]);
        }
        else{
        Product::where('id',$id)->update(['lock_products'=>'false']);
        History::create(['description'=> Auth::user()->name." unlocked "." product ".$product->name]);
        }
        return redirect()->route('products.index');
    }

    public function plusAmount(Request $request){
        $id = $request->id;
        
        $product = Product::find($id);
        Product::where('id',$id)->update(['amount'=>$product->amount+1]);
        History::create(['description'=> Auth::user()->name." added "." product amount of ".$product->name]);
        if($product->amount < 11){
          Notification::create(['title'=>'less than 10','description'=> Auth::user()->name.' noti increase amount '.$product->amount]);
        }
        return redirect()->route('products.index');
    }

    public function minusAmount(Request $request){
        $id = $request->id;
        $product = Product::find($id);
        Product::where('id',$id)->update(['amount'=>$product->amount-1]);
        History::create(['description'=> Auth::user()->name." subedd "." product amount of ".$product->name]);
        if($product->amount < 11){
          Notification::create(['title'=>'less than 10','description'=>Auth::user()->name.' noti decrease amount '.$product->amount]);
        }
        return redirect()->route('products.index');
    }
    public function delete($id)
    {
      $product=Product::find($id);
      $product->delete();
      History::create(['description'=> Auth::user()->name." deleted "." product ".$product->name]);
      return redirect()->route('products.index');
    }

    public function deleteAllData()
    {
        $categories = Category::all();
        $products = Product::all();
        $histories = History::all();
        $editors = User::where('role_id',1)->get();

        foreach($categories as $category)
        {
            $category->delete();
        }
        foreach($products as $product)
        {
            $product->delete();
        }
        foreach($histories as $history)
        {
            $history->delete();
        }
        foreach($editors as $editor)
        {
            $editor->delete();
        }
        return redirect()->route('products.index');
    }
}

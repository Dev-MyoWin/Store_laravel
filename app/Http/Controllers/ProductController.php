<?php

namespace App\Http\Controllers;
use App\Product;
use App\Category;
use App\User;
use Mail;
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

        $file_name = uniqid().'_'.$request->image->getClientOriginalName();

        $file->move(public_path().'/image/author/',$file_name);

        Product::where('id',$id)->update(['image'=>$file_name,'name'=>$request->name,'amount'=>$request->amount]);
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
        $lock = Product::find($id);
        if($lock->lock_products == 'false'){
        Product::where('id',$id)->update(['lock_products'=>'true']);
        }
        else{
        Product::where('id',$id)->update(['lock_products'=>'false']);
        }
        return redirect()->route('products.index');
    }

    public function plusAmount(Request $request){
        $id = $request->id;
        $product = Product::find($id);
        Product::where('id',$id)->update(['amount'=>$product->amount+1]);
        return redirect()->route('products.index');
    }

    public function minusAmount(Request $request){
        $id = $request->id;
        $product = Product::find($id);
        Product::where('id',$id)->update(['amount'=>$product->amount-1]);
        // return $product->amount;
        if($product->amount < 10)
        {
          $latestPost = DB::table('products')->orderBy('created_at','desc')->first();
          $users = User:: all();
          foreach($users as $user){
          $data = array('name'=>'Store Application','username'=>$user->name,'email'=>$user->email,'id'=>$latestPost->id);
            Mail::send('mails.decrease', $data, function($message) use ($user) {
              $message->to($user->email, $user->name)->subject
              ('HTML Testing Mail');
              $message->from('yoeholaravel@gmail.com','Store Application');
            });
          }
        }
        return redirect()->route('products.index');
    }
    public function delete($id)
    {
      $product=Product::find($id);
      $product->delete();
      return redirect()->route('products.index');
    }
}

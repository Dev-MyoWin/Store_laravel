@extends('layouts.master')
@section('title','Products')
@section('content')
@if(count($products)!=0)
<div class="container">
  <div class="row">
  <h1 class=" my-5"><i class="fa fa-th">&nbsp;&nbsp;&nbsp;</i>Products</h1>
    <table class="table shadow">
  <thead>
    <tr align="center" class="table-secondary">
      <th>Lock</th>
      <th>No.</th>
      <th>Name</th>
      <th>Category</th>
      <th>Created Date</th>  
      <th></th>
      <th>Amount</th>
      <th></th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <?php $x=1;?>
@foreach ($products as $product)
  <tbody>
    <tr align="center">
      <th>
        <form action="{{route('lock',['id'=>$product->id])}}" method="POST">
        @csrf
          <input name="_method" type="hidden">
          @if($product->lock_products == "true") 
            <button type="submit" class="btn btn-outline-dark text-dark"><i class="fa fa-lock"></i></button>
          @else
            <button type="submit" class="btn btn-outline-dark text-warning"><i class="fa fa-unlock-alt"></i></button>
          @endif
        </form>
      </th>
      <td class="pt-3"><?php echo $x;$x++?></td>
      <td class="pt-3">{{$product->name}}</td>
      <td class="pt-3">{{$product->category}}</td>
      <td class="pt-3">{{\Carbon\Carbon::parse($product->created_at)->diffForHumans()}}</td>
      @if($product->lock_products == "true") 
        <td><a href="#" class="btn btn-outline-secondary text-dark disabled"><i class="fa fa-minus"></i></a></td>
      @else
        <td><a href="" class="btn btn-outline-warning text-dark"><i class="fa fa-minus"></i></a></td>
      @endif 
      <td class="pt-3">{{$product->amount}}</td>
      @if($product->lock_products == "true") 
        <td><a href="#" class="btn btn-outline-secondary text-dark disabled"><i class="fa fa-plus"></i></a></td>
      @else
        <td><a href="" class="btn btn-outline-warning text-dark"><i class="fa fa-plus"></i></a></td>
      @endif 
      <td>
        @if($product->lock_products == "true") 
          <a href="#" id="edit" class="btn btn-block btn-secondary text-warning disabled" aria-disabled="true">Edit &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-pencil" style="color:white;"></i></a> </td>
        @else
          <a href="{{route('products.edit',['product'=>$product->id])}}" id="edit" class="btn btn-block btn-dark text-warning ">Edit &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-pencil" style="color:white;"></i></a> </td>
        @endif 
      <td> 
      <form action="{{url('products/'.$product->id)}}" method="POST">
      @csrf
      <input name="_method" id="delete" type="hidden" value="DELETE">
        @if($product->lock_products == "true") 
          <a href="#" class="btn btn-block btn-secondary text-warning disabled" name="button" aria-disabled="true">Delete &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-trash text-light"></i></button>
        @else
          <button type="submit" class="btn btn-block btn-dark text-warning" onclick="return confirm('Are you sure to delete?')" name="button">Delete &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-trash text-light"></i></button>
        @endif 
      </form>
      </td>
    </tr>
  
  </tbody>
  @endforeach
</table>
<div class="col-lg-12">
<a href="{{route('products.create')}}" class="btn btn-dark btn-lg float-right mt-3 text-warning">  Add New Product &nbsp;&nbsp; <i class="fa fa-plus-circle" style="color:white"></i> </a>
</div>
</div>
</div>
@else
 <div class="jumbotron container bg-warning text-center my-5">
 <h1 class="display-4">No Product Data Avaiable Now..!</h1>
  <a class="btn btn-dark my-5 text-warning" style="font-weight:bold " href="{{route('products.create')}}" role="button">Add New Product &nbsp;&nbsp; <i class="fa fa-plus-circle text-warning"></i></a>
 </div>
 @endif

@endsection

@extends('layouts.master')
@section('title','Products')
@section('content')

<div class="container">
  <div class="" style="display: flex;flex-wrap: wrap;flex-direction: row;justify-content: space-around;">
    @forelse ($products as $product)
          <div class="scale shadow my-4">
            <div class="card" style="width: 18rem;height: 450px;">
    <form action="{{route('lock',['id'=>$product->id])}}" method="POST">
    @csrf
      <input name="_method" type="hidden">
      @if($product->lock_products == "true")
        <button type="submit" class="btn btn-outline-dark"><i class="fa fa-lock"></i></button>
                <div class="card-body">
                  <div class="card-subtitle mb-2 text-primary text-right">
                    <i class="fa fa-clock-o" style="font-size:20px"></i>&nbsp;&nbsp;{{\Carbon\Carbon::parse($product->created_at)->diffForHumans()}}
                  </div>
            <div class="card-image mb-2">
              <img class="image" src="{{asset('image/author/'.$product->image)}}" class="img-fluid">
            </div>
                  <h5 class="card-title mb-3">
                    <strong>{{$product->name}}</strong>
                  </h5>
                  <h6 class="card-subtitle mb-3">
                    (Category- {{$product->category->name}})
                  </h6>
                  <div class="card-text my-3 text-center">
                    <a href="#" class="btn btn-outline-secondary text-dark disabled"><i class="fa fa-minus"></i></a>
                    <span>{{$product->amount}}</span>
                    <a href="#" class="btn btn-outline-secondary text-dark disabled"><i class="fa fa-plus"></i></a>
                  </div>
                  <div class="my-3">
                    <a href="#" id="edit" class="btn btn-secondary text-warning disabled float-right" aria-disabled="true">Edit &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-pencil" style="color:white;"></i></a>
                    <a href="#" class="btn btn-secondary text-warning disabled float-left" name="button" aria-disabled="true">Delete &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-trash text-light"></i></a>
                  </div>
                </div>
      @else
        <button type="submit" class="btn btn-outline-dark"><i class="fa fa-unlock-alt"></i></button>
                <div class="card-body">
                  <div class="card-subtitle mb-2 text-primary text-right">
                    <i class="fa fa-clock-o" style="font-size:20px"></i>&nbsp;&nbsp;{{\Carbon\Carbon::parse($product->created_at)->diffForHumans()}}
                  </div>
            <div class="card-image mb-2">
              <img class="image" src="{{asset('image/author/'.$product->image)}}" class="img-fluid">
            </div>
                  <h5 class="card-title mb-3">
                    <strong>{{$product->name}}</strong>
                  </h5>
                  <h6 class="card-subtitle mb-3">
                    (Category- {{$product->category->name}})
                  </h6>
                  <div class="card-text my-3 text-center">
                    <a href="{{route('minus-amount',['id'=>$product->id])}}" class="btn btn-outline-warning text-dark"><i class="fa fa-minus"></i></a>
                    <span>{{$product->amount}}</span>
                    <a href="{{route('plus-amount',['id'=>$product->id])}}" class="btn btn-outline-warning text-dark"><i class="fa fa-plus"></i></a>
                  </div>
                  <div class="my-3">
                    <a href="{{route('products.edit',['product'=>$product->id])}}" id="edit" class="btn btn-dark text-warning float-right">Edit &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-pencil" style="color:white;"></i></a>
                    <a href="{{route('product-delete',$product->id)}}" class="btn btn-dark text-warning float-left" onclick="return confirm('Are you sure to delete?')">Delete &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-trash text-light"></i></a>
                  </div>
                </div>
      @endif
    </form>
  </div>
  </div>
          @empty
          <div class="jumbotron col-sm-12 mt-5">
            <h1 class="display-4">No data available !!</h1>
            <p class="text-info">You can also bo a star author. Gettion Start Now.</p>
            <hr class="my-4">
            <a href="{{route('products.create')}}" class="btn btn-info float-right">Add Status</a>
          </div>
        @endforelse
  </div>
  <div class="my-5 mx-auto-1">
    {{ $products->links() }}
  </div>
</div>




<!-- @if(count($products)!=0)
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
  @php
    $productId = 0;
  @endphp
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
      <td class="pt-3">{{$productId += 1}}</td>
      <td class="pt-3">{{$product->name}}</td>
      <td class="pt-3">{{$product->category->name}}</td>
      <td class="pt-3">{{\Carbon\Carbon::parse($product->created_at)->diffForHumans()}}</td>
      @if($product->lock_products == "true")
        <td><a href="#" class="btn btn-outline-secondary text-dark disabled"><i class="fa fa-minus"></i></a></td>
      @else
        <td><a href="{{route('minus-amount',['id'=>$product->id])}}" class="btn btn-outline-warning text-dark"><i class="fa fa-minus"></i></a></td>
      @endif
      <td class="pt-3">{{$product->amount}}</td>
      @if($product->lock_products == "true")
        <td><a href="#" class="btn btn-outline-secondary text-dark disabled"><i class="fa fa-plus"></i></a></td>
      @else
        <td><a href="{{route('plus-amount',['id'=>$product->id])}}" class="btn btn-outline-warning text-dark"><i class="fa fa-plus"></i></a></td>
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
 @endif -->

@endsection

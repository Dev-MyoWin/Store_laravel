@extends('layouts.master')
@section('title','Products')
@section('content')

<div class="container">
  <div class="" style="display: flex;flex-wrap: wrap;flex-direction: row;justify-content: space-around;">
    @forelse ($products as $product)
          <div class="scale shadow my-4">
            <div class="card" style="width: 18rem;height: 400px;">
    <form action="{{route('lock',['id'=>$product->id])}}" method="POST">
    @csrf
      <input name="_method" type="hidden">
      @if($product->lock_products == "true")
                <div class="card-body">
                  <div class="card-subtitle mb-2 text-primary">
                    <button type="submit" class="btn btn-outline-dark float-left"><i class="fa fa-lock"></i></button>
                    <div class="float-right">
                      <i class="fa fa-clock-o" style="font-size:20px"></i>&nbsp;&nbsp;{{\Carbon\Carbon::parse($product->created_at)->diffForHumans()}}
                    </div>
                  </div>
            <div class="card-image mb-2 mt-5">
              <img class="image" src="{{asset('image/author/'.$product->image)}}" class="img-fluid">
            </div>
                  <h5 class="card-title mb-3">
                    <strong>{{$product->name}} (<small> {{$product->category->name}} </small>)</strong>
                  </h5>
                  <div class="card-text my-3 text-center">
                    <a href="#" class="btn btn-sm btn-outline-secondary text-dark disabled"><i class="fa fa-minus"></i></a>
                      <strong class="mx-5">{{$product->amount}}</strong>
                    <a href="#" class="btn btn-sm btn-outline-secondary text-dark disabled"><i class="fa fa-plus"></i></a>
                  </div>
                  <div class="my-3">
                    <a href="#" id="edit" class="btn btn-secondary text-warning disabled float-right" aria-disabled="true">Edit &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-pencil" style="color:white;"></i></a>
                    <a href="#" class="btn btn-secondary text-warning disabled float-left" name="button" aria-disabled="true">Delete &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-trash text-light"></i></a>
                  </div>
                </div>
      @else
                <div class="card-body">
                  <div class="card-subtitle text-primary">
                    <button type="submit" class="btn btn-outline-dark float-left"><i class="fa fa-unlock-alt"></i></button>
                    <div class="float-right">
                      <i class="fa fa-clock-o" style="font-size:20px"></i>&nbsp;&nbsp;{{\Carbon\Carbon::parse($product->created_at)->diffForHumans()}}
                    </div>
                  </div>
            <div class="card-image my-2 mt-5">
              <img class="image" src="{{asset('image/author/'.$product->image)}}" class="img-fluid">
            </div>
                  <h5 class="card-title mb-3">
                    <strong>{{$product->name}} (<small> {{$product->category->name}} </small>)</strong>
                  </h5>
                  <div class="card-text my-3 text-center">
                    <a href="{{route('minus-amount',['id'=>$product->id])}}" class="btn btn-outline-warning btn-sm text-dark"><i class="fa fa-minus"></i></a>
                    <strong class="mx-5">{{$product->amount}}</strong>
                    <a href="{{route('plus-amount',['id'=>$product->id])}}" class="btn btn-outline-warning btn-sm text-dark"><i class="fa fa-plus"></i></a>
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



  </div>
</div>
@endsection

@extends('layouts.master')
@section('title','New Product')
@section('content')

<br><br>
<div class="container">

  <h1 class="mt-3 display-3"><i class="fa fa-cart-plus"></i> &nbsp;&nbsp;New Product </h1>

   @if($errors->any())
      @foreach ($errors->all() as $error)
      <p class="text-danger">{{$error}}</p>
      @endforeach
  @endif

 <br>
 <br>
  <form action="{{url('products')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
    <label for="productName" >Product Name</label>
    <input type="text" class="form-control" id="ProductName" name="name" value="{{old('name')}}">
    </div>

    <div class="form-group row">
    <label for="inputTitle" class="col-form-label">Upload Image</label>
    <div class="col-sm-12">
      <input type="file" class="custom-file-input" name="image" id="inputGroupFile01" value="{{old('image')}}">
      <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
    </div>
  </div>

    <div class="form-group">
    <label for="productName">Product Category</label>
    <select name="category_id" class="form-control" id="ProductName">
    @foreach ($categories as $category)
    <option value="{{$category->id}}">
    {{$category->name}}
    </option>
    @endforeach
    </select>
    </div>

    <div class="form-group">
    <label for="productName">Amount</label>
    <input type="number" class="form-control" id="Amount" name="amount" value="{{old('amount')}}">
    </div>

    <div class="form-group row">
    <div class="col-sm-12">

      <input type="submit" class="btn btn-dark text-warning btn-lg float-right mt-3" value="Save">
    </div>

  </div>
</form>

</div>

@endsection

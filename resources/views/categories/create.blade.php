@extends('layouts.master')
@section('title','New Category')
@section('content')

<br><br>
<div class="container">

  <h1 class="mt-3 display-3"><i class="fa fa-cart-plus"></i> &nbsp;&nbsp;New Category</h1>

   @if($errors->any())
      @foreach ($errors->all() as $error)
      <p class="text-danger">{{$error}}</p>
      @endforeach
  @endif

 <br>
 <br>
  <form action="{{url('categories')}}" method="POST">
    @csrf
    <div class="form-group">
    <label for="productName ">Category Name</label>
    <input type="text" class="form-control" id="CategorytName" name="name">
    </div>

    <div class="form-group row">
    <div class="col-sm-12">

      <input type="submit" class="btn btn-dark text-warning btn-lg float-right mt-3" value="Save">
    </div>

  </div>
</form>

</div>

@endsection

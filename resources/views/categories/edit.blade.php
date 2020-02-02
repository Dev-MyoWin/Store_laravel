@extends('layouts.master')
@section('title','New Category')
@section('content')

<br><br>
<div class="container">

  <h1 class="mt-3 display-3"><i class="fa fa-pencil"></i> &nbsp;&nbsp;Edit Category</h1>

   @if($errors->any())
      @foreach ($errors->all() as $error)
      <p class="text-danger">{{$error}}</p>
      @endforeach
  @endif

 <br>
 <br>
  <form action="{{route('categories.update',['category'=>$edit->id])}}" method="POST">
    @csrf
    <input type="hidden" name="_method" value="PUT" >
    <div class="form-group">
    <label for="productName">Category Name</label>
    <input type="text" class="form-control" id="CategorytName" name="name" value="{{$edit->name}}">
    </div>

    <div class="form-group row">
    <div class="col-sm-12">

      <input type="submit" class="btn btn-dark text-warning btn-lg float-right mt-3" value="Save">
    </div>

  </div>
</form>

</div>

@endsection

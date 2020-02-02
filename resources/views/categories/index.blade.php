@extends('layouts.master')
@section('title','Categories')
@section('content')

@if(count($categories)!=0)
<div class="container">
  <div class="row">
  <h1 class=" my-5 "><i class="fa fa-th-large"></i>&nbsp;&nbsp;&nbsp;Categories</h1>

    <table class="table shadow">
  <thead>
    <tr class="table-secondary" align="center">
      <th>No.</th>
      <th>Name</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <?php $x=1;?>
@foreach ($categories as $category)
  <tbody>
    <tr align="center">
      <td class="pt-3"><?php echo $x;$x++?></td>
      <td class="pt-3">{{$category->name}}</td>
      <td> <a href="{{route('categories.edit',['category'=>$category->id])}}" class="btn btn-dark text-warning btn-block">Edit &nbsp;&nbsp;&nbsp;<i class="fa fa-pencil text-light"></i></a> </td>
      <td> <a href="#" class="btn btn-dark text-warning btn-block">Delete &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-trash text-light"></i></a> </td>
    </tr>
  </tbody>
 
  @endforeach
</table>
<div class="col-sm-12">
<a href="{{route('categories.create')}}" class="btn btn-dark text-warning float-right btn-lg mt-3">Add New Category &nbsp;&nbsp; <i class="fa fa-plus-circle text-light"></i></a>
</div>
</div>
</div>

@else
 <div class="jumbotron text-center">
 <h1 class="display-4">No Data Avaiable Now..!</h1>
  <a class="btn btn-info" href="{{route('categories.create')}}" role="button">Learn more</a>
 </div>
  
@endif
@endsection

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
        <a href="#" class="btn btn-outline-dark text-dark"><i class="fa fa-lock"></i></a>
      </th>
      <td class="pt-3"><?php echo $x;$x++?></td>
      <td class="pt-3">{{$product->name}}</td>
      <td class="pt-3">{{$product->category}}</td>
      <td class="pt-3">{{$product->created_at}}</td>
      <td><a href="" class="btn btn-outline-warning text-dark"><i class="fa fa-minus"></i></a></td>
      <td class="pt-3">{{$product->amount}}</td>
      <td><a href="" class="btn btn-outline-warning text-dark"><i class="fa fa-plus"></i></a></td>
      <td> <a href="{{route('products.edit',['product'=>$product->id])}}" class="btn btn-block btn-dark text-warning ">Edit &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-pencil" style="color:white;"></i></a> </td>
      <td> 
      <a href="{{route('products.destroy',['product'])}}" type="button" class="btn btn-dark text-warning view"  >Delete &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-trash" style="color:white;"></i></a>
      </td>
    </tr>
  </tbody>
  @endforeach
</table>




<!-- Modal -->
<div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h5 class="modal-title " id="exampleModalCenterTitle"> <strong>Warning..!!!</strong> </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h4>ARE YOU SURE TO DELETE THIS ITEM</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
       
        <form action="{{url('products/'.$product->id)}}" method="post">
          @csrf
          <input name="_method" type="hidden" value="DELETE">
          <button type="submit" class="btn btn-warning text-light" name="button">Confirm</button>
        </form>

      </div>
    </div>
  </div>
</div>






<div class="col-lg-12">
<a href="{{route('products.create')}}" class="btn btn-dark btn-lg float-right mt-3 text-warning">  Add New Product &nbsp;&nbsp; <i class="fa fa-plus-circle" style="color:white"></i> </a>

</div>
</div>

</div>

@else
 <div class="jumbotron text-center">
 <h1 class="display-4">No Data Avaiable Now..!</h1>
  <a class="btn btn-warning" href="{{route('products.create')}}" role="button">Learn more</a>
 </div>
 @endif
@endsection

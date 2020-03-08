@extends('layouts.master')
@section('title','Logs')
@section('content')

@if(count($histories)!=0)
<div class="container">
  <div class="row">
  <h1 class=" my-5 "><i class="fa fa-th-large"  onClick="mensaje2()"></i>&nbsp;&nbsp;&nbsp;Logs</h1>

  <table class="table shadow">
  <thead>
    <tr class="table-secondary">
      <th>No.</th>
      <th>Description</th>
    </tr>
  </thead>
  @php
    $historyId = 0;
  @endphp
@foreach ($histories as $history)
  <tbody>
    <tr>
      <td class="pt-3">{{$historyId += 1}}</td>
      <td class="pt-3">{{$history->description}}</td>
    </tr>
  </tbody>

  @endforeach
</table>
</div>
<a href="{{route('delete-all')}}" class="btn btn-dark text-warning float-right mb-5">Delete All &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-trash text-light"></i></a>
</div>

@else
 <div class="jumbotron container bg-warning text-center my-5">
 <h1 class="display-4">No Log Data Avaiable Now..!</h1>
 </div>
@endif

<script>
  function mensaje2() {
    swal({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then(function() {
      swal(
        'Deleted!',
        'Your file has been deleted.',
        'success'
      )
    })
  }
</script>
@endsection

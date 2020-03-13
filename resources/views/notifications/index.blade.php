@extends('layouts.master')
@section('title','Notifications')
@section('content')

@if(count($notifications)!=0)
<div class="container">
  <div class="row">
  <h1 class=" my-5 "><i class="fa fa-th-large"  onClick="mensaje2()"></i>&nbsp;&nbsp;&nbsp;Notification</h1>

  <table class="table shadow">
  <thead>
    <tr class="table-secondary">
      <th>No.</th>
      <th>Title</th>
      <th>Created_at</th>
      <th>Updated_at</th>
      <th>Description</th>
    </tr>
  </thead>
  @php
    $notificationId = 0;
  @endphp
@foreach ($notifications as $notification)
  <tbody>
    <tr>
      <td class="pt-3">{{$notificationId += 1}}</td>
      <td class="pt-3">{{$notification->title}}</td>
      <td class="pt-3">{{$notification->created_at}}</td>
      <td class="pt-3">{{$notification->updated_at}}</td>
      <td class="pt-3">
        <a href="{{route('flag',['id'=>$notification->id])}}" class="btn btn-dark"> view</a>
         
      </td>
    </tr>
  </tbody>
 
  @endforeach
</table>
</div>
<a href="{{route('delete-all-noti')}}" class="btn btn-dark text-warning float-right mb-5">Delete All &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-trash text-light"></i></a>
</div>

@else
 <div class="jumbotron container bg-warning text-center my-5">
 <h1 class="display-4">No Log Data Avaiable Now..!</h1>
 </div>
@endif
@endsection

@extends('layouts.master')
@section('title','Notifications')
@section('content')

@if(count($notifications)!=0)
<div class="container">
  <div class="row">
  <h1 class=" my-5 "><i class="fa fa-bell"></i>&nbsp;&nbsp;&nbsp;Notification</h1>

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
        <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#notification" data-id="{{$notification->description}}" onclick="$('#dataid').val($(this).data('id')); $('#sendmail').modal('show');">
          View
        </button>&nbsp;&nbsp;
        @if($notification->flag == 0)
        <img class="image-icon" src="image/author/yellow-new.svg" alt="star icon">
        @else
        <i class="fa fa-envelop" style="font-size: 30px;"></i>
        @endif
        <div class="modal fade" id="notification" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5>Description</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form class="" action="{{route('flag')}}" method="post">
                @csrf
                <div class="modal-body">
                  <input type="text" name="description" id="dataid" class="form-control" readonly>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-dark text-warning" name="button">Read</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </td>
    </tr>
  </tbody>

  @endforeach
</table>
</script>
</div>
<a href="{{route('delete-all-noti')}}" class="btn btn-dark text-warning float-right mb-5">Delete All &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-trash text-light"></i></a>
</div>

@else
 <div class="jumbotron container bg-warning text-center my-5">
 <h1 class="display-4">No Log Data Avaiable Now..!</h1>
 </div>
@endif
@endsection

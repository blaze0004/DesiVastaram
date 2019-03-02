@extends('layouts.app')
@section('breadcrumb')
<div class="col-lg-12">
  <!-- breadcrumb-->
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">Home
        </a>
      </li>
    </ol>
  </nav>
</div>
@endsection
@section('left-sidebar')
@include('layouts.dashboardSidebar')
@endsection

@section('content')
  <div id="customer-orders" class="col-lg-9">
              <div class="box">
                <h1>My Messages And Chats</h1>
                <p class="lead">Your orders on one place.</p>
                <p class="text-muted">If you have any questions, please feel free to <a href="contact.html">contact us</a>, our customer service center is working for you 24/7.</p>
                <hr>
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($conversations as $conversation)
                      <tr>
                        <th># {{ @$conversation->user->profile->firstName}}</th>
                        <td> {{ @$conversation->message->text }}</td>
                        <td><span class="badge badge-info">@if($conversation->message->conversation->is_accepted == 0) {{'New Message Request'}} @else {{'Old Chat'}} @endif</span></td>
                        <td><a href="{{ route('chat', $conversation->message->conversation->id) }}" class="btn btn-primary btn-sm">Open chat room</a></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
  @endsection
  @section('scripts')
  <script src="//{{ Request::getHost() }}:6001/socket.io/socket.io.js">
  </script>
  @endsection

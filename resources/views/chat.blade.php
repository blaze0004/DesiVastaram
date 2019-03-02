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
  	<chat-room :conversation="{{ $conversation }}" :current-user="{{ auth()->user() }}"></chat-room>
            </div>
  @endsection
  @section('scripts')
  <script src="//{{ Request::getHost() }}:6001/socket.io/socket.io.js">
  </script>
  @endsection

@extends("layouts.app")

@section('breadcrumb')
     <div class="col-lg-12">
              <!-- breadcrumb-->
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li aria-current="page" class="breadcrumb-item active">All Role Request</li>
                </ol>
              </nav>
            </div>
@endsection
@section('left-sidebar')
@include('layouts.dashboardSidebar')
@endsection
@section("content")
  <div id="customer-orders" class="col-lg-9">
              <div class="box">
                <h1>Role Request</h1>
                <p class="lead">Your role request on one place.</p>
                <p class="text-muted">If you have any questions, please feel free to <a href="contact.html">contact us</a>, our customer service center is working for you 24/7.</p>
                <hr>
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Request for</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($role_requests as $request)
                      <tr>
                        <th># {{ $request->id}}</th>
                        <td> {{ $request->user->profile->firstName }}</td>
                        <td>{{ $request->user->email }}</td>
                        <td>{{ $request->for }}</td>
                        <td><a href="{{ route('admin.showSpecificRoleRequest', $request->id) }}" class="btn btn-primary btn-sm">View</a></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
@endsection

@extends("layouts.app")

@section('breadcrumb')
     <div class="col-lg-12">
              <!-- breadcrumb-->
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li aria-current="page" class="breadcrumb-item active">My orders</li>
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
                <h1>My orders</h1>
                <p class="lead">Your orders on one place.</p>
                <p class="text-muted">If you have any questions, please feel free to <a href="contact.html">contact us</a>, our customer service center is working for you 24/7.</p>
                <hr>
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Order</th>
                        <th>Date</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($orders as $order)
                      <tr>
                        <th># {{ $order->id}}</th>
                        <td> {{ $order->order_date}}</td>
                        <td>₹{{ $order->totalOrderAmount() }}</td>
                        <td><span class="badge badge-info">{{ $order->status }}</span></td>
                        <td><a href="customer-order.html" class="btn btn-primary btn-sm">View</a></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
@endsection

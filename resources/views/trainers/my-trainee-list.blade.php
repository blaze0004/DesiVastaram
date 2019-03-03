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
                <h1>My Trainees</h1>
                <p class="lead">Your trainee on one place.</p>
                <p class="text-muted">If you have any questions, please feel free to <a href="contact.html">contact us</a>, our customer service center is working for you 24/7.</p>
                <hr>
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Mobile Number</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($trainees as $trainee)
                      <tr>
                        <th># {{ $trainee->id}}</th>
                        <td> {{ $trainee->firstName}}</td>
                        <td>₹{{ $trainee->phone }}</td>
                        <td><span class="badge badge-info">@if($trainee->verified_by_trainer) {{'verified'}} @else {{'not verified'}} @endif</span></td>
                        <td><a href="{{ route('trainer.showTraineeDashboard', $trainee->id) }}" class="btn btn-primary btn-sm">View</a><a href="javascript:;" class="btn btn-sm btn-danger" onclick="confirmDelete();">Delete</a>
                                <form action="{{ route('trainee.verify.destroy', $trainee->id) }}" method="POST" id="delete-category" style="display: none">
                                    @csrf
                                </form></td>
                      </tr>
                      @endforeach
                       <tr>
                        <th># 1</th>
                        <td> Haris</td>
                        <td> 9045997787</td>
                        <td><span class="badge badge-info">verified</span></td>
                        <td><a href="customer-order.html" class="btn btn-primary btn-sm">View</a></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        let choice = "are you sure";
        function confirmDelete() {
            if (choice){
                document.getElementById('delete-category').submit();    
            }
            
        }
    </script>
@endsection


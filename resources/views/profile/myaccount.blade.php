@extends('layouts/app')

@section('breadcrumb')

<div class="col-lg-12">
    <!-- breadcrumb-->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">
                    {{ Auth::user()->role->name}}
                </a>
            </li>
            <li aria-current="page" class="breadcrumb-item active">
                {{__('Dashboard')}}
            </li>
        </ol>
    </nav>
</div>
@endsection
@section('left-sidebar')

@include('layouts.dashboardSidebar')
@endsection
@section('content')
<div class="col-lg-9">
    <div class="row">
        <div class="col-lg">
            @include('layouts.error-success-msg')
        </div>
    </div>
    <div class="row">
        <div class="col-lg">
              <div class="box">
                <h1>My account</h1>

                <p class="lead">Change your personal details or your password here.</p>
                
                <h3>Change password</h3>
                @if(Auth::user()->role_id == '1')
                <form action="{{ route('resetPassword', $userProfile->user_id) }}" method="POST">
                @else
                  <form action="{{ route('resetPassword', Auth::user()->id) }}" method="POST">
                @endif
                  @csrf
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="old_password">Old password</label>
                        <input id="old_password" type="password" class="form-control" name="old_password">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="password">New password</label>
                        <input id="password" type="password" class="form-control" name="password">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="password_confirm">Retype new password</label>
                        <input id="password_confirm" type="password" class="form-control" name="password_confirm">
                      </div>
                    </div>
                  </div>
                  <!-- /.row-->
                  <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save new password</button>
                  </div>
                </form>
               
              </div>
              <div class="box">
                 <h3 class="mt-5">Personal details</h3>
                <form action="{{ route('save_profile', Auth::id()) }}" method="POST">
                  @csrf
              
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="firstName">First Name</label>
                        <input id="firstName" type="text" class="form-control" name="firstName" value="{{ @$userProfile->firstName}}">
                      </div>

                      <div class="form-group">
                        <label for="lastName">Last Name</label>
                        <input type="text" name="lastName" class="form-control" value="{{ @$userProfile->lastName}}">
                      </div>
                      <div class="form-group">
                        <label for="name">User Name</label>
                        <input id="user_name" type="text" class="form-control" name="user_name" value="{{ @$userProfile->user_name}}">
                      </div>
                      <div class="form-group">
                        <label for="name">Gender</label>
                        <select name="gender" id="gender" class="form-control">
                          <option default>Select Gender</option>

                          <option value="male" @if(@$userProfile->gender == "male") {{'selected'}} @endif>Male</option>
                          <option value="female" @if(@$userProfile->gender == "female") {{'selected'}} @endif>Female</option>
                        </select>
                      </div>
                    </div>
                   
                  </div>
                  <!-- /.row-->
                  
                  <!-- /.row-->
                  <div class="row">
                   
                   
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="phone">Telephone</label>
                        <input id="phone" type="text" class="form-control" name="phone" value="{{ @$userProfile->phone}}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="text" class="form-control" name="email" value="{{@$userEmail['email']}}">
                      </div>
                    </div>
                    <div class="col-md-12 text-center">
                      <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>
                    </div>
                  </div>
                </form>
              </div>
              
              <div class="box">
                @php 

                  $userRole = Auth::user()->role_id;
                  $userRoleName = Auth::user()->role->name;

                @endphp
                <h3 class="mt5">User Roles</h3> <h3 class="text-md-right">You Are {{ $userRoleName }}</h3>
                <hr>

              @if($userRoleName == 'Buyer')
               <div class="row">
                  <div class="col-md">
                  <p>Request to become seller</p>
                  <a href="{{ route('seller-role-request', Auth::user()->id) }}" class="btn btn-md btn-primary center">Become A Seller</a>
                </div>
                <div class="col-md">
                  <p>Request to become wholesale buyer</p>
                <a href="{{ route('wholesalebuyer-role-request', Auth::id()) }}" class="btn btn-md btn-primary center">Become A Wholesale Buyer</a>
                </div>
                <div class="col-md">
                  <p>Request to become trainer</p>
                <a href="{{ route('trainer-role-request', Auth::id()) }}" class="btn btn-md btn-primary center">Become A Trainer</a>
                </div>  
                <div class="col-md">
                  <p>Request to become designer</p>
                <a href="{{ route('designer-role-request', Auth::id()) }}" class="btn btn-md btn-primary center">Become A Designer</a>
                </div>  
               </div>
              @endif
            </div>
            </div>
    </div>
    
</div>
@endsection


@section('scripts')
    <script type="text/javascript">
        
        function confirmDelete() {
            let choice = confirm("are you sure");
            if (choice){
                document.getElementById('delete-products').submit();    
            }
            
        }
    </script>
@endsection

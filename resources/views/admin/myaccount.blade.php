@extends('../layouts/app')

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

@include('../../admin/partials/sidebarMenu')
@endsection
@section('content')
<div class="col-lg-9">
    <div class="row">
        <div class="col-lg">
            @include('../layouts.error-success-msg')
        </div>
    </div>
    <div class="row">
        <div class="col-lg">
              <div class="box">
                <h1>My account</h1>

                <p class="lead">Change your personal details or your password here.</p>
                
                <h3>Change password</h3>
                <form action="{{ route('admin.profile.resetPassword') }}" method="POST">
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
                <h3 class="mt-5">Personal details</h3>
                <form action="{{ route('admin.profile.update', $profile->user_id) }}" method="POST">
                  @csrf
                  @method('PUT')
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input id="name" type="text" class="form-control" name="name" value="{{ $profile->name}}">
                      </div>
                      <div class="form-group">
                        <label for="name">User Name</label>
                        <input id="user_name" type="text" class="form-control" name="user_name" value="{{ $profile->user_name}}">
                      </div>
                      <div class="form-group">
                        <label for="name">Gender</label>
                        <select name="gender" id="gender" class="form-control">

                          <option value="male" @if($profile->gender == "male") {{'selected'}} @endif>Male</option>
                          <option value="female" @if($profile->gender == "female") {{'selected'}} @endif>Female</option>
                        </select>
                      </div>
                    </div>
                   
                  </div>
                  <!-- /.row-->
                  <div class="row">
                  
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="street">Street</label>
                        <input id="street" type="text" class="form-control" name="street" value="{{ $profile->address}}">
                      </div>
                    </div>
                  </div>
                  <!-- /.row-->
                  <div class="row">
                   
                   
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="phone">Telephone</label>
                        <input id="phone" type="text" class="form-control" name="phone" value="{{ $profile->phone}}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="text" class="form-control" name="email" value="{{$profile->user->email}}">
                      </div>
                    </div>
                    <div class="col-md-12 text-center">
                      <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>
                    </div>
                  </div>
                </form>
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

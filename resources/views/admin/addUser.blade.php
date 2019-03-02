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

@include('../layouts.dashboardSidebar')
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
          <h3 class="mt-5">Add New User
          </h3>
          <form action="{{ route('admin.storeNewUser') }}" method="POST">
            @csrf
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="firstName">First Name
                  </label>
                  <input id="firstName" type="text" class="form-control" name="firstName" value="{{ @$userProfile->firstName}}">
                </div>
                <div class="form-group">
                  <label for="lastName">Last Name
                  </label>
                  <input type="text" name="lastName" class="form-control" value="{{ @$userProfile->lastName}}">
                </div>
                <div class="form-group">
                  <label for="role">User Role</label>
                 <select id="user_role" name="user_role" class="form-control" required>
                                    <option value="{{__('1')}}">Admin</option>
                                    <option value="{{__('2')}}">Seller</option>
                                    <option value="{{__('3')}}">Buyer</option>
                                    <option value="{{__('4')}}">Trainer</option>
                                    <option value="{{__('5')}}">Quality Assurance</option>
                </select>
                </div>
                <div class="form-group">
                  <label for="name">User Name
                  </label>
                  <input id="user_name" type="text" class="form-control" name="user_name" value="{{ @$userProfile->user_name}}">
                </div>
                 <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                <div class="form-group">
                  <label for="name">Gender
                  </label>
                  <select name="gender" id="gender" class="form-control">
                    <option default>Select Gender
                    </option>
                    <option value="male">Male
                    </option>
                    <option value="female">Female
                    </option>
                  </select>
                </div>
              </div>
            </div>
            <!-- /.row-->
            <!-- /.row-->
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="phone">Telephone
                  </label>
                  <input id="phone" type="text" class="form-control" name="phone">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="email">Email
                  </label>
                  <input id="email" type="text" class="form-control" name="email">
                </div>
              </div>
              <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary">
                  <i class="fa fa-save">
                  </i> Save changes
                </button>
              </div>
            </div>
          </form>
          </div>
      </div>
    </div>
  </div>
  @endsection
  
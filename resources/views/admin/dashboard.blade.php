@extends('../layouts/app')

@section('breadcrumb')
        <div class="col-lg-12">
              <!-- breadcrumb-->
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">{{ Auth::user()->role->name}}</a></li>
                  <li aria-current="page" class="breadcrumb-item active">{{__('Dashboard')}}</li>

                </ol>
              </nav>
            </div>

@endsection
@section('left-sidebar')
<div class="col-lg-3">
    <!--
              *** MENUS AND FILTERS ***
              _________________________________________________________
              -->
    <div class="card sidebar-menu mb-4">
        <div class="card-header">
            <h3 class="h4 card-title">
                Admin Option
            </h3>
        </div>
        <div class="card-body">
            <ul class="list-unstyled">
                <li class="nav-link">
                    <a href="{{ route('admin.index') }}">
                        Home
                    </a>
                </li>
                <li class="nav-link">
                    <a href="{{ url('admin/sellers')}}">
                        Sellers
                    </a>
                </li>
                <li class="nav-link">
                    <a href="{{ url('admin/buyers')}}">
                        Buyers
                    </a>
                </li>
                <li class="nav-link">
                    <a href="{{ url('admin/trainers')}}">
                        Trainers
                    </a>
                </li>
                 <li class="nav-link">
                    <a href="{{ url('admin/products')}}">
                        Products
                    </a>
                </li>
                 <li class="nav-link">
                    <a href="{{ url('admin/category')}}">
                        Category
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
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
            <div class="jumbotron">
            </div>    
        </div>
        
    </div>
            
</div>
       
    
       
@endsection

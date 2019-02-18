@extends('../layouts/app')

@section('content') 

<div class="container">
	
<div class="row">
	<div class="col-lg-12">
              <!-- breadcrumb-->
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">{{ Auth::user()->role->name}}</a></li>
                  <li aria-current="page" class="breadcrumb-item active">{{__('Dashboard')}}</li>
                </ol>
              </nav>
            </div>

    <div class="col-lg-3">
              <!--
              *** MENUS AND FILTERS ***
              _________________________________________________________
              -->
              <div class="card sidebar-menu mb-4">
                <div class="card-header">
                  <h3 class="h4 card-title">Admin Option</h3>
                </div>
                <div class="card-body">
                	<ul class="list-unstyled">
                		<li class="nav-link"><a href="">Home</a></li>
                		<li class="nav-link"><a href="">Sellers</a></li>
                		<li class="nav-link"><a href="">Buyers</a></li>
                		<li class="nav-link"><a href="">Trainers</a></li>
                	</ul>
                </div>
              </div>
</div>
    </div>
</div>    
@endsection
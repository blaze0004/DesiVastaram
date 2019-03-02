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
            
         </div>
    </div>
    
</div>
@endsection



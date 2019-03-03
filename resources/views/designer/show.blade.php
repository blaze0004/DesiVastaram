@php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;    
use Illuminate\Support\Facades\DB;

@endphp
@extends('../layouts/app')

@section('breadcrumb')
<div class="col-lg-12">
    <!-- breadcrumb-->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">
                    {{ Auth::user()->profile->firstName}}
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
            @include('../layouts.error-success-msg')
        </div>
    </div>
    <div class="row">
        <div class="col-lg">
            <div class="jumbotron">
                <h1> Requirement Details</h1><hr>
                <hr>
                <p>Title</p>
                <br>
                <p>{{$requirement->title}}</p>
                <br>
                <p>Description</p>
                <br>
                <p>{!! $requirement->description !!}</p>

                <div class="mt-3 requirement-images">
                    <img src="{{ $requirement->thumbnailPath()}}" alt="thumbnail">
                    @php
                     $product_images = DB::table('drequirement_images')->where('designer_id', $requirement->id)->get();
               
                    @endphp

                    @foreach($product_images as $image)
                        <img src="{{ asset($image->image )}}" alt="">
                    @endforeach
                </div>                         
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

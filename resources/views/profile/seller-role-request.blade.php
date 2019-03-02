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
    <div class="row mt-3">
        <div class="col-lg">
              <div class="box">
                <h3>Fill this form to become seller.</h3>
                <hr>
                <form action="{{ route('seller-role-request-send', Auth::id()) }}" method="POST" enctype="multipart/form-data">
                @csrf 
                 <div class="row">
                  <div class="form-group">
                  <label for="description">Give Information about your product</label>
                  <textarea name="description" class="form-control" id="description" cols="30" rows="10"></textarea>
                  
                  <label for="file">Provide required document</label>
                  <input type="file" class="form-control" name="file">  

                  <input type="submit" class="form-control btn btn-outline-primary mt-2">
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

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

@include('../layouts.dashboardSidebar')
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
                <h3>Fill this form to become designer.</h3>
                <hr>
               
                  
                 <div class="row">
                  <div class="form-group">
                  <label for="description">designing skills and technique.</label>
                  <textarea name="description" class="form-control" id="description" cols="30" rows="10">{{ $role_request->description }}</textarea>
                  
                  <label for="file">Required document</label>
                  <h2>Download Document</h2>
                  <br>
                  <a href="   {{ asset($role_request->file) }}"> Download Document</a>
                  </div> 
                  <form action="{{ route('admin.role_verify', $role_request->id) }}" method="POST">
                    @csrf
                    <select class="form-control" name="result" id="result">
                      <option value="false">False</option>
                      <option value="true">True</option>
                    </select>
                    <div class="form-group">
                      <input type="submit" class="form-control">
                    </div>
                  </form>
                  
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

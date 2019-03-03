@php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;    

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
                <h1>All Requirement Details</h1><hr>
   
                <table class="table table-stripped">
                    <thead>
                        <tr>
                            <th>
                                #
                            </th>
                            <th>
                                Title
                            </th>
                            <th>
                                Description
                            </th>
                           
                       
                            <th>
                                Designer Id
                            </th>
                            <th>
                                Date Created
                            </th>
                           <th>
                              Actions
                          </th> 
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($requirements as $requirement)
                        <tr>
                            <td>
                                {{$requirement->id}}
                            </td>
                            <td>
                                {{ $requirement->title}}
                            </td>
                            <td>

                                {!! Str::limit($requirement->description) !!}
                            </td>
                            
                                
                               <td>
                                   {{$requirement->user_id}}
                               </td> 
                            <td>    
                                {{$requirement->created_at}}
                            </td>
                            <td>
                                <a class="btn btn-md btn-primary" href="{{ route('showRequirement', $requirement->id) }}">View</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
     <div class="row">
        {{ $requirements->links() }}
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

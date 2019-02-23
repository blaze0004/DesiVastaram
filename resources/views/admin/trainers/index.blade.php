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
            <div class="jumbotron">
                <a class="btn btn-primary mb-2 float-right" href="{{ route('admin.trainers.create')}}">
                    Add trainers
                </a>
                <table class="table table-stripped">
                    <thead>
                        <tr>
                            <th>
                                #
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                Phone
                            </th>
                            <th>
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($trainers))
                        @foreach ($trainers as $trainer)
                        <tr>
                            <td>
                                {{$trainer->id}}
                            </td>
                        
                        
                            <td>
                                {{ $trainer->email}}
                            </td>
                        
                        
                            <td>
                                @if($trainer->profile->name != "")
                                    {{ $trainer->profile->name}}
                                @else
                                <strong>
                                    No Name Found
                                </strong>
                                @endif
                            </td>
                        
                        
                            <td>
                                @if($trainer->profile->phone != "")
                                    {{ $trainer->profile->phone}}
                                @else
                                <strong>
                                    No Phone Number Found
                                </strong>
                                @endif
                            </td>
                        
                        
                            <td>
                                <div aria-label="Basic example" class="btn-group" role="group">
                                    <a class="btn btn-primary btn-md" href="{{ route('admin.trainers.show', $trainer->id) }}">
                                        View/Update
                                    </a>
                                    <a class="btn btn-info btn-md" href="{{ route('admin.trainers.showAllSellers', $trainer->id) }}">
                                        All Products
                                    </a>
                                    <a class="btn btn-danger btn-md" href="{{ route('admin.trainers.deactivate', $trainer->id) }}">
                                        Delete
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="5">No trainer Found</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    {{ $trainers->links() }}
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

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
            @include('../layouts.error-success-msg')
        </div>
    </div>
    <div class="row">
        <div class="col-lg">
            <div class="jumbotron">
                <a class="btn btn-primary mb-2 float-right" href="{{ route('admin.sellers.create')}}">
                    Add sellers
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
                                Active/Inactive
                            </th>
                            <th>
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($sellers))
                        @foreach ($sellers as $seller)
                        <tr>
                            <td>
                                {{$seller->id}}
                            </td>
                        
                        
                            <td>
                                {{ $seller->email}}
                            </td>
                        
                        
                            <td>
                                @if($seller->profile->name != "")
                                    {{ $seller->profile->name}}
                                @else
                                <strong>
                                    No Name Found
                                </strong>
                                @endif
                            </td>
                        
                        
                            <td>
                                @if($seller->profile->phone != "")
                                    {{ $seller->profile->phone}}
                                @else
                                <strong>
                                    No Phone Number Found
                                </strong>
                                @endif
                            </td>
                            <td>
                                @if($seller->profile->status == 1)
                                    {{'Active'}}
                                @else
                                    {{'In-Active'}}
                                @endif
                            </td>
                        
                            <td>
                                <div aria-label="Basic example" class="btn-group" role="group">
                                    <a class="btn btn-primary btn-md" href="{{ route('admin.sellers.show', $seller->id) }}">
                                        View/Update
                                    </a>
                                    <a class="btn btn-info btn-md" href="{{ route('admin.sellers.showAllProducts', $seller->id) }}">
                                        All Products
                                    </a>
                                    <a class="btn btn-danger btn-md" href="javascript:;" onclick="confirmActivateDeactivate()">
                                        Activate/Deactivate
                                    </a>
                                </div>
                            </td>

                        <form method="POST" action="{{ route('admin.sellers.activateDeactivate', $seller->id) }}" style="display: none" id="activateDeactivate-seller">
                       
                            @csrf
                        </form>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="6">No Seller Found</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    {{ $sellers->links() }}
</div>
@endsection


@section('scripts')
<script type="text/javascript">
    function confirmActivateDeactivate() {
            let choice = confirm("are you sure");
            if (choice){
                document.getElementById('activateDeactivate-seller').submit();    
            }
            
        }
</script>
@endsection

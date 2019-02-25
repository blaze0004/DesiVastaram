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
                <a class="btn btn-primary mb-2 float-right" href="{{ route('admin.orders.create')}}">
                    Add orders
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
                        @if(isset($orders))
                        @foreach ($orders as $order)
                        <tr>
                            <td>
                                {{$order->id}}
                            </td>
                        
                        
                            <td>
                                {{ $order->email}}
                            </td>
                        
                        
                            <td>
                                @if($order->profile->name != "")
                                    {{ $order->profile->name}}
                                @else
                                <strong>
                                    No Name Found
                                </strong>
                                @endif
                            </td>
                        
                        
                            <td>
                                @if($order->profile->phone != "")
                                    {{ $order->profile->phone}}
                                @else
                                <strong>
                                    No Phone Number Found
                                </strong>
                                @endif
                            </td>
                        
                        
                            <td>
                                <div aria-label="Basic example" class="btn-group" role="group">
                                    <a class="btn btn-primary btn-md" href="{{ route('admin.orders.show', $order->id) }}">
                                        View/Update
                                    </a>
                                    <a class="btn btn-info btn-md" href="{{ route('admin.orders.showAllOrders', $order->id) }}">
                                        All Orders
                                    </a>
                                    <a class="btn btn-danger btn-md" href="{{ route('admin.orders.deactivate', $order->id) }}">
                                        Delete
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="5">No orders Found</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    {{ $orders->links() }}
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

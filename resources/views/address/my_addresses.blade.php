@extends('layouts.app')

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
            <div class="jumbotron">
                <h1>My Addresses</h1>
                <a href="{{ route('addNewAddress') }}">
                    <button class="btn btn-primary mb-2 float-right">
                        Add Address
                    </button>
                </a>
                <table class="table table-stripped">
                    <thead>
                        <tr>
                            <th>
                                #
                            </th>
                            <th>
                                First Name
                            </th>
                            <th>
                                Phone Number
                            </th>
                            <th>
                                Address
                            </th>
                        
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($addresses as $address)
                        <tr>
                            <td>
                                {{ $address->id }}
                            </td>
                            <td>
                                {!! $address->firstName !!}
                            </td>
                            <td>
                                {{ $address->phone }}
                            </td>
                            <td>
                               {{ $address->address_1 }}
                            </td>
                            <td>
                                <div aria-label="Basic example" class="btn-group" role="group">
                                   <a href="{{ route('address.edit', $address->id) }}" class="btn btn-primary btn-md">Edit</a> 
                                    <a href="javascript:;" class="btn btn-secondary btn-md"  @if(Auth::user()->profile->default_address_id == $address->id) {{''}} @else {{"onclick=confirmDefault();"}} @endif > @if(Auth::user()->profile->default_address_id == $address->id) {{'Default Address'}} @else {{'Make Default'}} @endif</a>
                                    <form action="{{ route('makeDefaultAddress', $address->id) }}" method="POST" id="default-address" style="display: none">
                                    
                                    @csrf
                                </form>
                                    <a href="javascript:;" class="btn btn-sm btn-danger" onclick="confirmDelete();">Delete</a>
                                <form action="{{ route('deleteAddress', $address->id) }}" method="POST" id="delete-address" style="display: none">
                                    @method('DELETE')
                                    @csrf
                                </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>    
        </div>
        
    </div>
    <div class="row">
        {{ $addresses->links() }}
    </div>
            
</div>
       
    
       
@endsection

@section('scripts')
    <script type="text/javascript">
        
        function confirmDelete() {
            let choice = confirm("are you sure");
            if (choice){
                document.getElementById('delete-address').submit();    
            }
            
        }

        function confirmDefault() {
            let choice = confirm("are you sure");
            if (choice){
                $('#default-address').submit();
            }
        }
    </script>
@endsection


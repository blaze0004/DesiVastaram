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
                <h1>All Products</h1><hr>
                
           
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
                                Categories
                            </th>
                            <th>
                                Price
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
                        @foreach ($products as $product)
                        <tr>
                            <td>
                                {{$product->id}}
                            </td>
                            <td>
                                {{ $product->title}}
                            </td>
                            <td>
                                {!! $product->description !!}
                            </td>
                            <td>
                                @if(isset($categories))
                                    @foreach($categories as $category)
                          
                    
                                    @endforeach
                                @endif
                               </td>
                                
                            <td>
                                {{ $product->price }}
                            </td>
                                
                            <td>    
                                {{$product->created_at}}
                            </td>

                            <td>
                                 <div aria-label="Basic example" class="btn-group" role="group">
                                   <a href="{{ route('productCRUD.products.edit', $product->id) }}" class="btn btn-primary btn-md">Edit</a>  <a href="javascript:;" class="btn btn-sm btn-danger" onclick="confirmDelete();">Delete</a>
                                <form action="{{ route('productCRUD.products.destroy', $product->id) }}" method="POST" id="delete-products" style="display: none">
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
        {{ $products->links() }}
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

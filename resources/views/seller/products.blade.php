@extends('../layouts/app')

@section('content')
<div class="container">
    <div class="row">
        @include('../layouts.seller.currentBreadcrumb')
       @include('../layouts.seller.sidebarOption')
        <div class="col-lg-9">
            <div class="jumbotron">
                <button class="btn btn-primary mb-2 float-right"><a href=""></a>Add Products</button>
                <table class="table table-stripped">
                    <thead>
                        <tr>
                            <th>
                                Product ID
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                View
                            </th>
                            <th>
                                Update
                            </th>
                            <th>
                                Update
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($products)
                        @foreach ($products as $product)
                        <tr>
                            <td>
                                {{$product->id}}
                            </td>
                            <td>
                                {{ $product->email}}
                            </td>
                            <td>
                                <input class="btn btn-primary" type="button" value="View">
                                </input>
                            </td>
                            <td>
                                <input class="btn btn-primary" type="button" value="Update">
                                </input>
                            </td>
                            <td>
                                <input class="btn btn-primary" type="button" value="Delete">
                                </input>
                            </td>
                        </tr>
                        @endforeach
                        @endisset
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

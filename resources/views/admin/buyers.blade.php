@extends('../layouts/app')

@section('content')
<div class="container">
    <div class="row">
        @include('../layouts.admin.currentBreadcrumb')
        @include('../layouts.admin.sidebarOptions')
        <div class="col-lg-9">
            <div class="jumbotron">
                <table class="table table-stripped">
                    <thead>
                        <tr>
                            <th>
                                User ID
                            </th>
                            <th>
                                Email
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
                        @foreach ($buyers as $buyer)
                        <tr>
                            <td>
                                {{$buyer->id}}
                            </td>
                            <td>
                                {{ $buyer->email}}
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
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

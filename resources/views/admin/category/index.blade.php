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
                                Category
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
                        @foreach ($cotegories as $category)
                        <tr>
                            <td>
                                {{$category->id}}
                            </td>
                            <td>
                                {{ $category->name}}
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

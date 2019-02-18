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
                        @foreach ($trainers as $trainer)
                        <tr>
                            <td>
                                {{$trainer->id}}
                            </td>
                            <td>
                                {{ $trainer->email}}
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

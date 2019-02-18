@extends('../layouts/app')

@section('content')
<div class="container">
    <div class="row">
        @include('../layouts.admin.currentBreadcrumb')
        @include('../layouts.admin.sidebarOptions')
    </div>
</div>
@endsection

@php
use Illuminate\Support\Str;    

@endphp

@extends('../layouts/app')

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
                <h1>All Categories</h1>
                <a href="{{ Request::url().'/create' }}">
                    <button class="btn btn-primary mb-2 float-right">
                        Add Category
                    </button>
                </a>
                <table class="table table-stripped">
                    <thead>
                        <tr>
                            <th>
                                Title
                            </th>
                            <th>
                                Description
                            </th>
                            <th>
                                Slug
                            </th>
                            <th>
                                Categories
                            </th>
                            <th>
                                Date Created
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td>
                                {{$category->title}}
                            </td>
                            <td>
                                {!! Str::limit($category->description) !!}
                            </td>
                            <td>
                                {{ $category->slug}}
                            </td>
                            <td>
                                @if($category->childrens)
                                
                                @foreach($category->childrens as $children) 
                                {{$children->title}},
                                @endforeach
                                @else
                                <b colspan="5">
                                    {{"No Categories Found.."}}
                                </b>
                                @endif
                            </td>
                            <td>
                                {{ $category->created_at}}
                            </td>
                            <td>
                                <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-sm btn-info">Edit</a> | <a href="javascript:;" class="btn btn-sm btn-danger" onclick="confirmDelete();">Delete</a>
                                <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST" id="delete-category" style="display: none">
                                    @method('DELETE')
                                    @csrf
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>    
        </div>
        
    </div>
    <div class="row">
        {{ $categories->links() }}
    </div>
            
</div>
       
    
       
@endsection

@section('scripts')
    <script type="text/javascript">
        let choice = "are you sure";
        function confirmDelete() {
            if (choice){
                document.getElementById('delete-category').submit();    
            }
            
        }
    </script>
@endsection


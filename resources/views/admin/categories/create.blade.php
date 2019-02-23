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

@include('../../admin/partials/sidebarMenu')
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
                <h2>
                    Add Category
                </h2>
                <hr>
                    <form action="@if(isset($category)) {{ route('admin.category.update', $category->id) }} @else {{ route('admin.category.store') }} @endif" method="POST">
                        @if(isset($category))
                        @method('PUT')
                        @endif
                        @csrf
                        <div class="form-group">
                            <label for="title">
                                Title:
                            </label>
                            <input class="form-control" id="title" name="title" type="text" value="@if(isset($category)) {{ $category->title}} @endif">
                            </input>
                            <p class="small">
                                {{ config('app.url').'/'}}
                                <span id="url">
                                </span>
                            </p>
                            <input id="slug" name="slug" type="hidden" value="@if(isset($category)) {{ $category->slug}} @endif">
                            </input>
                        </div>
                        <div class="form-group">
                            <label for="description">
                                Description:
                            </label>
                            <br>
                                <textarea class="form-control" cols="30" id="editor" name="description" rows="80">@if(isset($category)) {!! $category->description !!} @endif
                                </textarea>
                            </br>
                        </div>
                        <div class="form-group ">
                            @php 
                                $ids = (isset($category->childrens) && $category->childrens->count() > 0) ? array_pluck($category->childrens, 'id') : null

                            @endphp
                            <label for="parent_id">
                                Parent Category
                            </label>
                            <select class="form-control" id="parent_id" multiple name="parent_id[]">
                                @if(isset($categories))
                                <option value="0">
                                    Top Level
                                </option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id}}" @if (!is_null($ids) && in_array($category->id, $ids))
                                {{ 'selected' }} @endif>
                                    {{ $category->title }}
                                </option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                @if(isset($category))
                                <input type="submit" class="form-control" name="submit" value="Update Category">
                                @else 
                                <input type="submit" class="form-control" name="submit" value="Add Category">
                               @endif
                            </div>
                        </div>
                    </form>
                </hr>
            </div>
        </div>
        
    </div>
            
</div>
       
    
       
@endsection
@section('scripts')
<script type="text/javascript">
    $(function() {
        ClassicEditor
        .create( document.querySelector( '#editor' ), {
            toolbar: ['Heading', 'Link', 'bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote', 'undo', 'redo']
        })
        .then( editor => {
            window.editor = editor;
        } )
        .catch( err => {
            console.error( err.stack );
        } );
       
        $('#title').on('keyup', function() {
            var url = slugify($(this).val());
            $('#url').html(url);
            $('#slug').val(url);
            console.log(url);
        });
        $('#parent_id').select2({
            placeholder: "Select a Parent Category",
            allowClear: true,
            minimumResultForSearch: Infinity
        });
        

    });
</script>
@endsection
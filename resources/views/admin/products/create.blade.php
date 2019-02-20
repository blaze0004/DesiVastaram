
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
<div class="col-lg-3">
    <!--
              *** MENUS AND FILTERS ***
              _________________________________________________________
              -->
    <div class="card sidebar-menu mb-4">
        <div class="card-header">
            <h3 class="h4 card-title">
                Admin Option
            </h3>
        </div>
        <div class="card-body">
            <ul class="list-unstyled">
                <li class="nav-link">
                    <a href="{{ route('admin.index') }}">
                        Home
                    </a>
                </li>
                <li class="nav-link">
                    <a href="{{ url('admin/sellers')}}">
                        Sellers
                    </a>
                </li>
                <li class="nav-link">
                    <a href="{{ url('admin/buyers')}}">
                        Buyers
                    </a>
                </li>
                <li class="nav-link">
                    <a href="{{ url('admin/trainers')}}">
                        Trainers
                    </a>
                </li>
                 <li class="nav-link">
                    <a href="{{ url('admin/products')}}">
                        products
                    </a>
                </li>
                 <li class="nav-link">
                    <a href="{{ url('admin/category')}}">
                        Category
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
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
                <h1>Add products</h1>
                <hr>

                <!-- products Add, Edit, Update Form START -->
                
                <form  action="@if(isset($products)) {{route('admin.products.update', $products)}} @else {{route('admin.products.store')}} @endif" method="post" accept-charset="utf-8" enctype="multipart/form-data">
    <div class="row">
        @csrf
        @if(isset($products))
        @method('PUT')
        @endif
        <div class="col-lg-9">
            <div class="form-group row">
                <div class="col-lg-12">
                    <label class="form-control-label">Title: </label>
                    <input type="text" id="txturl" name="title" class="form-control " value="{{@$products->title}}" />
                    <p class="small">{{config('app.url')}}<span id="url">{{@$products->slug}}</span>
                    <input type="hidden" name="slug" id="slug" value="{{@$products->slug}}">
                </p>
            </div>
        </div>
        <div class="form-group row">
            
            <div class="col-lg-12">
                <label class="form-control-label">Description: </label>
                <textarea name="description" id="editor" class="form-control ">{!! @$products->description !!}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-6">
                <label class="form-control-label">Price: </label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">$</span>
                    </div>
                    <input type="text" class="form-control" placeholder="0.00" aria-label="Username" aria-describedby="basic-addon1" name="price" value="{{@$products->price}}" />
                </div>
            </div>
            <div class="col-6">
                <label class="form-control-label">Discount: </label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">$</span>
                    </div>
                    <input type="text" class="form-control" name="discount_price" placeholder="0.00" aria-label="discount_price" aria-describedby="discount" value="{{@$products->discount_price}}" />
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="card col-sm-12 p-0 mb-2">
                <div class="card-header align-items-center">
                    <h5 class="card-title float-left">Extra Options</h5>
                    <div class="float-right" >
                        <button type="button" id="btn-add" class="btn btn-primary btn-sm">+</button>
                        <button type="button" id="btn-remove" class="btn btn-danger btn-sm">-</button>
                    </div>
                    
                </div>
                <div class="card-body" id="extras">

                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <ul class="list-group row">
            <li class="list-group-item active"><h5>Status</h5></li>
            <li class="list-group-item">
                <div class="form-group row">
                    <select class="form-control" id="status" name="status">
                        <option value="0" @if(isset($products) && $products->status == 0) {{'selected'}} @endif >Pending</option>
                        <option value="1" @if(isset($products) && $products->status == 1) {{'selected'}} @endif>Publish</option>
                    </select>
                </div>
                <div class="form-group row">
                    <div class="col-lg-12">
                        @if(isset($products))
                        <input type="submit" name="submit" class="btn btn-primary btn-block " value="Update products" />
                        @else
                        <input type="submit" name="submit" class="btn btn-primary btn-block " value="Add products" />
                        @endif
                    </div>
                    
                </div>
            </li>
            <li class="list-group-item active"><h5>Feaured Image</h5></li>
            <li class="list-group-item">
                <div class="input-group mb-3">
                    <div class="custom-file ">
                        <input type="file"  class="custom-file-input" name="thumbnail" id="thumbnail">
                        <label class="custom-file-label" for="thumbnail">Choose file</label>
                    </div>
                </div>
                <div class="img-thumbnail  text-center">
                    <img src="@if(isset($products)) {{asset('storage/'.$products->thumbnail)}} @else {{asset('images/no-thumbnail.jpeg')}} @endif" id="imgthumbnail" class="img-fluid" alt="">
                </div>
            </li>
            <li class="list-group-item">
                <div class="col-12">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" ><input id="featured" type="checkbox" name="featured" value="@if(isset($products)){{@$products->featured}}@else{{0}}@endif" @if(isset($products) && $products->featured == 1) {{'checked'}} @endif /></span>
                        </div>
                        <p type="text" class="form-control" name="featured" placeholder="0.00" aria-label="featured" aria-describedby="featured" >Featured products</p>
                    </div>
                </div>
            </li>
            
            <li class="list-group-item active"><h5>Select Categories</h5></li>
            <li class="list-group-item ">
                <select name="category_id[]" id="select2" class="form-control" multiple>
                 
                    <option value=""></option>
                    
                </select>
            </li>
        </ul>
    </div>
</div>
</form>


               <!--  products Add, Edit, Update Form END -->


            </div>
        </div>
        
    </div>
            
</div>
       
    
       
@endsection

@section('scripts')
<script type="text/javascript">
    $(function(){
            ClassicEditor.create( document.querySelector( '#editor' ), {
        toolbar: [ 'Heading', 'Link', 'bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote','undo', 'redo' ],
    })
.then( editor => {
console.log( editor );
} )
.catch( error => {
console.error( error );
} );
     
        $('#txturl').on('keyup', function(){
            const pretty_url = slugify($(this).val());
            $('#url').html(slugify(pretty_url));
            $('#slug').val(pretty_url);
        })
        
        $('#select2').select2({
            placeholder: "Select multiple Categories",
        allowClear: true
        });

        $('#status').select2({
            placeholder: "Select a status",
        allowClear: true,
        minimumResultsForSearch: Infinity
        });
$('#thumbnail').on('change', function() {
var file = $(this).get(0).files;
var reader = new FileReader();
reader.readAsDataURL(file[0]);
reader.addEventListener("load", function(e) {
var image = e.target.result;
$("#imgthumbnail").attr('src', image);
});
});
$('#btn-add').on('click', function(e){
    
        var count = $('.options').length+1;
        $.get("").done(function(data){
            
            $('#extras').append(data);
        })
})
$('#btn-remove').on('click', function(e){   
    $('.options:last').remove();
})
$('#featured').on('change', function(){
    if($(this).is(":checked"))
        $(this).val(1)
    else
        $(this).val(0)
})
})
</script>

@endsection
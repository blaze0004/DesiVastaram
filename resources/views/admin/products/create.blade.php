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
        <h1>
          Add products
        </h1>
        <hr>
        <p>
        
        </p>
        <!--  Add/edit form start  -->
        <form action="@if(isset($product_categories)) {{ route('admin.products.update', $product->id) }} @else {{ route('admin.products.store') }} @endif" method="POST" enctype="multipart/form-data">
          @csrf
          @if(isset($product_categories))
          @method('PUT')
          @endif
          <div class="form-group">
            <label for="title">
              Title:
            </label>
            <input class="form-control" id="title" name="title" type="text" value="{{ @$product->title}}">
            </input>
          <br>
          <p class="small">
            {{ config('app.url').'/'}}
            <span id="url">
            </span>
          </p>
          <input type="text" hidden="true" value="" name="slug" value="@$product->slug" id="slug">
          </div>
        <div class="form-group">
          <label for="description">
            Description
          </label>
          <textarea class="form-control" cols="30" id="editor" name="description" rows="10">{!! @$product->description !!}
          </textarea>
        </div>
        <div class="form-group">
          <label for="thumbnail">Product Thumbnail
          </label>
          <br>
          @if(isset($product) && @$product->thumbnail != '')
          <div  class="img-wraps">
            <span  class="closes" title="Delete">&times;
            </span>
            // give image path
            <img src="{{ asset($product->thumbnailPath()) }}" alt="product_thumbnail" class="img-responsive" productId="{{ $product->id}}" width="150px">
          </div>
            @endif
          <input id="thumbnail" name="thumbnail" type="file" class="file" multiple  data-show-upload="false" data-show-caption="true" data-msg-placeholder="Select {thumbnail} for upload..."  >
        
        </div>
        <div class="form-group">
          <label for="images">Other Product Images
          </label>
          <br>
          @if(isset($product_categories) && isset($product->images))
          @foreach($product->images as $image) 
          <div  class="img-wraps">
            <span class="closes" title="Delete">&times;
            </span>
            // give image path
            <img class="img-responsive" src="{{ asset($image->image) }}" alt="Product Image {{ $image->id}}"  productId="{{ $product->id }}" imageId="{{ $image->id }}" width="150px">
          </div>
          <img >
          @endforeach
          @endif
          @if (@$product->totalImageUploaded < 5)
              <input id="images" name="images[]" type="file" class="file" multiple  data-show-upload="false" data-show-caption="true" data-msg-placeholder="Select {files} for upload...">
          @endif
        </div>
        <div class="form-group">
          <select class="form-control" id="status" name="status">
            <option selected="" value="0" @if (@$product->status == '0') {{ "selected" }} @endif>
              Draft
            </option>
            <option value="1"  @if (@$product->status == '1') {{ "selected" }} @endif>
              Publish
            </option>
          </select>
        </div>
        <div class="form-group">
          @php 
          $ids = (isset($product->categories) && $product->categories->count() > 0) ? array_pluck($product->categories, 'id') : null
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
            <option value="{{ $category->id}}" @if (!is_null($ids) && in_array($category->id, $ids)) {{ 'selected' }} @endif>
              {{ $category->title }}
            </option>
            @endforeach
            @else
            <option value="0">
              Top Level
            </option>
            @foreach ($product_categories as $category)
            <option value="{{ $category->id}}" @if (!is_null($ids) && in_array($category->id, $ids)) {{ 'selected' }} @endif>
              {{ $category->title }}
            </option>
            @endforeach
            @endif
          </select>
        </div>
        <div class="form-group row">
          <label for="discount">Price
          </label>
          <input type="text" class="form-control" name="price" value="{{@$product->price}}">
          <label for="discount_price">Discount Price
          </label>
          <input type="text" class="form-control" name="discount_price" value="{{ @$product->discount_price}}">
          <label for="qty">Product Quantity
          </label>
          <input type="text" class="form-control" name="qty" value="{{ @$product->qty}}">
        </div>
        <!--     <div class="form-group row">
<div class="card col-sm-12 p-0 mb-2">
<div class="card-header align-items-center">
<h5 class="card-title float-left">
Extra Options
</h5>
<div class="float-right">
<button class="btn btn-primary btn-sm" id="btn-add" type="button">
+
</button>
<button class="btn btn-danger btn-sm" id="btn-remove" type="button">
-
</button>
</div>
</div>
<div class="card-body" id="extras">
<div class="row align-items-center options">
<div class="col-sm-4">
<label class="form-control-label">
Option
<span class="count">
1
</span>
</label>
<input class="form-control" name="extras[option][]" placeholder="size" type="text" value="">
</input>
</div>
<div class="col-sm-8">
<label class="form-control-label">
Values
</label>
<input class="form-control" name="extras[values][]" placeholder="options1 | option2 | option3" type="text"/>
<label class="form-control-label">
Additional Prices
</label>
<input class="form-control" name="extras[prices][]" placeholder="price1 | price2 | price3" type="text"/>
</div>
</div>
</div>
</div>
</div>
-->                        
        <div class="form-group">
          <label for="submit">
            Publish Product
          </label>
          <input class="btn btn-block btn-primary" type="submit">
          </input>
      </div>
      </form>
   
    <!--    Add/edit form end -->
    </hr>
</div>
</div>
</div>
</div>
@endsection
@section('scripts') 
<!-- piexif.min.js is needed for auto orienting image files OR when restoring exif data in resized images and when you 
wish to resize images before upload. This must be loaded before fileinput.min.js -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.9/js/plugins/piexif.min.js" type="text/javascript"></script> -->
<!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview. 
This must be loaded before fileinput.min.js -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.9/js/plugins/sortable.min.js" type="text/javascript"></script> -->
<!-- purify.min.js is only needed if you wish to purify HTML content in your preview for 
HTML files. This must be loaded before fileinput.min.js -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.9/js/plugins/purify.min.js" type="text/javascript"></script> -->
<!-- popper.min.js below is needed if you use bootstrap 4.x. You can also use the bootstrap js 
3.3.x versions without popper.min.js. -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script> -->
<!-- bootstrap.min.js below is needed if you wish to zoom and preview file content in a detail modal
dialog. bootstrap 4.x is supported. You can also use the bootstrap js 3.3.x versions. -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" type="text/javascript"></script> -->
<!-- the main fileinput plugin file -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.9/js/fileinput.min.js">
</script>
<!-- optionally if you need a theme like font awesome theme you can include it as mentioned below -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.9/themes/fa/theme.js">
</script>
<!-- optionally if you need translation for your language then include  locale file as mentioned below -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.9/js/locales/(lang).js"></script> -->
<script type="text/javascript">
  $(document).ready(function() {
    ClassicEditor
      .create( document.querySelector( '#editor' ), {
      toolbar: ['Heading', 'Link', 'bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote', 'undo', 'redo']
    }
             )
      .then( editor => {
      window.editor = editor;
    }
           )
      .catch( err => {
      console.error( err.stack );
    }
            );
    $('#parent_id').select2({
      placeholder: "Select a Parent Category",
      allowClear: true,
      minimumResultForSearch: Infinity
    }
                           );
    $(".btn-success").click(function(){
      var html = $(".clone").html();
      $(".increment").after(html);
    }
                           );
    $("body").on("click",".btn-danger",function(){
      $(this).parents(".control-group").remove();
    }
                );
    $('#title').on('keyup', function() {
      var url = slugify($(this).val());
      $('#url').html(url);
      $('#slug').val(url);
    }
                  );
  }
                   );
  $("#images").fileinput({
    'theme': "fa",
    'maxFileCount': 4     
  }
                        );
  $('#thumbnail').fileinput({
    'theme': 'fa'
  }
                           );
  function deleteThumbnail() {
    let choice = confirm('remove thumbnail!');
    if (choice) {
      console.log('running');
      $('#remove-thumbnail').submit();
    }
  }
  $('.closes').on('click', function(e) {
    var imageName = $(this).next().attr('alt');

    if (imageName == 'product_thumbnail') {
        imageName = $(this).next().attr('src');
        var productId = $(this).next().attr('productId');
        $.ajax({
            method: 'POST',
            url: '{{ route('product.productImageDelete') }}',
            data: {
                '_token': '{{ csrf_token() }}',
                'imageName': imageName,
                'productId': productId
            },
            success: function (response) {
                console.log(response);
                $(e.target).parent().remove();

            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(JSON.stringify(jqXHR));
                console.log("AJAX error: " + textarea + ' : ' + errorThrown);
            }
        });

    } else {
        imageName = $(this).next().attr('src');
        var productId = $(this).next().attr('productId');
        var imageId = $(this).next().attr('imageId');
       $.ajax({
            method: 'POST',
            url: '{{ route('product.productImageDelete') }}',
            data: {
                '_token': '{{ csrf_token() }}',
                'imageName': imageName,
                'productId': productId,
                'imageId': imageId
            },
            success: function (response) {
                console.log(response);
                if (response != -1) {

                    $(e.target).parent().remove();
                    totalOtherImageUploaded = response;
                } 
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(JSON.stringify(jqXHR));
                console.log("AJAX error: " + textarea + ' : ' + errorThrown);
            }
        });
     }
    });
</script>
@endsection

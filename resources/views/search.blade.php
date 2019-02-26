  @extends("layouts.app")

@section('breadcrumb')
<div class="col-lg-12">
    <!-- breadcrumb-->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">
                    Home
                </a>
            </li>
            <li class="breadcrumb-item">
                <a href="#">
                    Women
                </a>
            </li>
            <li class="breadcrumb-item">
                <a href="#">
                    Saree
                </a>
            </li>
            <li aria-current="page" class="breadcrumb-item active">
                kanjeevaram silk sarees
            </li>
        </ol>
    </nav>
</div>
@endsection
@section('left-sidebar')
@endsection
@section("content")
 <div class="col-lg-12">
              <div class="box">
                <h1>Search Results For Keyword : {{ $query }}</h1>
                <p>In our Women category we offer wide selection of traditional textile products.</p>
              </div>
              <div class="box info-bar">
                <div class="row">
                  <div class="col-md-12 col-lg-4 products-showing">Showing <strong>{{ count($products)}}</strong> of <strong>{{$products->total()}}</strong> products</div>
                  <div class="col-md-12 col-lg-7 products-number-sort">
                    <form class="form-inline d-block d-lg-flex justify-content-between flex-column flex-md-row">
                    {{$products->links() }}
                      <div class="products-sort-by mt-2 mt-lg-0"><strong>Sort by</strong>
                        <select name="sort-by" class="form-control">
                          <option>Price</option>
                          <option>Name</option>
                          <option>Sales first</option>
                        </select>
                      </div>
                    </form>
                  </div>

                </div>
               </div>
              <div class="row products">
                @foreach($products as $product)
                <div class="col-lg-4 col-md-6">
                  <div class="product">
                    <div class="flip-container">
                      <div class="flipper">
                        <div class="front"><a href="{{ route('product.single', $product->slug) }}"><img src="{{$product->thumbnailPath()}}" height="500" alt="" class="img-fluid"></a></div>
                        <div class="back"><a href="{{ route('product.single', $product->slug) }}"><img src="{{ $product->thumbnailPath()}}" height="500" alt="" class="img-fluid"></a></div>
                      </div>
                    </div><a href="detail.html" class="invisible"><img src="img/product1.jpg" alt="" class="img-fluid"></a>
                    <div class="text">
                      <h3><a href="detail.html">{{$product->title}}</a></h3>
                      <p class="price"> 
                        <del></del> {{$product->price}}
                      </p>
                      <p class="buttons"><a href="{{ route('product.single', $product->slug) }}" class="btn btn-outline-secondary">View detail</a>
                       <p class="text-center buttons">
                        <a class="btn btn-primary addToCart" id="addToCart" productId='{{ $product->id }}'>
                        <i class="fa fa-shopping-cart">
                        </i>
                        Add to cart
                    </a>
                   
                          <a class="btn btn-outline-primary addToWishlist" id="addToWishlist" productId='{{$product->id}}'>
 
                        <i class="fa fa-heart">
                        </i>
                        Add to wishlist
                    </a>

                  
                </p>
                    </div>
                    <!-- /.text-->
                  </div>
                  <!-- /.product            -->
                </div>
              @endforeach
              
            
            </div>
@endsection


@section('scripts')


@section('scripts')
<script type="text/javascript">
    $('#categories').select2({
      placeholder: "Select a Parent Category",
            allowClear: true,
            minimumResultForSearch: Infinity
  });
</script>
<script type="text/javascript">
    
    $('.addToWishlist').on('click', function(e) {
        var productId = $(e.target).attr('productId');
        
       $.ajax({
    method: 'POST', // Type of response and matches what we said in the route
    url: '{{ route('wishlist.store') }}', // This is the url we gave in the route
    data: {'_token' : '{{ csrf_token() }}',
            'productId' : productId
        }, // a JSON object to send back
    success: function(response){ // What to do if we succeed
        console.log(response); 
    },
    error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
        console.log(JSON.stringify(jqXHR));
        console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
    }
});
    });

    $('.addToCart').on('click', function(e) {
        var productId = $(e.target).attr('productId');
        console.log(productId);
       $.ajax({
    method: 'POST', // Type of response and matches what we said in the route
    url: '{{ route('cart.store') }}', // This is the url we gave in the route
    data: {'_token' : '{{ csrf_token() }}',
            'productId' : productId
        }, // a JSON object to send back
    success: function(response){ // What to do if we succeed
        console.log(response); 
    },
    error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
        console.log(JSON.stringify(jqXHR));
        console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
    }
    });
    });
</script>

@endsection
@endsection
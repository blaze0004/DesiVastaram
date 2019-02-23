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
@include('layouts.filterSidebar')
@endsection
@section("content")
<div class="col-lg-9">
    <div class="row" id="productMain">
        <div class="col-md-6">
            <div class="owl-carousel shop-detail-carousel" data-slider-id="1">
                @if(isset($product))
                <div class="item">
                    <img alt="" class="img-fluid" width="30" src="{{ $product->thumbnailPath()}}"/>
                </div>
                @foreach($product->images as $product_image)
                <div class="item">
                    <img alt="" class="img-fluid" width="30" src="{{$product_image->image}}"/>
                </div>
                @endforeach 

                    @endif
            </div>
            <div class="ribbon sale">
                <div class="theribbon">
                    SALE
                </div>
                <div class="ribbon-background">
                </div>
            </div>
            <!-- /.ribbon-->
            <div class="ribbon new">
                <div class="theribbon">
                    NEW
                </div>
                <div class="ribbon-background">
                </div>
            </div>
            <!-- /.ribbon-->
        </div>
        <div class="col-md-6">
            <div class="box">
                <h1 class="text-center">
                   {{$product->title}}
                </h1>
                <p class="goToDescription">
                    <a class="scroll-to" href="#details">
                        Scroll to product details, material & care and sizing
                    </a>
                </p>
                <p class="price">
                    ₹ {{$product->price}}
                </p>
                <p class="text-center buttons">
                        <a class="btn btn-primary" href="#" id="addToCart" productId='{{ $product->id}}'>
                        <i class="fa fa-shopping-cart">
                        </i>
                        Add to cart
                    </a>
                   
                          <a class="btn btn-outline-primary" id="addToWishlist" productId='{{$product->id}}'>
 
                        <i class="fa fa-heart">
                        </i>
                        Add to wishlist
                    </a>

                  
                </p>
            </div>
            <div class="owl-thumbs" data-slider-id="1">
                @if(isset($product))
                <div class="item">
                    <img alt="" class="img-fluid" width="30 src="{{ $product->thumbnailPath()}}"/>
                </div>
                @foreach($product->images as $product_image)
                <div class="item">
                    <img alt="" class="img-fluid" width="30" src="{{$product_image->image}}"/>
                </div>
                @endforeach 

                    @endif
            </div>
        </div>
    </div>
    <div class="box" id="details">
        <p>
        </p>
        <h4>
            Product details
        </h4>
        <div id="product_details">
            {!! $product->description !!}
        </div>
        <hr>
            <div class="social">
                <h4>
                    Show it to your friends
                </h4>
                <p>
                    <a class="external facebook" href="#">
                        <i class="fa fa-facebook">
                        </i>
                    </a>
                    <a class="external gplus" href="#">
                        <i class="fa fa-google-plus">
                        </i>
                    </a>
                    <a class="external twitter" href="#">
                        <i class="fa fa-twitter">
                        </i>
                    </a>
                    <a class="email" href="#">
                        <i class="fa fa-envelope">
                        </i>
                    </a>
                </p>
            </div>
        </hr>
    </div>
    <div class="row same-height-row">
        <div class="col-lg-3 col-md-6">
            <div class="box same-height">
                <h3>
                    You may also like these products
                </h3>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="product same-height">
                <div class="flip-container">
                    <div class="flipper">
                        <div class="front">
                            <a href="detail.html">
                                <img alt="" class="img-fluid" src="img/banner4.jpg"/>
                            </a>
                        </div>
                        <div class="back">
                            <a href="detail.html">
                                <img alt="" class="img-fluid" src="img/banner5.jpg"/>
                            </a>
                        </div>
                    </div>
                </div>
                <a class="invisible" href="detail.html">
                    <img alt="" class="img-fluid" src="img/banner6.jpg"/>
                </a>
                <div class="text">
                    <h3>
                        Silk Saree
                    </h3>
                    <p class="price">
                        Rs.2999
                    </p>
                </div>
            </div>
            <!-- /.product-->
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="product same-height">
                <div class="flip-container">
                    <div class="flipper">
                        <div class="front">
                            <a href="detail.html">
                                <img alt="" class="img-fluid" src="img/product1.jpg"/>
                            </a>
                        </div>
                        <div class="back">
                            <a href="detail.html">
                                <img alt="" class="img-fluid" src="img/product1.jpg"/>
                            </a>
                        </div>
                    </div>
                </div>
                <a class="invisible" href="detail.html">
                    <img alt="" class="img-fluid" src="img/product1.jpg"/>
                </a>
                <div class="text">
                    <h3>
                        Green Silk Saree
                    </h3>
                    <p class="price">
                        Rs.2999
                    </p>
                </div>
            </div>
            <!-- /.product-->
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="product same-height">
                <div class="flip-container">
                    <div class="flipper">
                        <div class="front">
                            <a href="detail.html">
                                <img alt="" class="img-fluid" src="img/product3.jpg"/>
                            </a>
                        </div>
                        <div class="back">
                            <a href="detail.html">
                                <img alt="" class="img-fluid" src="img/product3.jpg"/>
                            </a>
                        </div>
                    </div>
                </div>
                <a class="invisible" href="detail.html">
                    <img alt="" class="img-fluid" src="img/product3.jpg"/>
                </a>
                <div class="text">
                    <h3>
                        Pink Silk Saree
                    </h3>
                    <p class="price">
                        Rs.2999
                    </p>
                </div>
            </div>
            <!-- /.product-->
        </div>
    </div>
    <div class="row same-height-row">
        <div class="col-lg-3 col-md-6">
            <div class="box same-height">
                <h3>
                    Products viewed recently
                </h3>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="product same-height">
                <div class="flip-container">
                    <div class="flipper">
                        <div class="front">
                            <a href="detail.html">
                                <img alt="" class="img-fluid" src="img/banner4.jpg"/>
                            </a>
                        </div>
                        <div class="back">
                            <a href="detail.html">
                                <img alt="" class="img-fluid" src="img/banner5.jpg"/>
                            </a>
                        </div>
                    </div>
                </div>
                <a class="invisible" href="detail.html">
                    <img alt="" class="img-fluid" src="img/banner6.jpg"/>
                </a>
                <div class="text">
                    <h3>
                        Silk Saree
                    </h3>
                    <p class="price">
                        Rs.2999
                    </p>
                </div>
            </div>
            <!-- /.product-->
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="product same-height">
                <div class="flip-container">
                    <div class="flipper">
                        <div class="front">
                            <a href="detail.html">
                                <img alt="" class="img-fluid" src="img/product1.jpg"/>
                            </a>
                        </div>
                        <div class="back">
                            <a href="detail.html">
                                <img alt="" class="img-fluid" src="img/product1.jpg"/>
                            </a>
                        </div>
                    </div>
                </div>
                <a class="invisible" href="detail.html">
                    <img alt="" class="img-fluid" src="img/product1.jpg"/>
                </a>
                <div class="text">
                    <h3>
                        Green Silk Saree
                    </h3>
                    <p class="price">
                        Rs.2999
                    </p>
                </div>
            </div>
            <!-- /.product-->
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="product same-height">
                <div class="flip-container">
                    <div class="flipper">
                        <div class="front">
                            <a href="detail.html">
                                <img alt="" class="img-fluid" src="img/product3.jpg"/>
                            </a>
                        </div>
                        <div class="back">
                            <a href="detail.html">
                                <img alt="" class="img-fluid" src="img/product3_2.jpg"/>
                            </a>
                        </div>
                    </div>
                </div>
                <a class="invisible" href="detail.html">
                    <img alt="" class="img-fluid" src="img/product3.jpg"/>
                </a>
                <div class="text">
                    <h3>
                        Pink Silk Saree
                    </h3>
                    <p class="price">
                        Rs.2999
                    </p>
                </div>
            </div>
            <!-- /.product-->
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    $('#categories').select2({
      placeholder: "Select a Parent Category",
            allowClear: true,
            minimumResultForSearch: Infinity
  });
</script>
<script type="text/javascript">
    
    $('#addToWishlist').on('click', function(e) {
        var productId = $(this).attr('productId');
        
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

    $('#addToCart').on('click', function(e) {
        var productId = $(this).attr('productId');
        
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
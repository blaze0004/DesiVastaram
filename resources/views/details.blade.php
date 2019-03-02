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
  <div class="row" id="productMain">
    <div class="col-lg-6">
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
    <div class="col-lg-6 mt-3">
      <div class="row">
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
        <div class="owl-thumbs" data-slider-id="1" style="display: inline-flex">
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
      </div>
      <hr>
      <div class="row">
        <div class="box" id="details">
          <p>
          </p>
          <h4>
            Product details
          </h4>
          <div id="product_details" style="overflow-y: scroll; height: 400px">
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
    </div>
  </div>
</div>
<div class="box feedback-rating container">
    <div class="row">
            <div class="col-sm-3">
                <div class="rating-block">
                    <h4>Average user rating</h4>
                    <h2 class="bold padding-bottom-7">4.3 <small>/ 5</small></h2>
                    <button type="button" class="btn btn-warning btn-sm" aria-label="Left Align">
                      <span class="fa fa-star" aria-hidden="true"></span>
                    </button>
                    <button type="button" class="btn btn-warning btn-sm" aria-label="Left Align">
                      <span class="fa fa-star" aria-hidden="true"></span>
                    </button>
                    <button type="button" class="btn btn-warning btn-sm" aria-label="Left Align">
                      <span class="fa fa-star" aria-hidden="true"></span>
                    </button>
                    <button type="button" class="btn btn-default btn-grey btn-sm" aria-label="Left Align">
                      <span class="fa fa-star" aria-hidden="true"></span>
                    </button>
                    <button type="button" class="btn btn-default btn-grey btn-sm" aria-label="Left Align">
                      <span class="fa fa-star" aria-hidden="true"></span>
                    </button>
                </div>
            </div>
            <div class="col-sm-3">
                <h4>Rating breakdown</h4>
                <div class="pull-left">
                    <div class="pull-left" style="width:35px; line-height:1;">
                        <div style="height:9px; margin:5px 0;">5 <span class="fa fa-star"></span></div>
                    </div>
                    <div class="pull-left" style="width:180px;">
                        <div class="progress" style="height:9px; margin:8px 0;">
                          <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5" style="width: 1000%">
                            <span class="sr-only">80% Complete (danger)</span>
                          </div>
                        </div>
                    </div>
                    <div class="pull-right" style="margin-left:10px;">1</div>
                </div>
                <div class="pull-left">
                    <div class="pull-left" style="width:35px; line-height:1;">
                        <div style="height:9px; margin:5px 0;">4 <span class="fa fa-star"></span></div>
                    </div>
                    <div class="pull-left" style="width:180px;">
                        <div class="progress" style="height:9px; margin:8px 0;">
                          <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="4" aria-valuemin="0" aria-valuemax="5" style="width: 80%">
                            <span class="sr-only">80% Complete (danger)</span>
                          </div>
                        </div>
                    </div>
                    <div class="pull-right" style="margin-left:10px;">1</div>
                </div>
                <div class="pull-left">
                    <div class="pull-left" style="width:35px; line-height:1;">
                        <div style="height:9px; margin:5px 0;">3 <span class="fa fa-star"></span></div>
                    </div>
                    <div class="pull-left" style="width:180px;">
                        <div class="progress" style="height:9px; margin:8px 0;">
                          <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="width: 60%">
                            <span class="sr-only">80% Complete (danger)</span>
                          </div>
                        </div>
                    </div>
                    <div class="pull-right" style="margin-left:10px;">0</div>
                </div>
                <div class="pull-left">
                    <div class="pull-left" style="width:35px; line-height:1;">
                        <div style="height:9px; margin:5px 0;">2 <span class="fa fa-star"></span></div>
                    </div>
                    <div class="pull-left" style="width:180px;">
                        <div class="progress" style="height:9px; margin:8px 0;">
                          <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="5" style="width: 40%">
                            <span class="sr-only">80% Complete (danger)</span>
                          </div>
                        </div>
                    </div>
                    <div class="pull-right" style="margin-left:10px;">0</div>
                </div>
                <div class="pull-left">
                    <div class="pull-left" style="width:35px; line-height:1;">
                        <div style="height:9px; margin:5px 0;">1 <span class="fa fa-star"></span></div>
                    </div>
                    <div class="pull-left" style="width:180px;">
                        <div class="progress" style="height:9px; margin:8px 0;">
                          <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="5" style="width: 20%">
                            <span class="sr-only">80% Complete (danger)</span>
                          </div>
                        </div>
                    </div>
                    <div class="pull-right" style="margin-left:10px;">0</div>
                </div>
            </div>          
        </div>          
        
        <div class="row">
            <div class="col-sm-7">
                <hr/>
                <div class="review-block">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="http://dummyimage.com/60x60/666/ffffff&text=No+Image" class="img-rounded">
                            <div class="review-block-name"><a href="#">nktailor</a></div>
                            <div class="review-block-date">January 29, 2016<br/>1 day ago</div>
                        </div>
                        <div class="col-sm-9">
                            <div class="review-block-rate">
                                <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                                  <span class="fa fa-star" aria-hidden="true"></span>
                                </button>
                                <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                                  <span class="fa fa-star" aria-hidden="true"></span>
                                </button>
                                <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                                  <span class="fa fa-star" aria-hidden="true"></span>
                                </button>
                                <button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
                                  <span class="fa fa-star" aria-hidden="true"></span>
                                </button>
                                <button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
                                  <span class="fa fa-star" aria-hidden="true"></span>
                                </button>
                            </div>
                            <div class="review-block-title">this was nice in buy</div>
                            <div class="review-block-description">this was nice in buy. this was nice in buy. this was nice in buy. this was nice in buy this was nice in buy this was nice in buy this was nice in buy this was nice in buy</div>
                        </div>
                    </div>
                    <hr/>
                  
                </div>
            </div>
        </div>
</div>
<div class="row same-height-row">
  <div class="col-lg-3 col-lg-6">
    <div class="box same-height">
      <h3>
        You may also like these products
      </h3>
    </div>
  </div>
  @foreach($productOfSameCategory as $product)
  <div class="col-lg-3 col-lg-6">
    <div class="product same-height">
      <div class="flip-container">
        <div class="flipper">
          <div class="front">
            <a href="{{ route('product.single', $product->slug) }}">
              <img alt="" class="img-fluid" src="{{$product->thumbnailPath()}}"/>
            </a>
          </div>
          <div class="back">
            <a href="{{ route('product.single', $product->slug) }}">
              <img alt="" class="img-fluid" src="{{$product->thumbnailPath()}}"/>
            </a>
          </div>
        </div>
      </div>
      <a class="invisible" href="{{ route('product.single', $product->slug) }}">
        <img alt="" class="img-fluid" src="{{$product->thumbnailPath()}}"/>
      </a>
      <div class="text">
        <h3>
          {{ $product->title}}
        </h3>
        <p class="price">
          Rs.{{ $product->price}}
        </p>
      </div>
    </div>
    <!-- /.product-->
  </div>
  @endforeach
</div>
<div class="row same-height-row">
  <div class="col-lg-3 col-lg-6">
    <div class="box same-height">
      <h3>
        Products viewed recently
      </h3>
    </div>
  </div>
  <div class="col-lg-3 col-lg-6">
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
  <div class="col-lg-3 col-lg-6">
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
  <div class="col-lg-3 col-lg-6">
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
  }
                          );
</script>
<script type="text/javascript">
  $('#addToWishlist').on('click', function(e) {
    var productId = $(this).attr('productId');
    $.ajax({
      method: 'POST', // Type of response and matches what we said in the route
      url: '{{ route('wishlist.store') }}', // This is the url we gave in the route
      data: {
      '_token' : '{{ csrf_token() }}',
      'productId' : productId
    }
           , // a JSON object to send back
           success: function(response){
      // What to do if we succeed
      console.log(response);
    }
    ,
      error: function(jqXHR, textStatus, errorThrown) {
        // What to do if we fail
        console.log(JSON.stringify(jqXHR));
        console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
      }
  }
                        );
  }
  );
  $('#addToCart').on('click', function(e) {
    var productId = $(this).attr('productId');
    $.ajax({
      method: 'POST', // Type of response and matches what we said in the route
      url: '{{ route('cart.store') }}', // This is the url we gave in the route
      data: {
      '_token' : '{{ csrf_token() }}',
      'productId' : productId
    }
           , // a JSON object to send back
           success: function(response){
      // What to do if we succeed
      console.log(response);
    }
    ,
      error: function(jqXHR, textStatus, errorThrown) {
        // What to do if we fail
        console.log(JSON.stringify(jqXHR));
        console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
      }
  }
                    );
  }
  );
</script>
@endsection

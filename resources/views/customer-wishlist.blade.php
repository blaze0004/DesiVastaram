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
            <li aria-current="page" class="breadcrumb-item active">
                My orders
            </li>
        </ol>
    </nav>
</div>
@endsection
@section('left-sidebar')
@include('layouts.customerSectionSidebar')
@endsection
@section("content")
<div id="wishlist" class="col-lg-9">
            
              <div class="box">
                <h1>My wishlist</h1>
                <p class="lead">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
              </div>
              <div class="row products">
                <!-- Display All Products In Wishlist -->
                  

               @if(isset($products))
                  @foreach($products as $product) 

                   <div class="col-lg-3 col-md-4">
                  <div class="product">
                    <div class="flip-container">
                      <div class="flipper">
                        <div class="front"><a href="{{ route('product.single', $product->slug) }}"><img src="{{ $product->thumbnailPath() }}" alt="" class="img-fluid"></a></div>
                        <div class="back"><a href="{{ route('product.single', $product->slug) }}"><img src="{{$product->thumbnailPath()}}" alt="" class="img-fluid"></a></div>
                      </div>
                    </div><a href="{{ route('product.single', $product->slug) }}" class="invisible"><img src="{{ $product->thumbnailPath()}}" alt="" class="img-fluid"></a>
                    <div class="text">
                      <h3><a href="{{ route('product.single', $product->slug) }}">{{$product->title}}</a></h3>
                      <p class="price"> 
                        <del></del>$ {{$product->price}}
                      </p>
                      <p class="buttons"><a href="{{ route('product.single', $product->slug) }}" class="btn btn-outline-secondary">View detail</a><a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a></p>
                    </div>
                    <!-- /.text-->
                  </div>
                  <!-- /.product            -->
                </div>
                  @endforeach
               @endif
               
                <!-- /.products-->
              </div>
            </div>
@endsection

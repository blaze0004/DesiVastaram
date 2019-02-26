@extends("layouts.app")

@section('breadcrumb')
<div class="col-lg-12">
    <!-- breadcrumb-->
             <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li aria-current="page" class="breadcrumb-item active">
                    {{ $category->title}}
                  </li>
                </ol>
              </nav>

</div>
@endsection
@section('left-sidebar')

@endsection
@section("content")
<div class="col-lg-12">
              <!-- breadcrumb-->
 
              <div class="box">
                <h1>{{ $category->title }}</h1>
                <p>{!! $products[0]->description !!}</p>
              </div>
              <div class="box info-bar">
                <div class="row">
                  <div class="col-md-12 col-lg-4 products-showing">Showing <strong>{{ count($products) }}</strong> of <strong>{{$products->total()}}</strong> products</div>
                  <div class="col-md-12 col-lg-7 products-number-sort">
                    <form class="form-inline d-block d-lg-flex justify-content-between flex-column flex-md-row">
                     {{ $products->links() }}
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
                <div class="col-lg-3 col-md-4">
                  <div class="product">
                    <div class="flip-container">
                      <div class="flipper">
                        <div class="front"><a href="{{ route('product.single', $product->slug) }}"><img src="{{$product->thumbnailPath() }}" alt="" class="img-fluid"></a></div>
                        <div class="back"><a href="{{ route('product.single', $product->slug) }}"><img src="{{$product->thumbnailPath() }}" alt="" class="img-fluid"></a></div>
                      </div>
                    </div><a href="d{{ route('product.single', $product->slug) }}" class="invisible"><img src="{{$product->thumbnailPath() }}" alt="" class="img-fluid"></a>
                    <div class="text">
                      <h3><a href="{{ route('product.single', $product->slug) }}">{{ $product->title }}</a></h3>
                      <p class="price"> 
                        <del></del> ₹{{$product->price}}
                      </p>
                      <p class="buttons"><a href="{{ route('product.single', $product->slug) }}" class="btn btn-outline-secondary">View detail</a><a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a></p>
                    </div>
                    <!-- /.text-->
                  </div>
                  <!-- /.product            -->
                </div>
                @endforeach
                <!-- /.products-->
              </div>
              <div class="pages">
                  {{$products->links()}}
              </div>
            </div>
@endsection

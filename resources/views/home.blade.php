@extends('layouts.app')

@section('homeContent')
<div class="row">
    <div class="col-md-12">
        <div class="owl-carousel owl-theme" id="main-slider">
            <div class="item">
                <img alt="" class="img-fluid" src="{{ asset('img/main-slider1.jpg')}}"/>
            </div>
            <div class="item">
                <img alt="" class="img-fluid" src="{{ asset('img/main-slider2.jpg')}}"/>
            </div>
             <div class="item">
                <img alt="" class="img-fluid" src="{{ asset('img/getinspired1.jpg')}}"/>
            </div>
        </div>
        <!-- /#main-slider-->
    </div>
</div>



<div id="hot">
    <div class="box py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mb-0">
                        Hot this week
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="product-slider owl-carousel owl-theme">
            @if(isset($hotProductsList))
                @foreach($hotProductsList as $product)
            <div class="item">
                <div class="product">
                    <div class="flip-container">
                        <div class="flipper">
                            <div class="front">
                                <a href="{{ route('product.single', $product->slug) }}">
                                    <img alt="" class="img-fluid" src="{{ $product->thumbnailPath() }}"/>
                                </a>
                            </div>
                            <div class="back">
                                <a href="{{ route('product.single', $product->slug) }}">
                                    <img alt="" class="img-fluid" src="{{ $product->thumbnailPath() }}"/>
                                </a>
                            </div>
                        </div>
                    </div>
                    <a class="invisible" href="{{ route('product.single', $product->slug) }}">
                        <img alt="" class="img-fluid" src="{{ $product->thumbnailPath()}}"/>
                    </a>
                    <div class="text">
                        <h3>
                            <a href="detail.html">
                                {{ $product->title}}
                            </a>
                        </h3>
                        <p class="price">
                            <del>
                                {{ '$'}}
                            </del>
                            {{ $product->price }}
                        </p>
                    </div>
                    <!-- /.text-->
                    @if($product->discount)
                       <div class="ribbon sale">
                        <div class="theribbon">
                            SALE
                        </div>
                        <div class="ribbon-background">
                        </div>
                    </div>
                    <!-- /.ribbon-->
                    @endif
                   
                    <div class="ribbon new">
                        <div class="theribbon">
                            NEW
                        </div>
                        <div class="ribbon-background">
                        </div>
                    </div>
                    <!-- /.ribbon-->
                    
                </div>
                <!-- /.product-->
            </div>
            @endforeach
              @endif
            <!-- /.product-slider-->
        </div>
        <!-- /.container-->
    </div>
    <!-- /#hot-->
    <!-- *** HOT END ***-->
</div>
<div id="hot">
    <div class="box py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mb-0">
                        Sale
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="product-slider owl-carousel owl-theme">
            @if(isset($hotProductsList))
                @foreach($hotProductsList as $product)
            <div class="item">
                <div class="product">
                    <div class="flip-container">
                        <div class="flipper">
                            <div class="front">
                                <a href="{{ route('product.single', $product->slug) }}">
                                    <img alt="" class="img-fluid" src="{{ $product->thumbnailPath() }}"/>
                                </a>
                            </div>
                            <div class="back">
                                <a href="{{ route('product.single', $product->slug) }}">
                                    <img alt="" class="img-fluid" src="{{ $product->thumbnailPath() }}"/>
                                </a>
                            </div>
                        </div>
                    </div>
                    <a class="invisible" href="{{ route('product.single', $product->slug) }}">
                        <img alt="" class="img-fluid" src="{{ $product->thumbnailPath()}}"/>
                    </a>
                    <div class="text">
                        <h3>
                            <a href="detail.html">
                                {{ $product->title}}
                            </a>
                        </h3>
                        <p class="price">
                            <del>
                                {{ '$'}}
                            </del>
                            {{ $product->price }}
                        </p>
                    </div>
                    <!-- /.text-->
                    @if($product->discount)
                       <div class="ribbon sale">
                        <div class="theribbon">
                            SALE
                        </div>
                        <div class="ribbon-background">
                        </div>
                    </div>
                    <!-- /.ribbon-->
                    @endif
                   
                    <div class="ribbon new">
                        <div class="theribbon">
                            NEW
                        </div>
                        <div class="ribbon-background">
                        </div>
                    </div>
                    <!-- /.ribbon-->
                    
                </div>
                <!-- /.product-->
            </div>
            @endforeach
              @endif
            <!-- /.product-slider-->
        </div>
        <!-- /.container-->
    </div>
    <!-- /#hot-->
    <!-- *** HOT END ***-->
</div>




@endsection

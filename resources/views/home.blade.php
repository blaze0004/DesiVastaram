@extends('layouts.app')

@section('homeContent')
<div class="row">
    <div class="col-md-12">
        <div class="owl-carousel owl-theme" id="main-slider">
            <div class="item">
                <img alt="" class="img-fluid" src="{{ asset('img/main-slider1.jpg')}}"/>
            </div>
            <div class="item">
                <img alt="" class="img-fluid" src="img/main-slider2.jpg"/>
            </div>
            <div class="item">
                <img alt="" class="img-fluid" src="img/main-slider3.jpg"/>
            </div>
            <div class="item">
                <img alt="" class="img-fluid" src="img/main-slider4.jpg"/>
            </div>
        </div>
        <!-- /#main-slider-->
    </div>
</div>

<div class="row">
    
</div><div id="advantages">
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="box clickable d-flex flex-column justify-content-center mb-0 h-100">
                    <div class="icon">
                        <i class="fa fa-heart">
                        </i>
                    </div>
                    <h3>
                        <a href="#">
                            We love our customers
                        </a>
                    </h3>
                    <p class="mb-0">
                        We are known to provide best possible service ever
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box clickable d-flex flex-column justify-content-center mb-0 h-100">
                    <div class="icon">
                        <i class="fa fa-tags">
                        </i>
                    </div>
                    <h3>
                        <a href="#">
                            Best prices
                        </a>
                    </h3>
                    <p class="mb-0">
                        You can check that the height of the boxes adjust when longer text like this one is used in one of them.
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box clickable d-flex flex-column justify-content-center mb-0 h-100">
                    <div class="icon">
                        <i class="fa fa-thumbs-up">
                        </i>
                    </div>
                    <h3>
                        <a href="#">
                            100% satisfaction guaranteed
                        </a>
                    </h3>
                    <p class="mb-0">
                        Free returns on everything for 3 months.
                    </p>
                </div>
            </div>
        </div>
        <!-- /.row-->
    </div>
    <!-- /.container-->
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

<div class="container">
    <div class="col-md-12">
        <div class="box slideshow">
            <h3>
                Get Inspired
            </h3>
            <p class="lead">
                Get the inspiration from our world class designers
            </p>
            <div class="owl-carousel owl-theme" id="get-inspired">
                <div class="item">
                    <a href="#">
                        <img alt="Get inspired" class="img-fluid" src="img/getinspired1.jpg"/>
                    </a>
                </div>
                <div class="item">
                    <a href="#">
                        <img alt="Get inspired" class="img-fluid" src="img/getinspired2.jpg"/>
                    </a>
                </div>
                <div class="item">
                    <a href="#">
                        <img alt="Get inspired" class="img-fluid" src="img/getinspired3.jpg"/>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="box text-center">
    <div class="container">
        <div class="col-md-12">
            <h3 class="text-uppercase">
                From our blog
            </h3>
            <p class="lead mb-0">
                What's new in the world of fashion?
                <a href="blog.html">
                    Check our blog!
                </a>
            </p>
        </div>
    </div>
</div>

<div class="container">
    <div class="col-md-12">
        <div class="row" id="blog-homepage">
            <div class="col-sm-6">
                <div class="post">
                    <h4>
                        <a href="post.html">
                            Fashion now
                        </a>
                    </h4>
                    <p class="author-category">
                        By
                        <a href="#">
                            John Slim
                        </a>
                        in
                        <a href="">
                            Fashion and style
                        </a>
                    </p>
                    <hr>
                        <p class="intro">
                            Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.
                        </p>
                        <p class="read-more">
                            <a class="btn btn-primary" href="post.html">
                                Continue reading
                            </a>
                        </p>
                    </hr>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="post">
                    <h4>
                        <a href="post.html">
                            Who is who - example blog post
                        </a>
                    </h4>
                    <p class="author-category">
                        By
                        <a href="#">
                            John Slim
                        </a>
                        in
                        <a href="">
                            About Minimal
                        </a>
                    </p>
                    <hr>
                        <p class="intro">
                            Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.
                        </p>
                        <p class="read-more">
                            <a class="btn btn-primary" href="post.html">
                                Continue reading
                            </a>
                        </p>
                    </hr>
                </div>
            </div>
        </div>
        <!-- /#blog-homepage-->
    </div>
</div>

@endsection

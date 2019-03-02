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


<div data-spy="scroll" data-target=".navbar" data-offset="50">

<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-middle">  
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="#section1">Assam</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#section2">Uttar Pradesh</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#section3">Rajasthan</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#section4">Kerala</a>
    </li>
  </ul>
</nav>

<div id="section1" class="container-fluid bg-success" style="padding-top:70px;padding-bottom:70px">
  <h1><a href="\state\Assam" class="nav-link">Assam</a></h1>
  <p>Assam is a state in India, situated south of the eastern Himalayas along the Brahmaputra and Barak River valleys. Assam covers an area of 78,438 km2. The state is bordered by Bhutan and the state of Arunachal Pradesh to the north; Nagaland and Manipur to the east; Meghalaya, Tripura, Mizoram and Bangladesh to the south; and West Bengal to the west via the Siliguri Corridor, a 22 kilometres (14 mi) strip of land that connects the state to the rest of India.</p>
  <p>Assam is known for Assam Silk in textile perspective.Assam silk denotes the three major types of indigenous wild silks produced in Assam—golden muga, white pat and warm eri silk.</p>
</div>
<div id="section2" class="container-fluid bg-warning" style="padding-top:70px;padding-bottom:70px">
  <h1><a href="\state\Uttar Pradesh" class="nav-link">Uttar Pradesh</a></h1>
  <p>Uttar Pradesh is a state considered to be part of central, northern and north-central India.It is the most populous state in the Republic of India as well as the most populous country subdivision in the world. It is located in the north-central region of the Indian subcontinent, has over 200 million inhabitants.</p>
  <p>The people of Uttar Pradesh wear a variety of native dress. Traditional styles of dress include colourful draped garments – such as sari for women and dhoti or lungi for men and tailored clothes such as salwar kameez for women and kurta-pyjama for men. Men also often sport a head-gear like topi or pagri. Sherwani is a more formal male dress and is frequently worn along with chooridar on festive occasions.</p>
</div>
<div id="section3" class="container-fluid bg-secondary" style="padding-top:70px;padding-bottom:70px">
  <h1><a href="\state\Rajasthan" class="nav-link">Rajasthan</a></h1>
  <p>Rajasthan the state covers an area of 342,239 square kilometres or 10.4 percent of the total geographical area of India. It is the largest Indian state by area and the seventh largest by population. Rajasthan is located on the northwestern side of India, where it comprises most of the wide and inhospitable Thar Desert.</p>
  <p>Costumes of Rajasthan are extremely lively, reflecting the true spirit of the people, their culture and religion. The clothes of Rajasthani people are designed by keeping weather and local conditions in mind. Bright and fresh shades directly from the land of camels, wonderful wildlife and sand dunes- that’s the real crux of Rajasthani attire, be it contemporary or traditional</p>
</div>
<div id="section4" class="container-fluid bg-danger" style="padding-top:70px;padding-bottom:70px">
  <h1><a href="\state\Kerala" class="nav-link">Kerala</a></h1>
  <p>Kerala is a state on the southwestern, Malabar Coast of India. It was formed on 1 November 1956. Spread over 38,863 km2.It is divided into 14 districts with the capital being Thiruvananthapuram. Malayalam is the most widely spoken language and is also the official language of the state.</p>
  <p>When you visit Kerala you'll see men and women wearing completely white attires. It depicts purity and elegance.</p>
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
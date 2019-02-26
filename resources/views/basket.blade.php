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
                Shopping cart
            </li>
        </ol>
    </nav>
</div>
@endsection
@section("content")
<div class="col-lg-9" id="basket">
    <div class="box">
        <form action="checkout1.html" method="post">
            <h1>
                Shopping cart
            </h1>
            <p class="text-muted">
                You currently have {{ Auth::user()->cartItems->count()}} item(s) in your cart.
            </p>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th colspan="2">
                                Product
                            </th>
                            <th>
                                Quantity
                            </th>
                            <th>
                                Unit price
                            </th>
                            <th>
                                Discount
                            </th>
                            <th colspan="2">
                                Total
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset(Auth::user()->cartItems))
                        @php
                            
                            $subtotal = 0    

                        @endphp
                            @foreach(Auth::user()->cartItems as $cartItem)
                        
                        <tr>
                            <td>
                                <a href="{{ route('product.single', $cartItem->product->slug) }}">
                                    <img alt="{{ $cartItem->product->slug}}" src="{{$cartItem->product->thumbnailPath()}}"/>
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('product.single', $cartItem->product->slug) }}">
                                    {{ $cartItem->product->title }}
                                </a>
                            </td>
                            <td>
                                <input cartid="{{$cartItem->id}}" class="form-control" id="productQuantity" type="number" value="{{$cartItem->qty}}">
                                </input>
                            </td>
                            <td>
                                {{$cartItem->product->price}}
                            </td>
                            <td>
                                {{$cartItem->product->discount_price }}
                            </td>
                            <td>
                                {{ $subtotal += ($cartItem->product->price - $cartItem->product->discount_price)*($cartItem->qty)}}
                            </td>
                            <td>
                                <a cartid="{{ $cartItem->id }}" href="#" id="removeFromCart">
                                    <i class="fa fa-trash-o">
                                    </i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="5">
                                Total
                            </th>
                            <th colspan="2">
                                {{ $subtotal }}
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.table-responsive-->
            <div class="box-footer d-flex justify-content-between flex-column flex-lg-row">
                <div class="left">
                    <a class="btn btn-outline-secondary" href="{{ redirect()->back() }}">
                        <i class="fa fa-chevron-left">
                        </i>
                        Continue shopping
                    </a>
                </div>
                <div class="right">
                    <button class="btn btn-outline-secondary">
                        <i class="fa fa-refresh">
                        </i>
                        Update cart
                    </button>
                    <a href="{{ route('order.checkout') }}" class="btn btn-primary" type="submit">
                        Proceed to checkout
                        <i class="fa fa-chevron-right">
                        </i>
                    </a>
                </div>
            </div>
        </form>
    </div>
    <!-- /.box-->
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
                                <img alt="" class="img-fluid" src="img/pauns.jpg"/>
                            </a>
                        </div>
                        <div class="back">
                            <a href="detail.html">
                                <img alt="" class="img-fluid" src="img/pauns.jpg"/>
                            </a>
                        </div>
                    </div>
                </div>
                <a class="invisible" href="detail.html">
                    <img alt="" class="img-fluid" src="img/pauns.jpg"/>
                </a>
                <div class="text">
                    <h3>
                        Puans (Mizo Skirts)
                    </h3>
                    <p class="price">
                        ₹1000
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
                                <img alt="" class="img-fluid" src="img/lehenga.jpg"/>
                            </a>
                        </div>
                        <div class="back">
                            <a href="detail.html">
                                <img alt="" class="img-fluid" src="img/lehenga.jpg"/>
                            </a>
                        </div>
                    </div>
                </div>
                <a class="invisible" href="detail.html">
                    <img alt="" class="img-fluid" src="img/lehenga.jpg"/>
                </a>
                <div class="text">
                    <h3>
                        Beige-Marron Lehenga
                    </h3>
                    <p class="price">
                        ₹5999
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
                                <img alt="" class="img-fluid" src="img/anarkali.jpg"/>
                            </a>
                        </div>
                        <div class="back">
                            <a href="detail.html">
                                <img alt="" class="img-fluid" src="img/anarkali.jpg"/>
                            </a>
                        </div>
                    </div>
                </div>
                <a class="invisible" href="detail.html">
                    <img alt="" class="img-fluid" src="img/anarkali.jpg"/>
                </a>
                <div class="text">
                    <h3>
                        Pink Anarkali Dress
                    </h3>
                    <p class="price">
                        ₹3500
                    </p>
                </div>
            </div>
            <!-- /.product-->
        </div>
    </div>
</div>
<!-- /.col-lg-9-->
<div class="col-lg-3">
    <div class="box" id="order-summary">
        <div class="box-header">
            <h3 class="mb-0">
                Order summary
            </h3>
        </div>
        <p class="text-muted">
            Free shipping on orders above ₹1999
        </p>
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <tr>
                        <td>
                            Order subtotal
                        </td>
                        <th>
                            {{ $subtotal }}
                        </th>
                    </tr>
                    <tr>
                        <td>
                            Shipping and handling
                        </td>
                        <th>
                            ₹0
                        </th>
                    </tr>
                    <tr>
                        <td>
                            Tax
                        </td>
                        <th>
                            ₹0
                        </th>
                    </tr>
                    <tr class="total">
                        <td>
                            Total
                        </td>
                        <th>
                           {{ $subtotal }}
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="box">
        <div class="box-header">
            <h4 class="mb-0">
                Coupon code
            </h4>
        </div>
        <p class="text-muted">
            If you have a coupon code, please enter it in the box below.
        </p>
        <form>
            <div class="input-group">
                <input class="form-control" type="text">
                    <span class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fa fa-gift">
                            </i>
                        </button>
                    </span>
                </input>
            </div>
            <!-- /input-group-->
        </form>
    </div>
</div>
<!-- /.col-md-3-->
@endsection

@section('scripts')
<script type="text/javascript">
    // Increase or decrease product qty
/*
    $("#productQuantity").bind('keyup mouseup', function (e) {
        


         var cartId = $(this).attr('cartId');
         var productQuantity = $(this).attr('value');
       $.ajax({
    method: 'POST', // Type of response and matches what we said in the route
    url: '{{ route('cart.changeQuantity') }}', // This is the url we gave in the route
    data: {'_token' : '{{ csrf_token() }}',
            'cartId' : cartId,
            'productQuantity' : productQuantity
        }, // a JSON object to send back
    success: function(response){ // What to do if we succeed
        console.log(response);
        console.log($(e.target).attr('value'));
    },
    error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
        console.log(JSON.stringify(jqXHR));
        console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
    }
});


    });*/

    // Remove Product From Basket - Cart
    $('#removeFromCart').on('click', function(e) {
        var cartId = $(this).attr('cartId');
        
       $.ajax({
    method: 'POST', // Type of response and matches what we said in the route
    url: '{{ route('cart.destroy') }}', // This is the url we gave in the route
    data: {'_token' : '{{ csrf_token() }}',
            'cartId' : cartId
        }, // a JSON object to send back
    success: function(response){ // What to do if we succeed
        console.log(response);
        $(e.target).parent().parent().parent().remove();
    },
    error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
        console.log(JSON.stringify(jqXHR));
        console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
    }
});
    });
</script>
@endsection

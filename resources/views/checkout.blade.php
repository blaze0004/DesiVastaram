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
        Checkout - Address
      </li>
    </ol>
  </nav>
</div>
@endsection
@section("content")
<div class="col-lg-9" id="checkout">
  <div class="box">
    <form action="{{ route('checkout.pay') }}" method="POST" id="payment-form">
      @csrf
      <h1>
        Checkout
      </h1>
      <!-- Nav pills -->
      <div class="nav flex-column flex-md-row nav-pills text-center">
        <ul class="nav nav-pills" role="tablist">
          <li class="nav-item">
            <a class="nav-link flex-sm-fill text-sm-center active" id="address-pill" data-toggle="pill" href="#address">
              <i class="fa fa-map-marker">
              </i>
              Address
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link flex-sm-fill text-sm-center disabled" id="payment-method-pill" data-toggle="pill" href="#payment_method">
              <i class="fa fa-money">
              </i>
              Payment Method
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link flex-sm-fill text-sm-center disabled" id="order-review-pill" data-toggle="pill" href="#order-review">
              <i class="fa fa-eye">
              </i>
              Order Review
            </a>
          </li>
        </ul>
      </div>
      <!-- Tab panes -->
      <div class="tab-content">
        <div class="container tab-pane active" id="address">
          <br>
          <h3>
            Address
          </h3>
          <hr>
          @foreach($addresses as $address) 
          <label for="address_id">
            <input type="radio" value="{{ $address->id }}" name="address_id" class="mr-2" @if($address->id == Auth::user()->profile->default_address_id) {{'checked'}} @endif> 
            <div class="card" style="display: -webkit-inline-flex">
              <div class="card-body">
                <h4 class="card-title">{{ $address->firstName}} {{ $address->phone}}
                </h4>
                <p class="card-text"> {{ $address->address_1 }}
                </p>
              </div>
            </div>
          </label>
          <br>

          @endforeach
          </br>
          <a href="{{ route('addNewAddressForm', Auth::id() ) }}" class="btn btn-md btn-primary">Add New Address</a>
      </div>
      <div class="container tab-pane fade" id="payment_method">
        <br>
        <h3>
          Payment Method
        </h3>
        <div class="row">
          <div class="col-md-6">
         <div class="box payment_method">
              <h4>Payment gateway
              </h4>
              <p>VISA and Mastercard only.
              </p>
              <select name="payment_method" id="payment-method-select">
                <option default>Select Payment Method</option>
                <option value="1">Stripe (Visa Or Debit Card)</option>
                <option value="2">Cash On Delivery</option>
              </select>
            </div>
          </div>
         
          <div class="col-md-6" id="payment-gateway-input" style="display: none">
            <script src="https://js.stripe.com/v3/">
            </script>
            <div class="form-row"> 
              <label for="card-element">
                Credit or debit card
              </label>
              <div id="card-element">
                <!-- A Stripe Element will be inserted here. -->
              </div>
              <!-- Used to display form errors. -->
              <div id="card-errors" role="alert">
              </div>
            </div>
          </div>
        </div>
        </br>
      </div>
    <div class="container tab-pane fade" id="order-review">
      <br>
      <h3>
        Order Review
      </h3>
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
            @php
              $subtotal = 0
            @endphp
            @if(isset(Auth::user()->cartItems))
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
                {{ $cartItem->qty}}
              </td>
              <td>
                {{$cartItem->product->price}}
              </td>
              <td>
                {{$cartItem->product->discount_price }}
              </td>
              <td>
                {{ $subtotal += ($cartItem->product->price - $cartItem->product->discount_price)*($cartItem->qty) }}
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
      </br>
  </div>
</div>
<div class="box-footer d-flex justify-content-between">
  <a class="btn btn-outline-secondary" href="{{ route('showUserCart') }}">
    <i class="fa fa-chevron-left">
    </i>
    Back to Basket
  </a>
  <a class="btn btn-primary" id="moveAhead">
    Continue to Payment Method
    <i class="fa fa-chevron-right">
    </i>
  </a>
  <input type="submit" id="submit-payment-form" style="display: none" >
</div>
</div>
<!-- /.box-->
</div>
<!-- /.col-lg-9-->
<div class="col-lg-3">
  <div class="card" id="order-summary">
    <div class="card-header">
      <h3 class="mt-4 mb-4">
        Order summary
      </h3>
    </div>
    <div class="card-body">
      <p class="text-muted">
        Shipping and additional costs are calculated based on the values you have entered.
      </p>
      <div class="table-responsive">
        <table class="table">
          <tbody>
            <tr>
              <td>
                Order subtotal
              </td>
              <th>
                {{$subtotal}}
              </th>
            </tr>
            <tr>
              <td>
                Shipping and handling
              </td>
              <th>
                $10.00
              </th>
            </tr>
            <tr>
              <td>
                Tax
              </td>
              <th>
                $0.00
              </th>
            </tr>
            <tr class="total">
              <td>
                Total
              </td>
              <th>
                {{ $subtotal}}
              </th>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</form>
<!-- /.col-md-3-->
@endsection
@section('scripts')
<script type="text/javascript">
  // Move the checkout process
  $('#moveAhead').on('click', function(e) {
    console.log('clicked');
    if ($('#address-pill').hasClass('active')) {
      $('#payment-method-pill').addClass('active').removeClass('disabled');
      $('#address-pill').removeClass('active');
      $('#address').removeClass('active').addClass('fade');
      $('#payment_method').removeClass('fade').addClass('active');
      $(this).html('Continue to Order Review <i class="fa fa-chevron-right"></i>');
      $('')
    }
    else if ($('#payment-method-pill').hasClass('active'))  {
      $('#order-review-pill').addClass('active').removeClass('disabled');
      $('#payment-method-pill').removeClass('active');
      $('#payment_method').removeClass('active').addClass('fade');
      $('#order-review').removeClass('fade').addClass('active');
      $(this).html('Continue to Checkout <i class="fa fa-chevron-right"></i>');
    }
    else if ($('#order-review-pill').hasClass('active')) {
      $('#submit-payment-form').trigger('click');
    }
    else {
    }
  });

  $('#payment-method-select').on('change', function (e) {
    if ($(e.target).val() == 1) {
      $('#payment-gateway-input').css({display: 'block'});
    } else if ($(e.target).val() == 2) {
      $('#payment-gateway-input').css({display: 'none'});

    }
  });

  


</script>
@endsection

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
            <a class="nav-link flex-sm-fill text-sm-center disabled" id="payment-method-pill" data-toggle="pill" href="#payment-method">
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
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="name">Name
                </label>
                <input id="name" type="text" class="form-control" name="name" value="{{ @$profile->name}}">
              </div>
              <div class="form-group">
                <label for="name">User Name
                </label>
                <input id="user_name" type="text" class="form-control" name="user_name" value="{{ @$profile->user_name}}">
              </div>
              <div class="form-group">
                <label for="name">Gender
                </label>
                <select name="gender" id="gender" class="form-control">
                  <option value="male" @if(@$profile->gender == "male") {{'selected'}} @endif>Male
                  </option>
                  <option value="female" @if(@$profile->gender == "female") {{'selected'}} @endif>Female
                  </option>
                </select>
              </div>
            </div>
          </div>
          <!-- /.row-->
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="street">Street
                </label>
                <input id="street" type="text" class="form-control" name="street" value="{{ @$profile->address}}">
              </div>
            </div>
          </div>
          <!-- /.row-->
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="phone">Telephone
                </label>
                <input id="phone" type="text" class="form-control" name="phone" value="{{ @$profile->phone}}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="email">Email
                </label>
                <input id="email" type="text" class="form-control" name="email" value="{{@$profile->user->email}}">
              </div>
            </div>
          </div>
          </br>
      </div>
      <div class="container tab-pane fade" id="payment-method">
        <br>
        <h3>
          Payment Method
        </h3>
        <div class="row">
          <div class="col-md-6">
            <div class="box payment-method">
              <h4>Payment gateway
              </h4>
              <p>VISA and Mastercard only.
              </p>
              <div class="box-footer text-center">
                <input type="radio" name="payment" value="payment2">
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="box payment-method">
              <h4>Cash on delivery
              </h4>
              <p>You pay when you get it.
              </p>
              <div class="box-footer text-center">
                <input type="radio" name="payment" value="payment3">
              </div>
            </div>
          </div>
          <div class="col-md-6">

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
                {{ ($cartItem->product->price - $cartItem->product->discount_price)*($cartItem->qty)}}
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
                ₹6998
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
                $446.00
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
                $456.00
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
      $('#payment-method').removeClass('fade').addClass('active');
      $(this).html('Continue to Order Review <i class="fa fa-chevron-right"></i>');
      $('')
    }
    else if ($('#payment-method-pill').hasClass('active'))  {
      $('#order-review-pill').addClass('active').removeClass('disabled');
      $('#payment-method-pill').removeClass('active');
      $('#payment-method').removeClass('active').addClass('fade');
      $('#order-review').removeClass('fade').addClass('active');
      $(this).html('Continue to Checkout <i class="fa fa-chevron-right"></i>');
    }
    else if ($('#order-review-pill').hasClass('active')) {
      $('#submit-payment-form').trigger('click');
    }
    else {
    }
  });
</script>
@endsection

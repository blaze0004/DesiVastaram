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
    <form action="">
      @csrf
      <h1>
        Checkout
      </h1>
      <!-- Nav pills -->
      <div class="nav flex-column flex-md-row nav-pills text-center">
        <ul class="nav nav-pills" role="tablist">
          <li class="nav-item">
            <a class="nav-link flex-sm-fill text-sm-center active" data-toggle="pill" href="#address">
              <i class="fa fa-map-marker">
              </i>
              Address
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link flex-sm-fill text-sm-center" data-toggle="pill" href="#delivery-method">
              <i class="fa fa-truck">
              </i>
              Delivery Method
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link flex-sm-fill text-sm-center" data-toggle="pill" href="#payment-method">
              <i class="fa fa-money">
              </i>
              Payment Method
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link flex-sm-fill text-sm-center" data-toggle="pill" href="#order-review">
              <i class="fa fa-eye">
              </i>
              Order Review
            </a>
          </li>
        </ul>
      </div>
      <!-- Tab panes -->
      <div class="tab-content">
        <div class="container tab-pane active" id="home">
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
      <div class="container tab-pane fade" id="menu1">
        <br>
        <h3>
          Menu 1
        </h3>
        <p>
          Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        </p>
        </br>
      </div>
    <div class="container tab-pane fade" id="menu2">
      <br>
      <h3>
        Menu 2
      </h3>
      <p>
        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.
      </p>
      </br>
  </div>
</div>
<div class="box-footer d-flex justify-content-between">
  <a class="btn btn-outline-secondary" href="{{ route('showUserCart') }}">
    <i class="fa fa-chevron-left">
    </i>
    Back to Basket
  </a>
  <button class="btn btn-primary" type="submit">
    Continue to Delivery Method
    <i class="fa fa-chevron-right">
    </i>
  </button>
</div>
</form>
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
<!-- /.col-md-3-->
@endsection


@section('scripts')

<script type="text/javascript">
    
    // Move the checkout process
    $('#moveAhead').on('click', function(e) {

      
    });

</script>


@endsection
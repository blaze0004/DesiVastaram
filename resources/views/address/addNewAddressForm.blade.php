@extends('layouts.app')

@section('breadcrumb')
        <div class="col-lg-12">
              <!-- breadcrumb-->
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">{{ Auth::user()->role->name}}</a></li>
                  <li aria-current="page" class="breadcrumb-item active">{{__('Dashboard')}}</li>

                </ol>
              </nav>
            </div>

@endsection
@section('left-sidebar')
@include('layouts.dashboardSidebar')
@endsection
@section('content')

 <div class="col-lg-9">
    <div class="row">
        <div class="col-lg">
            @include('layouts.error-success-msg')
        </div>
    </div>
    <div class="row">
        <div class="col-lg">
            <div class="jumbotron">
                <h1>Add New Address</h1>
                <hr>
                <form action="{{ route('addNewAddress') }}" method="POST">
                    @csrf
                <div class="form-group">
                    <label for="firstName">First name</label>
                    <input type="text" name="firstName" class="form-control">
                </div>
                <div class="form-group">
                    <label for="lastName">Last name</label>
                    <input type="text" name="lastName" class="form-control">
                </div>
                <div class="form-group">
                    <label for="address1">Address 1st</label>
                    <textarea name="address1" id="address1" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="address2">Address 2nd</label>
                    <textarea name="address2" id="address2" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="phone">Phone No.</label>
                    <input type="text" name="phone" class="form-control">
                </div>

                <div class="form-group">
                    <label for="firstName">Country</label>
                    <select name="country" id="country" class="form-control">
                        <option default>Select Country</option>
                        @foreach($countries as $country) 
                        
                            <option value="{{$country->id}}">{{$country->name}}</option>

                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="state">State</label>
                    <select name="state" id="state" class="form-control">
                        <option default>Select State</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="city">Select City</label>
                    <select name="city" id="city" class="form-control">
                        <option default>Select City</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="zipcode">Zip Code</label>
                    <input type="text" class="form-control" name="zipcode">
                </div>
                
                <div class="form-group">
                    <label for="makedefaultaddress"><input type="checkbox" name="makedefaultaddress" > Make this address my default address</label>
                </div>

                  
                 <div class="form-group">
                    <label for="makedefaultaddressfordistrict"><input type="checkbox" name="makedefaultaddressfordistrict"> Make this default address for product selling</label>
                </div>

                <div class="form-group">
                    <input type="submit" value="Add Address" class="form-control">
                </div>
            
                </form>

            </div>    
        </div>
        
    </div>

            
</div>
       
    
       
@endsection


@section('scripts')
<script type="text/javascript">
    
$('#country').on('change', function(e) {
    var countryId = $(this).val();
    $.ajax({
      method: 'get', // Type of response and matches what we said in the route
      url: '{{ route('address.getStateList') }}', // This is the url we gave in the route
      data: {
      '_token' : '{{ csrf_token() }}',
      'countryId' : countryId
    }
           , // a JSON object to send back
           success: function(response){
      // What to do if we succeed
      console.log(response);
      $.each(response.statesDetails, function(key, value) {
        var statesOption = '<option value='+key+'>'+value+'</option>';
        $('#state').append(statesOption);
      });
    }
    ,
      error: function(jqXHR, textStatus, errorThrown) {
        // What to do if we fail
        console.log(JSON.stringify(jqXHR));
        console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
      }
  });
  });

 $('#state').on('change', function(e) {
    var stateId = $(this).val();
    // console.log('change');
    $.ajax({
      method: 'get', // Type of response and matches what we said in the route
      url: '{{ route('address.getCityList') }}', // This is the url we gave in the route
      data: {
      '_token' : '{{ csrf_token() }}',
      'stateId' : stateId
    }
           , // a JSON object to send back
           success: function(response){
      // What to do if we succeed
      //     console.log(response); 
      $.each(response.citiesDetails, function(key, value) {
        var cityOption = '<option value='+key+'>'+value+'</option>';
        //console.log(cityOption);   
        $('#city').append(cityOption);
      }
            );
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
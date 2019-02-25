@extends('layouts.app')
@section('breadcrumb')
<div class="col-lg-12">
  <!-- breadcrumb-->
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">{{ Auth::user()->role->name}}
        </a>
      </li>
      <li aria-current="page" class="breadcrumb-item active">{{__('Dashboard')}}
      </li>
    </ol>
  </nav>
</div>
@endsection
@section('left-sidebar')
@include('admin/partials/sidebarMenu')
@endsection
@section('content')
<div class="col-lg-9">
  <div class="row">
    <div class="col-lg">
      @include('layouts.error-success-msg')
    </div>
  </div>
  <br>

  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#home">Add Location
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu1">Update Location
      </a>
    </li>
  </ul>
  <!-- Tab panes -->
  <div class="tab-content">
    <div id="home" class="container tab-pane active">
      <br>
      <div class="row">
        <div class="col-lg">
          <div class="jumbotron">
            <h1>Add New Location
            </h1>
            <hr>
            <div class="row">
              <div class="col-md-3 mr-3">
                Add Country
                <hr>
                <form action="{{ route('admin.address.addCountry') }}" method="POST">
                  @csrf
                  <div class="form-group row">
                    <label for="countryName">Country Name
                    </label>
                    <input type="text" name="countryName" class="form-control" placeholder="Enter New Country Name">
                    <label for="countryCode">Country Code
                    </label>
                    <input type="text" name="countryCode" class="form-control" placeholder="Enter Country Code">
                    <label for="countryCurrency">Country Currency
                    </label>
                    <input type="text" name="countryCurrency" class="form-control" placeholder="Enter Country Currency">
                  </div>
                  <input type="submit" class="form-control" value="Add Country">
                </form>
              </div>
              <div class="col-md-3 mr-3">
                Add State
                <hr>
                <form action="{{ route('admin.address.addState') }}" method="POST">
                  @csrf
                  <div class="form-group row">
                    <label for="stateCountryName">Country Name
                    </label>
                    <select name="countryId" id="stateCountryName" class="form-control">
                      <option default>Select Country
                      </option>
                      <option default>Select Country
                      </option>
                      @if(isset($countries))
                      @foreach($countries as $country)
                      <option value="{{ $country->id}}">{{ $country->name }}
                      </option>
                      @endforeach
                      @endif
                    </select>
                    <label for="stateName">State Name
                    </label>
                    <input type="text" name="stateName" class="form-control" placeholder="Enter State Name">
                    <label for="stateCode">State Code
                    </label>
                    <input type="text" class="form-control" name="stateCode" placeholder="Enter State Code (Optional)">
                  </div>
                  <input type="submit" class="form-control" value="Add State">
                </form>
              </div>
              <div class="col-md-3">
                Add City
                <hr>
                <form action="{{ route('admin.address.addCity') }}" method="POST">
                  @csrf
                  <div class="form-group row">
                    <label for="cityCountryName">Country Name
                    </label>
                    <select name="countryId" id="cityCountryName" class="form-control">
                      <option default>Select Country
                      </option>
                      @if(isset($countries))
                      @foreach($countries as $country)
                      <option value="{{ $country->id}}">{{ $country->name }}
                      </option>
                      @endforeach
                      @endif
                    </select>
                    <label for="cityStateName">State Name
                    </label>
                    <select name="stateId" id="cityStateName" class="form-control">
                      <option default>Select States
                      </option>
                      @if(isset($states))
                      @foreach($states as $state)
                      <option value="{{ $state->id}}">{{ $state->name }}
                      </option>
                      @endforeach
                      @endif
                    </select>
                    <label for="cityName">City Name
                    </label>
                    <input type="text" name="cityName" class="form-control" placeholder="Enter City Name">
                  </div>
                  <input type="submit" class="form-control" value="Add City">
                  </div>
                </form>
            </div>
          </div>    
        </div>
      </div>
    </div>
    <div id="menu1" class="container tab-pane fade">
      <br>
      <div class="row">
        <div class="col-lg">
          <div class="jumbotron">
            <h1>Update Location
            </h1>
            <hr>
            <div class="row">
              <div class="col-md-3 mr-3">
                Update Country
                <hr>
                <form action="{{ route('admin.address.updateCountry') }}" method="POST">
                  @csrf
                  @method('PUT')
                  <div class="form-group row">
                    <label for="selectCountry">Select Country To Update
                    </label>
                    <select name="countryId" id="selectCountryUpdate" class="form-control">
                      <option default>Select Country
                      </option>
                      @if(isset($countries))
                      @foreach($countries as $country)
                      <option value="{{ $country->id}}">{{ $country->name }}
                      </option>
                      @endforeach
                      @endif  
                    </select>
                    <label for="countryName">Country Name
                    </label>
                    <input type="text" name="countryName" class="form-control" id="updateCountryName" placeholder="Enter New Country Name" value="">
                    <label for="countryCode">Country Code
                    </label>
                    <input type="text" name="countryCode" class="form-control" id="updateCountryCode" placeholder="Enter Country Code">
                    <label for="countryCurrency">Country Currency
                    </label>
                    <input type="text" name="countryCurrency" class="form-control" id="updateCountryCurrency" placeholder="Enter Country Currency">
                  </div>
                  <input type="submit" class="form-control" value="Update Country">
                </form>
              </div>
              <div class="col-md-3 mr-3">
                Update State
                <hr>
                <form action="{{ route('admin.address.addState') }}" method="POST">
                  @csrf
                  @method('PUT')
                  <div class="form-group row">
                    <label for="stateCountryName">Select Country Name
                    </label>
                    <select name="countryId" id="selectCountryStateUpdate" class="form-control">
                      <option default>Select Country
                      </option>
                      @if(isset($countries))
                      @foreach($countries as $country)
                      <option value="{{ $country->id}}">{{ $country->name }}
                      </option>
                      @endforeach
                      @endif
                    </select>
                    <label for="stateCountryName">Select State Name To Update
                    </label>
                    <select name="countryId" id="selectStateUpdate" class="form-control">
                      <option default>Select State
                      </option>
                    </select>
                    <label for="stateName">State Name
                    </label>
                    <input type="text" name="stateName" class="form-control" id="updateStateName"placeholder="Enter State Name">
                    <label for="stateCode">State Code
                    </label>
                    <input type="text" class="form-control" name="stateCode" id="updateStateCode" placeholder="Enter State Code (Optional)">
                  </div>
                  <input type="submit" class="form-control" value="Update State">
                </form>
              </div>
              <div class="col-md-3">
                Add City
                <hr>
                <form action="{{ route('admin.address.updateCity') }}" method="POST">
                  @csrf
                  @method('PUT')
                  <div class="form-group row">
                    <label for="cityCountryNameUpdate">Country Name
                    </label>
                    <select name="countryId" id="cityCountryNameUpdate" class="form-control">
                      <option default>Select Country
                      </option>
                      @if(isset($countries))
                      @foreach($countries as $country)
                      <option value="{{ $country->id}}">{{ $country->name }}
                      </option>
                      @endforeach
                      @endif
                    </select>
                    <label for="cityStateNameUpdate">State Name
                    </label>
                    <select name="stateId" id="cityStateNameUpdate" class="form-control">
                      <option default>Select State
                      </option>
                    </select>
                    <label for="selectCityNameUpdate">City
                    </label>
                    <select name="cityId" id="selectCityNameUpdate" class="form-control">
                      <option default>Select City
                      </option>
                    </select>
                    <label for="cityName">City Name
                    </label>
                    <input type="text" name="cityName" id="cityNameUpdate" class="form-control" placeholder="Enter City Name">
                  </div>
                  <input type="submit" class="form-control" value="Update City">
                  </div>
                </form>
            </div>
          </div>    
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
  //  AJAX Request Start Here
  $('#selectCountryUpdate').on('change', function(e) {
    var countryId = $(this).val();
    $.ajax({
      method: 'get', // Type of response and matches what we said in the route
      url: '{{ route('address.getCountryDetails') }}', // This is the url we gave in the route
      data: {
      '_token' : '{{ csrf_token() }}',
      'countryId' : countryId
    }
           , // a JSON object to send back
           success: function(response){
      // What to do if we succeed
      //  console.log(response); 
      $('#updateCountryName').val(response.countryDetails.name);
      $('#updateCountryCode').val(response.countryDetails.code);
      $('#updateCountryCurrency').val(response.countryDetails.currency_code);
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
  $('#selectCountryStateUpdate').on('change', function(e) {
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
      // console.log(response); 
      $.each(response.statesDetails, function(key, value) {
        var statesOption = '<option value='+key+'>'+value+'</option>';
        $('#selectStateUpdate').append(statesOption);
      });
    }
    ,
      error: function(jqXHR, textStatus, errorThrown) {
        // What to do if we fail
        console.log(JSON.stringify(jqXHR));
        console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
      }
  });
  }
  );
  $('#selectStateUpdate').on('change', function(e) {
    var stateId = $(this).val();
    console.log('change');
    $.ajax({
      method: 'get', // Type of response and matches what we said in the route
      url: '{{ route('address.getStateDetails') }}', // This is the url we gave in the route
      data: {
      '_token' : '{{ csrf_token() }}',
      'stateId' : stateId
    }
           , // a JSON object to send back
           success: function(response){
      // What to do if we succeed
      //    console.log(response); 
      $('#updateStateName').val(response.statesDetails.name);
      $('#updateStateCode').val(response.statesDetails.code);
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
  $('#cityCountryNameUpdate').on('change', function(e) {
    var countryId = $(this).val();
    // console.log('change');
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
      //      console.log(response); 
      $.each(response.statesDetails, function(key, value) {
        var statesOption = '<option value='+key+'>'+value+'</option>';
        $('#cityStateNameUpdate').append(statesOption);
      }
            );
    }
    ,
      error: function(jqXHR, textStatus, errorThrown) {
        // What to do if we fail
        console.log(JSON.stringify(jqXHR));
        console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
      }
  });
  });
  
  $('#cityStateNameUpdate').on('change', function(e) {
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
        $('#selectCityNameUpdate').append(cityOption);
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
  $('#selectCityNameUpdate').on('change', function(e) {
    var cityId = $(this).val();
    // console.log('change');
    $.ajax({
      method: 'get', // Type of response and matches what we said in the route
      url: '{{ route('address.getCityDetails') }}', // This is the url we gave in the route
      data: {
      '_token' : '{{ csrf_token() }}',
      'cityId' : cityId
    }
           , // a JSON object to send back
           success: function(response){
      // What to do if we succeed
      //       console.log(response); 
      $('#cityNameUpdate').val(response.cityDetail.name);
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
  // AJAX Request End Here
</script>
@endsection

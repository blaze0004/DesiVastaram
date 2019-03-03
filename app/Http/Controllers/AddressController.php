<?php

namespace App\Http\Controllers;

use App\Address;
use App\City;
use App\Country;
use App\State;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    
    /**


     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cities = City::paginate(3);

        return view('address.allLocation', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $countries = Country::all('name', 'id');
        $states    = State::all('name', 'id');

        return view('address.addNewLocation', compact('countries', 'states'));
    }

    public function addNewAddressForm($id)
    {

        $countries = Country::all('name', 'id');
        if (Auth::id() == 4 && User::where('id', $id)->first()->role->name == 'Seller'){
            $trainee = User::where('id', $id)->first()->profile;
            return view('address.addNewAddressForm', compact('countries', 'id', 'trainee'));
        }

        return view('address.addNewAddressForm', compact('countries', 'id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $requestaddState
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        // validation Code Here

        $address = Address::create([
            'user_id'    => $id,
            'firstName'  => $request->firstName,
            'lastName'   => $request->lastName,
            'address_1'  => $request->address1,
            'address_2'  => $request->address2,
            'city_id'    => $request->city,
            'state_id'   => $request->state,
            'country_id' => $request->country,
            'phone'      => $request->phone,
            'zipcode'    => $request->zipcode,

        ]);

        if ($request->makedefaultaddress == 'on') {
            $user = User::where('id', $id)->first()->profile->update(
                ['default_address_id' => $address->id]);

        }
        if ($request->makedefaultaddressfordistrict == 'on') {
            $user = User::where('id', $id)->first()->profile->update([
                'product_district_id' => $request->state,
            ]);
        }

        return back()->with('message', 'Address Added Successfully!');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        //
        $addresses = Address::paginate(2);

        return view('address.my_addresses', compact('addresses'));
    }

    public function my_addresses($id)
    {

        if (Address::where('user_id', $id)) {

          $addresses = Address::where('user_id', $id)->paginate(3);
            
            if (Auth::id() == 4 && User::where('id', $id)->first()->role->name == "Seller") {
                $trainee = User::where('id', $id)->first()->profile;
                return view('address.my_addresses', compact('addresses', 'id', 'trainee'));
            }
        }
        
        return view('address.my_addresses', compact('addresses', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address, $id, $user_id)
    {
        //

        $address   = Address::where('id', $id)->first();
        $countries = Country::all();
        $states    = State::where('country_id', $address->country_id)->get();
        $cities    = City::where('state_id', $address->state_id)->get();
        $trainee   = User::where('id', $user_id)->first()->profile;
        return view('address.editAddressForm', compact('address', 'countries', 'states', 'cities', 'trainee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $user_id)
    {      
        $address             = Address::where('id', $id)->first();
        $address->firstName  = $request->firstName;
        $address->lastName   = $request->lastName;
        $address->address_1  = $request->address1;
        $address->address_2  = $request->address2;
        $address->phone      = $request->phone;
        $address->zipcode    = $request->zipcode;
        $address->country_id = $request->country;
        $address->state_id   = $request->state;
        $address->city_id    = $request->city;

        $address->save();

        if ($request->makedefaultaddress == 'on') {
            $user = User::where('id', $user_id)->first()->profile->update(
                ['default_address_id' => $address->id]);

        }

        if ($request->makedefaultaddressfordistrict == 'on') {
            $user = User::where('id', $user_id)->first()->profile->update([
                'product_district_id' => $request->state,
            ]);
        }

        return back()->with('message', 'Address Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        //
    }

    public function addCountry(Request $request)
    {

        Country::create([
            'name'          => $request->countryName,
            'code'          => $request->countryCode,
            'currency_code' => $request->countryCurrency,
        ]);

        return back()->with('message', 'Country Added Successfully!');
    }

    public function addState(Request $request)
    {

        State::create([
            'name'       => $request->stateName,
            'code'       => $request->stateCode,
            'country_id' => $request->countryId,
        ]);

        return back()->with('message', 'State Added Successfully!');
    }

    public function addCity(Request $request)
    {

        City::create([
            'name'     => $request->cityName,
            'state_id' => $request->stateId,
        ]);

        return back()->with('message', 'City Added Successfully!');
    }

    public function getCountryDetails(Request $request)
    {

        if (!$request->countryId) {
            return response('please select a country', 200);
        }

        if ($request->ajax()) {

            $countryDetails = Country::findOrFail($request->countryId)->first()->only('name', 'code', 'currency_code');
            return response(compact('countryDetails'), 200);

        }
    }

    public function getStateList(Request $request)
    {

        if (!$request->countryId) {
            return response('Please Select A Country', 200);
        }

        if ($request->ajax()) {

            $statesDetails = Country::findOrFail($request->countryId)->states->pluck('name', 'id');

            return response(compact('statesDetails'), 200);

        }
    }

    public function getStateDetails(Request $request)
    {
        // dd($request->all());
        if (!$request->stateId) {
            return response('Please Select A State', 200);
        }

        if ($request->ajax()) {
            $statesDetails = State::findOrFail($request->stateId)->first()->only('name', 'code');

            return response(compact('statesDetails'), 200);
        }
    }

    public function getCityList(Request $request)
    {

        if (!$request->stateId) {
            # code...
            return response('Please Select A State', 200);
        } else {
            $citiesDetails = State::findOrFail($request->stateId)->cities->pluck('name', 'id');

            return response(compact('citiesDetails'), 200);
        }
    }

    public function getCityDetails(Request $request)
    {

        if (!$request->cityId) {
            # code...

            return response('Please Select A City', 200);
        } else {

            $cityDetail = City::findOrFail($request->cityId)->first()->only('name');

            return response(compact('cityDetail'), 200);

        }
    }

    public function makeDefaultAddress($id)
    {

        $user = User::find(Auth::user()->id)->profile->update(['default_address_id' => $id]);
        return back()->with('message', 'Default Address Changed');
    }

}

<?php

namespace App\Http\Controllers;

use App\Address;
use App\City;
use App\Country;
use App\State;
use Illuminate\Http\Request;

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
        $states  = State::all('name', 'id');
       
        return view('address.addNewLocation', compact('countries', 'states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $requestaddState
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //addState
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Address $address)
    {
        //
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

    public function addCountry(Request $request) {

        Country::create([
            'name' => $request->countryName,    
            'code' => $request->countryCode,
            'currency_code' => $request->countryCurrency,
        ]);

        return back()->with('message', 'Country Added Successfully!');
    }

    public function addState(Request $request) {

        State::create([
            'name' => $request->stateName,
            'code' => $request->stateCode,
            'country_id' =>$request->countryId
        ]);

        return back()->with('message', 'State Added Successfully!');
    }

    public function addCity(Request $request) {

        City::create([
            'name' => $request->cityName,
            'state_id' => $request->stateId
        ]);

        return back()->with('message', 'City Added Successfully!');
    }

    public function getCountryDetails(Request $request) {

        if (!$request->countryId) {
            return response('please select a country', 200);
        }

        if($request->ajax()) {

            $countryDetails = Country::findOrFail($request->countryId)->first()->only('name', 'code', 'currency_code');
            return response(compact('countryDetails'), 200);

        }
    }

    public function getStateList(Request $request) {

        if (!$request->countryId) {
            return response('Please Select A Country', 200);
        } 

        if ($request->ajax()) {

            $statesDetails = Country::findOrFail($request->countryId)->states->pluck('name', 'id');

            return response(compact('statesDetails'), 200);

        }
    }

    public function getStateDetails(Request $request) {
       // dd($request->all());
        if (!$request->stateId) {
            return response('Please Select A State', 200);
        }

        if ($request->ajax()) {
            $statesDetails = State::findOrFail($request->stateId)->first()->only('name', 'code');

            return response(compact('statesDetails'), 200);
        }
    }

    public function getCityList(Request $request) {

        if (!$request->stateId) {
            # code...
            return response('Please Select A State', 200);
        } else {
            $citiesDetails = State::findOrFail($request->stateId)->cities->pluck('name', 'id');

            return response(compact('citiesDetails'), 200);
        }
    }

    public function getCityDetails (Request $request) {

        if (!$request->cityId) {
            # code...

            return response('Please Select A City', 200);
        } else {

            $cityDetail = City::findOrFail($request->cityId)->first()->only('name');

            return response(compact('cityDetail'), 200);

        }
    }
}

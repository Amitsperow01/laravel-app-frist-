<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Country;
use App\Models\State;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $city=city::all();
        // $countrydata=country::all();        
        // $statedata=state::all(); 
        return view('city.index',compact('city'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countrydata=country::where('status',1)->get();        
        $state_data=state::all();        
        return view('city.create',compact('countrydata','state_data'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
       
        $cityData = City::create($data);
        
        // dd( $cityData );
        
        return redirect()->route('city.index')->withSuccess('Data Insreted...');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city = city::find($id);
        $countrys=Country::where('status',1)->get();
        $States=State::where('status',1)->where('country_id',$city->country_id)->get();
        return view('city.edit', compact('city','countrys','States'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        // dd($data);
        $data = $request->except('_token','_method','save');
        $city = city::where('id', $id)->update($data);
        return redirect()->route('city.index')->withSuccess('Data Updated...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        city::where('id', $id)->delete();
        return redirect()->route('city.index')->withSuccess('Data Deleted...');
    }
    
}

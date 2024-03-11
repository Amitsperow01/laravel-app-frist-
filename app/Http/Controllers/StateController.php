<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use App\Models\Country;
use App\Models\City;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $state=state::all();
        // $country=country::all();
        return view('state.index',compact('state'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countrydata=country::all();
        return view('state.create',compact('countrydata'));
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
        $state = State::create($data);
        $stateId = $state->id;
        $country = Country::create($data);
        $countryId = $country->id;
        // ---------------End state------------------//
        
        $ctName =$request->input('city_name');
        $ctStatus = $request->input('city_status');

        foreach ($ctName as $key => $_ctName) {
            $_ctStatus = $ctStatus[$key];
            city::create([
                "state_id" =>$stateId,
                "country_id" =>$countryId,
                 "name"  =>$_ctName,
                 "status" =>$_ctStatus

            ]);
        }
        return redirect()->route('state.index')->withSuccess("Data Add Successfully");
       
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
        $countrys=Country::where('status',1)->get();
        $states = State::find($id);
        return view('state.edit', compact('countrys','states'));
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

        State::where('id',$id)->update([
            'name' => $request->name,
            'status' => $request->status,
            'country_id' => $request->country_id
        ]);
        $cityId = $request->city_id;
        if(empty($cityId)) {
                city::where('id', $id)->delete();
        } else {
            city::whereNotIn('id', $cityId)->where('state_id', $id)->delete();
        }
        
        $cityName = $request->city_name;
        $cityStatus = $request->city_status;
        
        // dd($cityId);
        foreach($cityName as $key => $_cityName) {
            $stId = $cityId[$key]??0;
            if($stId) {
                city::where('id', $stId)->update([
                    'name' => $_cityName,
                    'status' => $cityStatus[$key],
                    // 'state_id' => $id,
                    'country_id' => $request->country_id
                ]);
            } else {
                city::create([
                    'state_id' => $id,
                    'country_id' => $request->country_id,
                    'name' => $_cityName,
                    'status' => $cityStatus[$key],
                   
                ]);
            }
        }

        return redirect()->route('state.index')->withSuccess('Data Updated...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        state::where('id', $id)->delete();
        return redirect()->route('state.index')->withSuccess('Data Deleted...');
    }
}

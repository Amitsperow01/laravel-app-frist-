<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countrys=country::all();
        return view('country.index',compact('countrys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('country.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        $countryData = [
            'name' => $request->name,
            'status' => $request->status,
        ];
        // $countryData=$request->all();
        $countryCreate = Country::create($countryData);

        $coutryId = $countryCreate->id;

        $stateName = $request->input('state_name');
        $stateStatus = $request->input('state_status');

        foreach ($stateName as $key => $_stateName) {
            $state_Status = $stateStatus[$key];
            State::create([
                'country_id' => $coutryId,
                'name' => $_stateName,
                'status' => $state_Status
            ]);
        }

        return redirect()->route('country.index')->withSuccess("Data Add Successfully");
        
        
       
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
        $countryData = Country::find($id);
   
        return view("country.edit", compact('countryData'));
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
   
        Country::whereId($id)->update([
            'name' => $request->name,
            'status' => $request->status
        ]);
        $stateId = $request->state_id;
        if(empty($stateId)) {
            State::where('country_id', $id)->delete();
        } else {
            State::whereNotIn('id', $stateId)->where('country_id', $id)->delete();
        }
        
        $stateName = $request->state_name;
        $stateStatus = $request->state_status;
        if(!empty($stateName)){
        
        // dd($stateId);
        foreach($stateName as $key => $_stateName) {
            $stId = $stateId[$key]??0;
            if($stId) {
                State::where('id', $stId)->update([
                    'name' => $_stateName,
                    'status' => $stateStatus[$key]
                ]);
            } else {
                State::create([
                    'name' => $_stateName,
                    'status' => $stateStatus[$key],
                    'country_id' => $id
                ]);
            }
        }
        }
    
        return redirect()->route("country.index")->withSuccess('Updated Successfully...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        country::where('id', $id)->delete();
        State::where('country_id', $id)->delete();
        return redirect()->route('country.index')->withSuccess('Data Deleted...');
    }

    public function getState(Request $request) {
        $countryId = $request->ct_id;
        $states = State::where('country_id', $countryId)->get();
        foreach($states as $state) {
            echo "<option value='{$state->id}'>$state->name</option>";
        }
    }
}

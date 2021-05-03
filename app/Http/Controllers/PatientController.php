<?php

namespace App\Http\Controllers;

use App\Models\Location;
use DB;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::with('location')
        ->select('id', 'firstname', 'lastname', 'location_id','jmbg','note')
        ->get();
        
        $locations = Location::get();

        return view('patients.patients')->with('patients', $patients)->with('locations', $locations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $patient = new Patient;

        $patient->firstname = $request->firstname;
        $patient->lastname = $request->lastname;
        $patient->location_id = $request->location;
        $patient->jmbg = $request->jmbg;
        $patient->note = $request->note;
    
        $patient->save();
    
        return response()->json($patient);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patint  $patint
     * @return \Illuminate\Http\Response
     */
    public function show(Patint $patint)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patint  $patint
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient = Patient::find($id);

        return response()->json($patient); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patint  $patint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $patient = Patient::find($request->id);

        $patient->firstname = $request->firstname;
        $patient->lastname = $request->lastname;
        $patient->location_id = $request->location;
        $patient->jmbg = $request->jmbg;
        $patient->note = $request->note;

        $patient->save();

        return response()->json($patient);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patint  $patint
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient = Patient::find($id);
        $patient->delete();
        return response()->json(['success'=>'patient has been deleted']);
    }
}

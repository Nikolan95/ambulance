<?php

namespace App\Http\Controllers;

use App\Models\Location;
use DB;
use App\Models\Patient;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(),[
            'firstname' => 'required|min:2|max:100',
            'lastname' => 'required|min:2|max:100',
            'location' => 'required',
            'jmbg' => 'required|min:13|numeric',
            'note' => 'required|min:6',
        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        }else{
            $values = [
                'firstname' =>$request->firstname,
                'lastname' =>$request->lastname,
                'location_id' =>$request->location,
                'jmbg' =>$request->jmbg,
                'note' =>$request->note,
            ];

            $query = DB::table('patients')->insert($values);
            if($query){
                return response()->json($values);
            }
        }
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

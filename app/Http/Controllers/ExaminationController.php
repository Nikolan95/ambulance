<?php

namespace App\Http\Controllers;

use App\Models\Examination;
use App\Models\User;
use App\Models\Patient;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class ExaminationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type = null)
    {
        if($type == 'unchecked') {
            $examinations = Examination::with('patient')->with('doctor')->whereNull('performed_at')->get();
            $doctors = User::get(); 
            $patients = Patient::get();
     
            return view('examinations.all')->with('examinations', $examinations)->with('doctors', $doctors)->with('patients', $patients);
        }
        else if($type == 'checked'){
            $examinations = Examination::with('patient')->with('doctor')->whereNotNull('performed_at')->get();
            $doctors = User::get(); 
            $patients = Patient::get();
     
            return view('examinations.all')->with('examinations', $examinations)->with('doctors', $doctors)->with('patients', $patients);
        }
        else{
            $examinations = Examination::with('patient')->with('doctor')->get();
            $doctors = User::get(); 
            $patients = Patient::get();
     
            return view('examinations.all')->with('examinations', $examinations)->with('doctors', $doctors)->with('patients', $patients);
        }

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
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
            'patient' => 'required',
            'doctor' => 'required',
            'diagnosis' => 'required|max:200',
        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        }else{
           $examination = new Examination;

        $examination->patient_id = $request->patient;
        $examination->doctor_id = $request->doctor;
        $examination->diagnosis = $request->diagnosis;
        $examination->performed_at = $request->performed_at;
        $examination->save();

        $queryId = $examination->id;
        

        $variable = Examination::with('doctor')->with('patient')->where('id', $queryId)->get();
    
        return response()->json($variable);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Examination  $examination
     * @return \Illuminate\Http\Response
     */
    public function show(Examination $examination)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Examination  $examination
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $examination = Examination::find($id);

        return response()->json($examination);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Examination  $examination
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $examination = Examination::find($request->id);

        $examination->patient_id = $request->patient;
        $examination->doctor_id = $request->doctor;
        $examination->diagnosis = $request->diagnosis;
        $examination->performed_at = $request->performed_at;
        $examination->save();

        $variable = Examination::with('doctor')->with('patient')->where('id', $request->id)->get();
        return response()->json($variable);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Examination  $examination
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $examination = Examination::find($id);
        $examination->delete();
        return response()->json(['success'=>'Doctor has been deleted']);
    }
}

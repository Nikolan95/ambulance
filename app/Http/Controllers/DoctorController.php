<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DocType;
use App\Models\Patient;
use App\Models\Examination;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function register(){

        $doctype = DocType::orderBy('type')->get();

        return view('auth.register')->with('doctype', $doctype);
    
    }
    public function login(){

        return view('auth.login');
    
    }
    public function loginDoctor(Request $request)
    {
        $username=$request->input('username');
        $password=$request->input('password');

        $request->session()->put('doctor', $request->input('username'));
        
        $data = DB::connection('mysql')->select('select id from doctors where username =? and password =?' ,[$username, $password]);
        
        

         if(count($data)){
            
            Auth::loginUsingId($data[0]->id);
            return redirect('/dashboard')->with('success', 'login success');     
        }
        else{
             
            return redirect('/error');

         }
    }
    public function logout()
    {
        Auth::logout();
        return view('auth.login');
    }
    public function account()
    {
        $id = Auth::user()->id;

        $doctorquerry = User::with('doc_type')
        ->select('firstname', 'lastname', 'doc_types_id','username')
        ->where('id', $id)
        ->get();

        $doctor = $doctorquerry[0];
      
        return view('auth.account')->with('doctor', $doctor);
    }
    public function doctors()
    {
        $doctors = User::with('doc_type')
        ->select('id', 'firstname', 'lastname', 'doc_types_id','username')
        ->get();

        $types = DocType::get();

        return view('doctors.doctors')->with('doctors', $doctors)->with('types', $types);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = User::with('doc_type')->get();

        $examinations = Examination::with('doctor')->with('patient')->where('doctor_id', Auth::user()->id)->whereNull('performed_at')->get();

        $newExaminations = Examination::with('doctor')->with('patient')->whereNull('performed_at')->get();

        $allExaminations = Examination::with('doctor')->with('patient')->get();

        $patients = Patient::get();

        $doctor = User::get();

        $exm = count($newExaminations);

        $allexm = count($allExaminations);

        $pat = count($patients);

        $doc = count($doctor);

        //dd($exm);

        return view('dashboard')->with('doctors', $doctors)->with('examinations', $examinations)->with('exm', $exm)->with('allexm', $allexm)->with('pat', $pat)->with('doc', $doc);
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
        $validate = $request->validate([

            'username' => 'required|min:4|max:100|alpha_num',
            'firstname' => 'required|min:2|max:100',
            'lastname' => 'required|min:2|max:100',
            'password' => 'required|min:5|max:15',
            'confirm_password' => 'required|min:5|max:15',
         ]);

        $doctor = new User;

        $doctor->firstname = $request->firstname;
        $doctor->lastname = $request->lastname;
        $doctor->doc_types_id = $request->type;
        $doctor->username = $request->username;
        $doctor->password = $request->password;
        $doctor->confirm_password = $request->confirm_password;


        $doctor->save();
    
        return 'success';
    }
    public function createDoctor(Request $request)
    {
        // $validate = $request->validate([

        //     'username' => 'required|min:4|max:100|alpha_num',
        //     'firstname' => 'required|min:2|max:100',
        //     'lastname' => 'required|min:2|max:100',
        //     'password' => 'required|min:5|max:15',
        //     'confirm_password' => 'required|min:5|max:15',
        //  ]);

        $doctor = new User;

        $doctor->firstname = $request->firstname;
        $doctor->lastname = $request->lastname;
        $doctor->doc_types_id = $request->type;
        $doctor->username = $request->username;
        $doctor->password = $request->password;
        $doctor->confirm_password = $request->confirm_password;


        $doctor->save();
    
        return response()->json($doctor);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $doctor = User::find($id);

        return response()->json($doctor); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $doctor = User::find($request->id);

        $doctor->firstname = $request->firstname;
        $doctor->lastname = $request->lastname;
        $doctor->doc_types_id = $request->type;
        $doctor->username = $request->username;

        $doctor->save();

        return response()->json($doctor);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctor = User::find($id);
        $doctor->delete();
        return response()->json(['success'=>'Doctor has been deleted']);
    }
}

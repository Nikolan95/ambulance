<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DocType;
use App\Models\Patient;
use App\Models\Examination;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class DoctorController extends Controller
{
    // new doctor/user register view
    public function register(){

        $doctype = DocType::orderBy('type')->get();

        return view('auth.register')->with('doctype', $doctype);
    
    }
    // login doctor/user view
    public function login(){

        return view('auth.login');
    
    }
    // login doctor function
    public function loginDoctor(Request $request)
    {
        $validate = $request->validate([
            'username' => 'required|min:4|max:100',
            'password' => 'required|min:6|',    
         ]);

        $username=$request->input('username');
        $password=$request->input('password');

        $request->session()->put('doctor', $request->input('username'));
        
        $data = DB::connection('mysql')->select('select id from doctors where username =? and password =?' ,[$username, $password]);      

         if(count($data)){           
            Auth::loginUsingId($data[0]->id);
            return redirect('/dashboard')->with('success', 'login success');     
        }
        else{       
            return back()->with('error', 'Wrong username or password');
         }
    }
    //logout doctor function
    public function logout()
    {
        Auth::logout();
        return view('auth.login');
    }
    //doctor account view
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
    //doctors list view
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
    // app dashboard
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
    //create new user/doctor via register form
    public function store(Request $request)
    {
        $validate = $request->validate([

            'username' => 'required|min:4|max:100|unique:doctors',
            'firstname' => 'required|min:2|max:100',
            'lastname' => 'required|min:2|max:100',
            'password' => 'required|min:6|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'required|min:6',
         ]);

        $doctor = new User;

        $doctor->firstname = $request->firstname;
        $doctor->lastname = $request->lastname;
        $doctor->doc_types_id = $request->type;
        $doctor->username = $request->username;
        $doctor->password = $request->password;
        $doctor->confirm_password = $request->confirm_password;


        if($doctor->save()){
            Auth::loginUsingId($doctor->id);
            return redirect('/dashboard');
        }
    }
    //create new user/doctor via inapp form
    public function createDoctor(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'username' => 'required|min:4|max:100|unique:doctors',
            'firstname' => 'required|min:2|max:100',
            'lastname' => 'required|min:2|max:100',
            'type' => 'required',
            'password' => 'required|min:6|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'required|min:6',
        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        }else{
            $values = [
                'username' =>$request->username,
                'firstname' =>$request->firstname,
                'lastname' =>$request->lastname,
                'doc_types_id' =>$request->type,
                'password' =>$request->password,
                'confirm_password' =>$request->confirm_password,
            ];

            $query = DB::table('doctors')->insert($values);
            if($query){
                $variable = User::with('doc_type')->where('username', $request->username)->get();
                return response()->json($variable);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $variable = Patient::with('location')->latest()->first();

        dd($variable);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    //edit view for doctor
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
    //update doctor/user
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'username' => 'unique:doctors,username,'.$request->id,
            'firstname' => 'required|min:2|max:100',
            'lastname' => 'required|min:2|max:100',
            'type' => 'required',
        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        }else{
        
            $values = [
                'id' =>$request->id,
                'username' =>$request->username,
                'firstname' =>$request->firstname,
                'lastname' =>$request->lastname,
                'doc_types_id' =>$request->type ,
            ];

            $query = DB::table('doctors')->where('id', $request->id)->update($values);
            
            if($query){
                $variable = User::with('doc_type')->where('id', $request->id)->get();
                return response()->json($variable);
            }
        }

        // $doctor = User::find($request->id);

        // $doctor->firstname = $request->firstname;
        // $doctor->lastname = $request->lastname;
        // $doctor->doc_types_id = $request->type;
        // $doctor->username = $request->username;

        // $doctor->save();

        // return response()->json($doctor);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    //delete doctor user
    public function destroy($id)
    {
        $doctor = User::find($id);
        $doctor->delete();
        return response()->json(['success'=>'Doctor has been deleted']);
    }
}

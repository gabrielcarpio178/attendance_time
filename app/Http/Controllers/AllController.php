<?php

namespace App\Http\Controllers;

use App\Models\Time_tracker;
use App\Models\Users_info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;


class AllController extends Controller
{
    //
    public function index(){
        return view("index");
    }

    public function create(){
        return view("pages.create_user");
    }

    public function store(Request $request){
        $data = $request->validate([
            "fname"=> ["required"],
            "lname"=> ["required"],
            "birthday"=>["required"],
            "user_type"=> ["required"],
            "gender"=> ["required"],
            "phone_number"=> ["required","numeric"],
            "email"=> ["required", "email", Rule::unique('user_data', 'email')],
            "username"=> ["required"],
            "password"=> "required|confirmed",
        ]);
        $newData = Users_info::create($data);
        return redirect()->route("home");
    }

    public function progress(Request $request){
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        $user = Users_info::where('username', $credentials['username'])->where('password', $credentials['password'])->first();
        if($user){

            $id = $user->id;
            $request->session()->put('user_id', $id);
            if($user->user_type==='user-info'){
                session()->flash('message','Welcome Back');
                $student = Time_tracker::where('student_id', $id)->first();
                $students = Time_tracker::all();
                return view("pages.student", [
                    'student' => $student,
                    'students' => $students,
                ]);
            }elseif($user->user_type==="admin"){
                session()->flash('message','Welcome Back Admin');
                return view('pages.admin');
            }elseif($user->user_type==="participatory"){
                session()->flash("message","Welcome Back Participatory");
               return view('pages.participatory');
            }
            $request->session()->put('user_type', $user->user_type);

        }else{
            session()->flash('error','Invalid Credential');
            return redirect()->back();
        }
    }


    public function time_in($id){
        date_default_timezone_set('Asia/Manila');
        $time_in = date('h:i:s');
        $date = date('Y-m-d');
        DB::table('time_tracker')->insert([
            ['date'=>$date ,'time_in' => $time_in, 'student_id' => $id]
        ]);
        $student = Time_tracker::where('student_id', $id);
        $students = Time_tracker::all();
        return view("pages.student", [
            'student' => $student,
            'students' => $students,
        ]);
    }

    public function time_out($id){
        date_default_timezone_set('Asia/Manila');
        $time_in = date('h:i:s');
        $student = Time_tracker::find($id);
        $student->time_out = $time_in;
        $student->save();
        $student = Time_tracker::where('student_id', $id);
        $students = Time_tracker::all();
        return view("pages.student", [
            'student' => $student,
            'students' => $students,
        ]);
    }

}



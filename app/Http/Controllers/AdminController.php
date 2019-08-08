<?php

namespace App\Http\Controllers;
use App\User;
use App\Registration;
use Illuminate\Support\Facades\Hash;
use App\Student;
use Illuminate\Http\Request;

class AdminController extends Controller
{
   // protected $namespace = 'App\Http\Controllers';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.home');
    }

    
    public function showUser()
    {
        $response=User::all();
        if($response->isNotEmpty())
        return $response;
        return response()->json(['errors' => ["No User Registered Yet"]]);
     }
    
    public function sync(){
        
        $registration=Registration::all();
        if($registration->isNotEmpty()){
            foreach($registration as $register){
                $host=$register->hosteller;
                $password=$host.'@'.$register->stdno;
                // $password=$host[0]->hosteller.'@'.$register->stdno;
            //     $studata = Registration::getStudentData($register->stdno);  
            //     if ($studata->isNotEmpty())
            //  {
           $user=User::firstOrCreate(['email'=>$register->email],[
               'name'=>$register->name,
               'email'=>$register->email,
               'password'=>Hash::make($password),
               'rollnumber'=>$register->stdno
           ]);

        }
           return redirect('/admin/home')->with('message', 'Sync Successful');   
        }
    }
 

}

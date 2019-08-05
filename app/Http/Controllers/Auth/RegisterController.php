<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Rules\Captcha;
use App\Registration;
use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Validator;
// use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    //  use RegistersUsers;
    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('recruitment19.register');
    }
  
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = '/register';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:120',
            'rollNumber' => 'required|unique:registrations,stdno|digits:10',
            'email' => 'required|email|unique:registrations,email',
            'contactNo' => 'required|digits:10',
            'hosteller' => 'required|in:H,D',
            'g-recaptcha-response' => new Captcha(),
        ]);

        $studata = Registration::getStudentData($request->input('rollNumber'));   
       
        if ($studata->count()) {
            $registration = new Registration;
            $registration->name = $request->input('name');
            $registration->stdno = $request->input('rollNumber');
            $registration->email = $request->input('email');
            $registration->contactNo = $request->input('contactNo');
            $registration->hosteller = $request->input('hosteller');
            $registration->gender = $studata[0]->gender;
            $registration->branch = $studata[0]->branch;
            // Mailer::sendMail($request->input('email'), Mailer::regSuccessMsg($request->input('name'),
            // $request->input('rollNumber')), $mailer);
            // SendSms::SendSMS($request->input('contactNo'),
            //                 SendSms::regSuccessMsg($request->input('name'),
            //                 $request->input('rollNumber')));

            $registration->save();
            return redirect('/register')->with('message', 'Registraion Success !!!');
        } else {
            return redirect('/register')->withErrors(['fail' => 'Invalid DataSet given.']);
        }

    // }
    //     $register= Registration::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'rollnumber'=>$request->rollNumber,
    //         'hosteller'=>$request->hosteller,
    //         'contactNo'=>$request->contactNo
    //     ]);
    //     if($register)
    //     return redirect('/register')->withMessage(['messsage'=>'Registeration successful']);

    //     return redirect('/register')->with(['errors'=>'Registeration Unsuccessful']);
    //        }

}
}

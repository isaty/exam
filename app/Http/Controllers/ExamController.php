<?php

namespace App\Http\Controllers;
use App\Exam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class ExamController extends Controller
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

    public function schedule(Request $request)
    {
        // unique id for exam id is not checked yet

        $validator=Validator::make($request->all(), [
            'exam' => 'bail|required|unique:exams,exam_id|max:40',
            'time' => 'required',
            'time_end' => 'required',
            'duration' => 'required|numeric ',
        ]);

        if ($validator->fails()) {
             return response()->json(["errors" => $validator->errors()->all()]);
        }
        
        $admin = auth()->user();
        $email = $admin->email;
        $schedule = new Exam;
        $schedule->exam_id = $request->exam;
        $schedule->admin_id = $email;
        $schedule->termination_time = $request->time_end;
        $schedule->scheduled_time = $request->time;
        $schedule->duration = $request->duration;
        $schedule->status = 'scheduled';
        $schedule->save();

        if ($schedule) 
            return  response()->json(["success"=>[ $request->exam." Scheduled"]]);

            return  response()->json(["success"=>[ $request->Exam. "Could Not Be Scheduled "]]);

    }


    public function terminate(Request $request)
    {  
        $admin = auth()->user();
        $email = $admin->email;
        if($request->Exam){
         $exam=Exam::where('exam_id','=',$request->Exam)->where('admin_id','=',$email);
         if($exam)   
         {
         $succes = Exam::where('exam_id','=',$request->Exam)->update([
               'status'=>'Terminated'
               ]);
               if($succes)
               return  response()->json(["success"=>[ $request->Exam." Terminated"]]);
               
               return response()->json(["errors"=>["Could not Terminate"]]);
            }
           return response()->json(["errors"=>["Could not match Exam with Database"]]);}

           return response()->json(["errors"=>["Exam Id could not be recieved"]]);
    
    }
    public function showExam(Request $request)
    {  $admin = auth()->user();
        $email = $admin->email;
        $validator=Validator::make($request->all(), [
            'type' => 'bail|required',
        ]);
//
        if ($validator->fails()) {
            return response()->json(["errors" => $validator->errors()->all()]);
        }
        if($request->type=='terminate'){
        $exams=Exam::where('status','=','scheduled')->orWhere('status','=','running')->where('admin_id','=',$email)->get();
        if($exams->isNotEmpty())
        return $exams;
        return response()->json([ "info"=> ["No Exams To Be Terminated"] ]);
       }
        else
            $response=Exam::where('admin_id','=',$email)->get();
            if($response->isNotEmpty())
            return $response;

            return response()->json([ "info"=> ["There are no exams entered"] ]);
        
    }

}

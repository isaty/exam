<?php

namespace App\Http\Controllers;

use App\Exam;
use App\Question;
use App\Response;
use App\TimeKeeper;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Psy\VersionUpdater\Checker;
use Illuminate\Support\Facades\Validator;

class ResponseController extends BaseController
{
  use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


  // protected $namespace = 'App\Http\Controllers';
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');
  }


  public function search(Request $request)
  {
    $validator=Validator::make($request->all(), [
              'Exam' => 'bail|exists:exams,exam_id|required|max:40,'
          ]);

          if ($validator->fails())
          {
              return response()->json(['errors'=>$validator->errors()->all()]);
          }
      $search = Exam::where('exam_id', '=', $request->Exam)->get();
      if ($search->isNotEmpty()) {
        $check=$search[0]->termination_time;
        $current = Carbon::now('Asia/Kolkata');
         $time=$current->format('H:i:s');
        if( $time > $check && $search[0]->status=='running')
          Exam::where('exam_id', '=', $request->exam_id)->update([
            'status'=>'finished'
          ]);
          $search = Exam::where('exam_id', '=', $request->Exam)->get();
        
        return $search;
      }
        }
    


  public function show(Request $request)
  {
    
    $validator=Validator::make($request->all(), [
      'Exam' => 'bail|exists:exams,exam_id|required|max:40,'
  ]);

  if ($validator->fails())
  {
      return response()->json(['errors'=>$validator->errors()->all()]);
  }

   $check=Exam::where('exam_id', '=', $request->Exam)->get('status');
   if($check[0]->status=="running"){
    $response = Question::where('exam_id', '=', $request->Exam)->select('id','question','option1','option2','option3','option4')->get();
    if ($response->isNotEmpty()) 
      return $response;
      return response()->json(['errors'=> ["Question Set Absent"] ]);
    }
      return response()->json(['errors'=> ["Exam Not Yet started"] ]);
  
  }
  function timer(Request $request)
  {
    $user = auth()->user();
    $email = $user->email;
    if($request->Exam){
    $duration = Exam::where('exam_id', '=', $request->Exam)->get('duration');
    $presence = TimeKeeper::where('user_id','=',$email)->where('exam_id', '=', $request->Exam)->get();
    if ($presence->isNotEmpty()) {
      $time_left = $presence[0]->time_left;
      return $time_left;
    }  
      $insert = TimeKeeper::create([
        'exam_id' =>$request->Exam,
        'user_id' => $email,
        'time_left' => $duration[0]->duration
      ]);
      return $duration[0]->duration;
    }
      return response()->json(['errors' => ["Exam id not received "]   ]);
  }


  function save(Request $request){
    
    $user = auth()->user();
    $email = $user->email;
    $validator=Validator::make($request->all(), [
      'Exam' => 'bail|exists:exams,exam_id|required|max:40,',
      'id' => 'required|min:0', 
      'feed' => 'required|min:1|max:4',    
      'remaining' => 'required',

  ]);

  if ($validator->fails())
  {
    if($request->remaining && $request->Exam)
    TimeKeeper::where('user_id','=',$email)->where('exam_id', '=', $request->Exam)->update([
      'time_left' =>$request->remaining
    ]);

      return response()->json(['errors'=>$validator->errors()->all()]);
  }
    $status=Exam::where('exam_id', '=', $request->Exam)->get();
    $check=Response::where('user_id','=',$email)->where('exam_id', '=', $request->Exam)->where('question_id','=',$request->id)->get();
    if($status[0]->status=='running')
    {if($check->isEmpty()){
    $save=Response::create([
      'exam_id'=>$request->Exam,
      'user_id'=>$email,
      'question_id'=>$request->id,
      'response'=>$request->feed
    ]);}
    else{
      $save=Response::where('user_id','=',$email)->where('exam_id', '=', $request->Exam)->where('question_id','=',$request->id)->update([
        'response'=>$request->feed
      ]);
    }
    TimeKeeper::where('user_id','=',$email)->where('exam_id', '=',$request->Exam)->update([
      'time_left' =>$request->remaining
    ]);
    if($save)
    return response()->json(['success' => ["successful"]   ]);
    return response()->json(['errors' => ["Last Response could not be registered "]   ]);
    }
    return response()->json(['redirect' => ["over"]   ]);
  }


  function check(Request $request){
    if($request->Exam){
    $user = auth()->user();
    $email = $user->email;
    $check=Response::where('user_id','=',$email)->where('exam_id', '=', $request->Exam)->get();
    if($check->isNotEmpty())
     return $check;
     return response()->json(['info' => ["no user response"]   ]);}
     return response()->json(['errors' => ["failed"]   ]);

  }
function timeout(Request $request){
  if($request->Exam){
  $user = auth()->user();
    $email = $user->email;
  TimeKeeper::where('user_id','=',$email)->where('exam_id', '=', $request->Exam)->update([
    'time_left' =>0
  ]);
  return response()->json(['success' => ["finished"]   ]);
}
return response()->json(['errors' => ["unsuccessful"]   ]);
}
function keep(Request $request){
  if($request->Exam){
  $user = auth()->user();
    $email = $user->email;
  TimeKeeper::where('user_id','=',$email)->where('exam_id', '=', $request->Exam)->update([
    'time_left' =>0
  ]);
  return response()->json(['success' => ["finished"]   ]);
}
return response()->json(['errors' => ["unsuccessful"]   ]);
}
}

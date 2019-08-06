<?php
namespace App\Http\Controllers;
use App\Question;
use App\Response;
use App\Exam;
use App\Result;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class ResultController extends Controller
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
    public function compile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Exam' => 'exists:exams,exam_id|required|max:40,'
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
         else {
            $obtain = 0;
            $state = Exam::where('exam_id', '=', $request->Exam)->get('status');
            if ($state->isNotEmpty()) {
                if ($state[0]->status == 'scheduled' || $state[0]->status == 'running')
               return response()->json(['errors' => ["Exam not Yet finished"] ]);
                else {
                    $user = User::all();
                    if ($user->isNotEmpty()) {
                        foreach ($user as $student) {
                            $present = Result::where('exam_id', '=', $request->Exam)->where('user_id', '=', $student->email)->get();
                            $feeds = Response::where('exam_id', '=', $request->Exam)->where('user_id', '=', $student->email)->get();
                            if ($feeds->isNotEmpty()) {
                                foreach ($feeds as $response) {
                                    $q_id = $response->question_id;
                                    //question number should one less
                                    $correct = Question::where('exam_id', '=', $request->Exam)->where('id', '=', $q_id)->get('answer');
                                    if($correct->isEmpty())
                                        return response()->json(['errors' => ["Answer could not be fetched"] ]);
                                    if ($correct[0]->answer == $response->response)
                                        $obtain=$obtain+4;
                                        $obtain=$obtain-1;
                                            
                                }
                            }
                            if($obtain<0)
                            $obtain=0;
                            if ($present->isEmpty()) {
                                Result::create([
                                    'user_id' => $student->email,
                                    'exam_id' => $request->Exam,
                                    'result' => $obtain
                                ]);
                            }
                            $obtain = 0;
                        }
                        $result = Result::where('exam_id', '=', $request->Exam)->get();
                        if ($result->isNotEmpty())
                            return $result;
                            return response()->json(['errors' => ["result could not be shown"] ]);
                    } else
                    return response()->json(['errors' => ["no user registration"] ]);  
                }
            }
         }
    }
}

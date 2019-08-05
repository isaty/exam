<?php

namespace App\Http\Controllers;
use App\Question;
use App\Exam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class QuestionController extends Controller

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

    public function addQuestion(Request $request)
    {

        $validator=Validator::make($request->all(), [
            'Exam_id' => 'bail|required|exists:exams,exam_id|max:40,',
            'Question'=>'required',
            'Option1'=>'required',
            'Option2'=>'required',
            'Option3'=>'required',
            'Option4'=>'required',
            'Answer'=>'required|numeric|min:1|max:4'
            ]);

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        $question = Question::create([
            'exam_id' => $request->Exam_id,
            'question' => $request->Question,
            'option1' => $request->Option1,
            'option2' => $request->Option2,
            'option3' => $request->Option3,
            'option4' => $request->Option4,
            'answer' => $request->Answer
        ]);
        if ($question)
        return response()->json(["success" =>["Question Added"] ]);
               
        return  response()->json(["errors" =>["Something went wrong"] ]);
    }

    public function edit(Request $request)
    { 
        
        $validator=Validator::make($request->all(), [
            'Exam_id' => 'bail|required|exists:exams,exam_id|max:40,',
            'id'=>'required|numeric|min:0',
            'Question'=>'required',
            'Option1'=>'required',
            'Option2'=>'required',
            'Option3'=>'required',
            'Option4'=>'required',
            'Answer'=>'required|numeric|min:1|max:4' 
            ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);}
        $exam=Question::where('id','=',$request->id)->where('exam_id','=',$request->Exam_id);
         if($exam)   
         {
         $succes = $exam->update([
            'question' => $request->Question,
            'option1' => $request->Option1,
            'option2' => $request->Option2,
            'option3' => $request->Option3,
            'option4' => $request->Option4,
            'answer' => $request->Answer
            ]);
               if($succes)
               return response()->json(["success" =>["Question ".$request->id." of " .$request->Exam_id ." edited"] ]);
               
               return  response()->json(["errors" =>["Something went wrong"] ]);
            }
           return  response()->json(["errors" =>["You Don't Hold Permission"] ]);

    
}
    

    public function showadmin(Request $request){
        $admin = auth()->user();
        $email = $admin->email;
        $validator=Validator::make($request->all(), [
            'id' => 'bail|required|max:40|exists:exams,exam_id'
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);}
        $exam=Exam::where('exam_id','=',$request->id)->where('admin_id','=',$email);
        if($exam)
        {
            $response=Question::where('exam_id','=',$request->id)->get();
                 if($response->isNotEmpty())       
            return $response;
        return response()->json(["info" =>["Question are not added"] ]);}
        return response()->json(["errors" =>["You Don't Hold Permission"] ]);
}
}


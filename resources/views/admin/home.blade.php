@extends('layouts.admin')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="/js/schedule.js"></script>
<script src="/js/autostart.js"></script>
<script src="/js/autoend.js"></script>
<link href="/css/home.css" rel="stylesheet" type="text/css">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    @if(Session::has('message'))
                     <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                    @endif
                    <div class="alert alert-info" style="display:none" role="alert"></div>
                    <div class="alert alert-success" style="display:none" role="alert"></div>
                    <div class="alert alert-danger" style="display:none"></div>   
                    <div id="hid">
                        <button class="button" onclick=user();> Registered Users</button><br>
                        <button class="button" onclick=schedule();>Schedule Exam</button><br>
                        <button class="button" onclick=addQuestion();> Add Question</button><br>
                        <button class="button" onclick=search();> Edit Question</button><br>
                        <button class="button" onclick=terminate();> Terminate Exam</button><br>
                        <button class="button" onclick=show();> Show all Exams</button><br>
                        <button class="button" onclick=result();> Compile Exams</button><br>
                        <form action="/sync" >
                        <button class="button" type="submit"> Sync </button><br>
                        </form>
                    </div>
            
                    <div id="work-space" style="display:none;">
                        <form name='schedule_form'>
                            <input type='hidden' name='_token' id='token' value='{{ csrf_token() }}'>
                            Exam-id<br> <input type='text' class='input' name='exam_id' id='exam_id' placeholder='Exam-id'  required><br><br>
                            Start Time<br> <input type='time' class='input' name='time' id='time'  required><br><br>
                            End Time<br> <input type='time' class='input' name='time_end' id='time_end'  required><br><br>
                            Duration<br> <input type='number' class='input' name='hour' id='hour' style="width:20%;" min=0 max=5  required>Hour
                            <input type='number' class='input' name='minutes' id='minutes' style="margin-left:2%;width:20%;" min=0 max=60  required>Minutes<br><br>
                            <button id='set' type='submit'>Set</button>
                        </form>
                    </div>

                    <div id="workspace2" style="display:none;">
                    
                    <form name="add_questions">
                            <input type='hidden' name='_token' id='token' value='{{ csrf_token() }}'>
                            <input type="text" id="exam" placeholder=" Exam id" required><br><br>
                            <input type="text" id="question" placeholder=" Question" required><br><br>
                            <input type="text" id="option1" placeholder="Option 1" required><br><br>
                            <input type="text" id="option2" placeholder="Option 2" required><br><br>
                            <input type="text" id="option3" placeholder="Option 3" required><br><br>
                            <input type="text" id="option4" placeholder="Option 4" required><br><br>
                            <input type="text" id="answer"  placeholder="Answer" required><br>
                            <button type="submit"  data-text-swap="Edit" id="add">Add</button>
                        </form>
                    </div>
                    <div id="workspace3">

                    </div>
                    <div id="workspace4" style="display:none">
                    
                      <!-- <form name="compile"  > -->
                      <input type='hidden' name='_token' id='token' value='{{ csrf_token() }}'>
                          <input type="text"  id="examid" placeholder="Exam_id"  required ><br><br>
                      <button style=margin-left:0%; id="btn" data-text-swap="Search">Compile</button>
                      <!-- </form>    -->

                    </div>
                    <button id='back' style='display:none;margin-left:38%;'><a href='/admin/home' style="color:black;text-decoration:none;">Home</a></button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
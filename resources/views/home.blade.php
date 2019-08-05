@extends('layouts.app')
@section('head')
    <script src='<a class="vglnk" href="https://www.google.com/recaptcha/api.js" rel="nofollow"><span>https</span><span>://</span><span>www</span><span>.</span><span>google</span><span>.</span><span>com</span><span>/</span><span>recaptcha</span><span>/</span><span>api</span><span>.</span><span>js</span></a>'></script>
@endsection
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<link href="/css/user.css" rel="stylesheet" type="text/css">
<script src='/js/user_inter.js'></script>
<div class="contain" style="margin-left:15%;">
<div class="col-md-8"  style="display:none;" id="response_block">
            <div class="card" style="display:inline-block;float:left;width:17%;margin-left:0%;" >
                <div class="card-header">Response</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div id="response" >
                </div>
            </div>
        </div>
</div>
    <!-- <div class="row justify-content-center" > -->
       <div class="col-md-8">
            <div class="card"style="float:left; width:60%"  >
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="alert alert-info" style="display:none"></div>
                    <div class="alert alert-danger" style="display:none"></div>
                    <div id='workspace'></div>
                
                    <div id='info'>
                    Search Exam <input type='text'id="search" placeholder="search" required><br>
                    <button  type='submit' id='search' onclick=search()  >Search</button>
                    
                </div>
                
                <!-- <div class="alert alert-danger" style="display:none"></div> -->
            </div>
            </div>

        </div>
    <!-- </div> -->
    <div class="col-md-8" style="display:none;" id="time_block">
            <div class="card" style="float:left;">
                <div class="card-header">Time Left</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div id="time_alert" >
                </div>
            </div>
        </div>
</div>
</div>
@endsection

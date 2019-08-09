<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B"
        crossorigin="anonymous">
       
    <!-- Material Design Bootstrap -->
    <link href="static/css/mdb.min.css" rel="stylesheet">
</head>

<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark success-color">
        <a class="navbar-brand black-text" href="#">Team Open Source</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
          aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <span class="navbar-text navbar-brand black-text" style="float:right;">
            <a><b>Recruitment'19</b></a>
          </span>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
          <!-- <span class="navbar-text navbar-brand black-text">
            <a><b>Recruitment'19</b></a>
          </span> -->
          <!-- <span class="navbar-text navbar-brand" style="color:#ffffff">
                <a><b>Hello ajeet</b></a>
              </span> -->
        
      </nav>
      <div id="intruction_page">
      <!-- Material form login -->
      <div>&nbsp </div>

    
      <div class="row">
            <div class="col-lg-3">
                    <img src="img2-01.png" class="img-fluid"></img>
                </div>
          <div class="card col-lg-6">
            <!--Card content-->
            <div class="card-body px-lg-5 pt-0">
                <div class="container-fluid">
          <div class="row">
              <div class="col-lg-6 col-sm-6 col-md-6">
            <h1 class="px-lg-12" >Instructions</h1></div>
            <br>
            <div>&nbsp; </div>
            <div>&nbsp </div>
            
            <h6><b>1.</b>Test duration :60 minutes. You are expected to complete the test within that time. </h6>
            <br>
            <h6><b>2.</b> The clock will be set at the server. The countdown timer at the right corner of the screen will display the remaining time
             available for you to complete the examination. When the timer reaches zero the examination ends by itself. You need to terminate the examination or submit the paper. </h6>
            <br>

             <h6><b>3.</b> Navigating to a Question: </h6>
            <h6><li> answer a question, do the following:

Click on the question number in the Question Palette to go to that question directly.</li>
<br>

<li>Select an answer for a multiple choice type question by clicking on bubble placed before the 4 choices A, B, C, D.</li>
<br> <li>Use the virtual numeric keypad to enter a number as an answer to a numerical type question.</li>
<br><li>
Click on Save and Next to save your answer for the current question and then go to the next question.</li>
<br>
Caution: Note that your answer for the current question will not be saved, 
<br>if you navigate to another question directly by clicking on its question number.
<br><br>
</h6>
<div class="instructions">
            <h6><b> 4.</b> Question paper conatins:<br></h6><br>
            </div>
            <div>
            <h6> <b>10 HTML+CSS Questions</b>  </h6> <br>
          
            <h6><b>10  Aptitude Questions</b> </h6><br>
            <h6><b>1  Algorithm Question</b></h6>
            </div>
            <br>
            
          </div>

            <h6><b>5.</b> Marking schemes:</h6>
            <h6><li>All MCQs Questions carry <b>+4</b> marks for right answer and <b>-1</b> for negative answer.</li></h6>
            <h6><li>Algorithm question carry <b>10</b> marks and no negative marking for wrong answer.</li></h6>
            <h6><li>Anybody found guility of cheating will be disqualified.</li></h6>
            
        
              <!-- Form -->
          </div>
            </div>
          
          </div>
          </div>
          
   
<div>
<div class="row">
  <div class="col-lg-4">

  </div>
<div class="card col-lg-4">
  <!--Card content-->
  <div class="card-body px-lg-5 pt-0">

    <!-- Form -->
    <!-- <form class="text-center" style="color: #757575;" > -->
         &nbsp
         &nbsp
      <!-- Search Exam -->

      <div class="md-form">
        <input type="text" id="search" class="form-control" >
        <label for="materialLoginFormPassword">Exam Name</label>
      </div>

      <div class="alert alert-success" style="display:none"></div>
      <div class="alert alert-info" style="display:none"></div>
                    <div class="alert alert-danger" style="display:none"></div>
      <!-- Search button -->
      &nbsp
      <button class="btn btn-outline-black btn-rounded btn-block my-4 waves-effect z-depth-0" onclick=search()>Search</button>

      <!-- google recaptcha -->

    <!-- </form> -->
    <!-- Form -->

  </div>
</div>
</div>
</div>
</div>
</div>
       <div id="home_page" style="display:none;">


          &nbsp;
          &nbsp;
          &nbsp;
        <div class="container-fluid">
              <div class="row">
                <div class="col-md-3"> 
                    <div class="card">
                      <h5 class="card-header success-color white-text text-center py-4">
                              <strong>Questions</strong>
                            </h5>
                            <div class="card-body px-lg-5 pt-0" id='response'>
                                     <!-- Questions here -->
                                     
                            </div>
                          
                          </div>
              </div>
                <div class="col-md-6">
             
  
                      <div class="card">
                                
                                  <h5 class="card-header success-color white-text text-center py-4" >
                                    <strong>Dashboard</strong>
                                  </h5>
                                
                                  <!-- Card content -->
                                  <div class="card-body px-lg-5 pt-0" >
                                
                                    <!-- Form -->
                                    <!-- <form class="text-center" style="color: #757575;" action="#!"> -->
                                        <!-- &nbsp -->
                                      
                                             <div id='question_space'></div>
                                      
                              
                                      <!-- &nbsp -->
                                      <!-- <button class="btn btn-outline-black btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Submit</button> -->
                                
                                      
                                
                                    <!-- </form> -->
                                    <!-- Form -->
                                
                                  </div>
                                
                                </div>
                      </div>
                <div class="col-md-3">
                      <div class="card">
                              <h5 class="card-header success-color white-text text-center py-4">
                                      <strong>Time Left</strong>
                                    </h5>
                                  
                                    <!--Card content-->
                                    <div class="card-body px-lg-5 pt-0">
                                  
                                      <!-- timer                                         -->
                                      <div id='time_alert'>
                                      <div class="btn btn-success btn-rounded btn-sm" data-text-swap="hour" id="hour" style="font-size:15px;"></div>:
                                      <div class="btn btn-success btn-rounded btn-sm" data-text-swap="minute" id="minute" style="font-size:15px;"></div>:
                                      <div class="btn btn-success btn-rounded btn-sm" data-text-swap="second" id="second" style="font-size:15px;"></div>
                                      </div>

                                              <!-- <div class="btn btn-danger btn-sm ml-5" ><h5>Algorithm</h5></div> -->
                                              <!-- Button trigger modal -->
<button type="button" class="btn btn-primary ml-5" data-toggle="modal" data-target="#basicExampleModal">
  Algorithm
</button>

<!-- Modal -->
<div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Algorithm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      Ajeet loves research! Now he is looking for subarray of maximal length with non-zero product.
      <br>

Ajeet has an array A with N elements: A1, A2, ..., AN.<br>

Subarray Aij of array A is elements from index i to index j: Ai, Ai+1, ..., Aj.<br>

Product of subarray Aij is product of all its elements (from ith to jth).<br>
<br>
<b>Input</b>
<br>
First line contains sinlge integer N denoting the number of elements.<br>
Second line contains N space-separated integers A1, A2, ..., AN denoting the elements of array.<br>
<br>
<b>Output</b><br>
In a single line print single integer - the maximal length of subarray with non-zero product.<br>
<br>
Example<br>
<b>
Input:<br>
6<br>
1 0 2 3 0 4
<br>
Output:<br>
2
<br><br>
Input:<br>
1<br>
0
<br>
Output:<br>
0
<br><br>
Input:<br>
3<br>
1 0 1
<br>
Output:<br>
1</b>
<br><br>
Explanation
For the first sample subarray is: {2, 3}.<br>

For the second sample there are no subbarays with non-zero product.<br>

For the third sample subbarays is {1}, (the first element, or the third one).<br>




      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>
                                              <!-- Full Height Modal Right -->
<!-- Full Height Modal Right -->

                                    </div>
                      </div>
                                  </div>
          
                </div>
              </div>
            </div>
        </div>
  

        </div>
 

      <div>
    <!-- SCRIPTS -->
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script> -->
    <script src='/js/user_inter.js'></script>
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>

    <!-- Tooltips -->
    <!-- <script type="text/javascript" src="https://mdbootstrap.com/previews/docs/latest/js/popper.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>

    <!-- Bootstrap core JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em"
        crossorigin="anonymous"></script>
    <!-- MDB core JavaScript -->
    <!-- <script type="text/javascript" src="https://mdbootstrap.com/previews/docs/latest/js/mdb.min.js"></script> -->
    <script type="text/javascript" src="static/js/mdb.min.js"></script>

</body>

</html>
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
            <h1 class="px-lg-12">Instructions</h1></div>
            <div>&nbsp; </div>
            <div>&nbsp </div>
            
            <h6>1. Contrary to popular belief, Lorem Ipsum is not simply random text </h6>
            <h6>1. Contrary to popular belief, Lorem Ipsum is not simply random text </h6>
            <h6>1. Contrary to popular belief, Lorem Ipsum is not simply random text </h6>
            <h6>1. Contrary to popular belief, Lorem Ipsum is not simply random text </h6>
            <h6>1. Contrary to popular belief, Lorem Ipsum is not simply random text </h6>
            <h6>1. Contrary to popular belief, Lorem Ipsum is not simply random text </h6>
            <h6>1. Contrary to popular belief, Lorem Ipsum is not simply random text </h6>
            <h6>1. Contrary to popular belief, Lorem Ipsum is not simply random text </h6>
            <h6>1. Contrary to popular belief, Lorem Ipsum is not simply random text </h6>
            <h6>1. Contrary to popular belief, Lorem Ipsum is not simply random text </h6>
            <h6>1. Contrary to popular belief, Lorem Ipsum is not simply random text </h6>
            <h6>1. Contrary to popular belief, Lorem Ipsum is not simply random text </h6>
            <h6>1. Contrary to popular belief, Lorem Ipsum is not simply random text </h6>
            
        
              <!-- Form -->
          </div>
            </div>
          
          </div>
          </div>
          </div>
    &nbsp

<div class="row">
  <div class="col-lg-4">

  </div>
<div class="card col-lg-4">
  <!--Card content-->
  <div class="card-body px-lg-5 pt-0">

    <!-- Form -->
    <!-- <form class="text-center" style="color: #757575;" > -->
        <!-- &nbsp -->
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
                                      <div id='time_alert'></div>
                                    </div>
                                  
                                  </div>
          
                </div>
              </div>
            </div>
        </div>
  

        </div>
 

      <div>
    <!-- SCRIPTS -->
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
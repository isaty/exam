
  <!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
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
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">
                <span class="sr-only"></span>
              </a>
            </li>
          </ul>
          <span class="navbar-text navbar-brand black-text">
            <a><b>Recruitment'19</b></a>
          </span>
        </div>
      </nav>

      <!-- Material form login -->
      <div>&nbsp </div>
      <div>&nbsp </div>
      <div>&nbsp </div>
    

<div class="row">
  <div class="col-lg-4">
    <img src="img.png" class="img-fluid"></img>
  </div>
<div class="card col-lg-4">

  <h5 class="card-header success-color white-text text-center py-4">
    <strong>Sign in</strong>
  </h5>

  <!--Card content-->
  <div class="card-body px-lg-5 pt-0">

    <!-- Form -->
    <form class="text-center" style="color: #757575;" method="POST" action="{{ route('login') }}">
      @csrf
        &nbsp
      <!-- Email -->
      <div class="md-form">
        <input type="text" id="materialLoginFormEmail" class="form-control  @error('rollnumber') is-invalid @enderror" name="rollnumber"  required autocomplete="rollnumber" autofocus>

        @error('rollnumber')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <label for="materialLoginFormEmail">University Roll No.</label>
      </div>
      
      <!-- Password -->
      <div class="md-form">
        <input type="password" id="materialLoginFormPassword" class="form-control  @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
        <label for="materialLoginFormPassword">Password</label>
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>

      <!-- ReCaptcha -->
      <div class="md-form" data-sitekey="6LdQILEUAAAAAJ-hTX0A5Jb2pDbx_t3qGkUQwp99"></div>
        <div class="g-recaptcha" data-sitekey="6LdQILEUAAAAAJ-hTX0A5Jb2pDbx_t3qGkUQwp99"></div>
            @if ($errors->has('g-recaptcha-response')) 
                <span class="invalid-feedback" style="display: block;">
                    <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                </span>
            @endif
        </div>

     <!-- Sign in button -->
     <button class="btn btn-outline-black btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Sign in</button>


    </form>
    <!-- Form -->

  </div>

</div>
<div class="col-lg-2">
  <img src="img1-01.png" class="img-fluid"></img>
</div>
</div>
</div>
<!-- Material form login -->
<!-- Material form subscription -->
    <!-- SCRIPTS -->
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <!-- JQuery -->
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
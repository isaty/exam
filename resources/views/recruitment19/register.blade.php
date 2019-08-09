<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="theme-color" content="#131927"/>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="icon" href="assets-recruitment19/images/logo.ico" type="image/x-icon" />
		<link
			rel="stylesheet"
			href="assets-recruitment19/plugins/bootstrap/css/bootstrap.min.css"
			/>
		<link rel="stylesheet" type="text/css" href="assets-recruitment19/css/custom.css" />
		<link
			href="https://fonts.googleapis.com/css?family=Varela+Round"
			rel="stylesheet"
			/>
		<link
			href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
			rel="stylesheet"
			/>
      <link
			href="assets-recruitment19/css/baloons.css"
			rel="stylesheet"
			/>
		<title>Recruitment '19</title>
	</head>
	<body>
        @if ($errors->any())
        <div class="modal" id="errorModal">
            <div class="modal-dialog">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title theme-red">Registration Failed</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    Please check the errors and try again !
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

                </div>
            </div>
        </div>
        @endif
        @if(session()->has('message'))
        <div class="modal" id="successModal">
            <div class="modal-dialog">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title" style="color: green">Registration Successful !</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    Your registration was successful.
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                </div>

                </div>
            </div>
        </div>
        @endif
		<main class="container-fluid">
			<div class="static-logo-bubble">
				<img src="assets-recruitment19/images/logo.svg">
			</div>
			<div class="row">
            <aside>
                <img src="assets-recruitment19/images/poster.jpeg" />
                <!-- bottom icons -->
                <div class="center-icon-mob mt-5">
                    <div class="row">
                        <div class="col-4">
                            <a href="#register" data-toggle="tooltip" data-placement="right" title="Register"><i class="fa fa-user-plus fa-2x ml-4"><span class="myicon-font">Register</span></i></a>
                        </div>
                    </div>
                </div>
            </aside>
				<div class="col-lg-4"></div>
				<!-- <section style="background-color: pink;"> -->
				<div class="col-lg-1">
					<div class="center-icon ml-3">
						<div class="col-lg-12">
							<a
								href="#home"
								data-toggle="tooltip"
								data-placement="right"
								title="Home"
								><i class="fa fa-home fa-2x py-3"></i
								></a>
						</div>
						
						<div class="col-lg-12">
							<a
								href="#register"
								data-toggle="tooltip"
								data-placement="right"
								title="Register"
								><i class="fa fa-user-plus fa-2x py-3"></i
								></a>
						</div>
					</div>
				</div>
				<div class="col-lg-7 mx-auto">
					<div class="full-screen" id="home">
						<div class="center-head">
							<h1 class="head-font">
								<a
									class="typewrite"
									data-period="2000"
									data-type='[ "RECRUITMENT `19" ]'
									>
								<span class="wrap"></span>
								</a>
							</h1>
						</div>
					</div>
					

          <div class="full-screen mb-4" id="register">
						<h1 class="text-red pt-5 theme-red">Registration</h1>

            <div class="col-12 col-lg-10 pt-3">


            <form  action= "{{ route('register') }}" method="POST" autocomplete="off">
            {{csrf_field ()}}
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter name">
                @if ($errors->has('name'))
                    <p class="theme-red">* {{ $errors->first('name') }}</p>
                @endif
            </div>
              <div class="form-group">
                <label for="rollNumber">Roll No.</label>
                <input type="text" class="form-control" id="rollNumber" name="rollNumber" placeholder="Enter Roll No">
                @if ($errors->has('rollNumber'))
                    <p class="theme-red">* {{ $errors->first('rollNumber') }}</p>
                @endif
                </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter Your email">
                @if ($errors->has('email'))
                    <p class="theme-red">* {{ $errors->first('email') }}</p>
                @endif
                </div>
              <div class="form-group">
                <label for="contactNo">Contact No</label>
                <input type="text" class="form-control" id="contactNo" name="contactNo" placeholder="Enter Contact No">
                @if ($errors->has('contactNo'))
                    <p class="theme-red">* {{ $errors->first('contactNo') }}</p>
                @endif
                </div>
              <div class="form-check form-check">
                <input class="form-check-input" type="radio" name="hosteller" value="H" id="inlineRadio1" value="option1">
                <label class="form-check-label" for="inlineRadio1">Hosteller</label>
              </div>
              <div class="form-check form-check">
                <input class="form-check-input" type="radio" name="hosteller" value="D" id="inlineRadio2" value="option2">
                <label class="form-check-label" for="inlineRadio2">Day Scholar</label>
              </div>
                @if ($errors->has('hosteller'))
                    <p class="theme-red">* {{ $errors->first('hosteller') }}</p>
                @endif

                <div class="form-check form-check-inlne">
                <input class="form-check-input" type="radio" name="gender" value="F" id="inlineRadio1" value="option1">
                <label class="form-check-label" for="inlineRadio1">Female</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" value="M" id="inlineRadio2" value="option2">
                <label class="form-check-label" for="inlineRadio2">Male</label>
              </div>
                @if ($errors->has('gender'))
                    <p class="theme-red">* {{ $errors->first('gender') }}</p>
                @endif



              <div class="g-recaptcha mt-3" data-sitekey="6LdQILEUAAAAAJ-hTX0A5Jb2pDbx_t3qGkUQwp99" ></div>

              <button type="submit" class="btn btn-primary btn-block my-3 my-reg-btn form-default">Submit</button>
            </form>

            </div>
            <!-- <div class="center-head">
                <h3>Will Be Back Soon !!</h3>
            <div> -->

					</div>
				</div>
				<!-- </section> -->
			</div>


		</main>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
		<script src="assets-recruitment19/plugins/jquery/jquery-3.3.1.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="assets-recruitment19/plugins/bootstrap/js/bootstrap.min.js"></script>
		<script src="assets-recruitment19/js/custom.js"></script>
		<script src="assets-recruitment19/js/typewriter.js"></script>
	</body>
</html>

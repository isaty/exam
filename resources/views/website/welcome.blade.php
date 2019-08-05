<!DOCTYPE html>
<html>
<head>
    <title>OSS R&D</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/slider.css">
    <link rel="stylesheet" type="text/css" href="assets/css/custom.css">
</head>
<body>
<!-- <a href="/register">
	<button class="button-c">
		Register Now
	</button>
</a> -->
<main class="screen container-fluid active">
    <div class="row">
        <div class="col-12">
            <div class="center-head-main">
                <div class="bubble logo-bubble">
                    <img src="assets/images/logo.svg">
                </div>
                <div class="bubble bubble-with-logo-1 floating-divs"></div>
                <div class="bubble bubble-with-logo-2"></div>

                <div class="bubble bubble-opac"></div>

                <div class="bubble top1"></div>
                <div class="bubble top2"></div>

                <div class="bubble bottom1"></div>
                <div class="bubble bottom2"></div>
                <h1 class="text-center">Open Source Software Research & Development Center</h1>
            </div>
        </div>
    </div>
</main>

<main class="screen container-fluid">
    <div class="row">
        <div class="col-lg-6 col-12 head-div-primary first">
            <div class="center-head section-heading">
                <h1 class="text-center">Our Domains</h1>
            </div>
        </div>
        <div class="col-lg-6 col-12 content-empty-div second py-5">
            @include('website.domains')
        </div>
    </div>
</main>

<main class="screen container-fluid">
    <div class="row">
        <div class="col-lg-6 col-12 content-empty-div second">
            <div class="center-head">
            @include('website.projects')
            </div>
        </div>
        <div class="col-lg-6 col-12 head-div-black first">
            <div class="center-head section-heading">
                <h1 class="text-center">Our Projects</h1>
            </div>
        </div>
    </div>
</main>

<main class="screen container-fluid">
    <div class="row">
        <div class="col-lg-6 col-12 head-div-primary first">
            <div class="center-head section-heading">
                <h1 class="text-center">Center Activity Charter</h1>
            </div>
        </div>
        <div class="col-lg-6 col-12 content-empty-div second">
        @include('website.charter')
        </div>
    </div>
</main>

<main class="screen container-fluid">
    <div class="row">
        <div class="col-lg-6 col-12 content-empty-div second">
            <div class="center-head">
            @include('website.events')
            </div>
        </div>
        <div class="col-lg-6 col-12 head-div-black first">
            <div class="center-head section-heading">
                <h1 class="text-center">Events</h1>
            </div>
        </div>
    </div>
</main>

<main class="screen container-fluid">
    <div class="row">
        <div class="col-lg-6 col-12 head-div-primary first">
            <div class="center-head section-heading">
                <h1 class="text-center">Our Team</h1>
            </div>
        </div>
        <div class="col-lg-6 col-12 content-empty-div second">
        @include('website.team')
        </div>
    </div>
</main>

<main class="screen container-fluid">
    <div class="row">
        <div class="col-lg-6 col-12 content-empty-div second">
        @include('website.alumni')

        </div>
        <div class="col-lg-6 col-12 head-div-black first">
            <div class="center-head section-heading">
                <h1 class="text-center">Alumini</h1>
            </div>
        </div>
    </div>
</main>

<main class="screen container-fluid">
    <div class="row">
        <div class="col-12 head-div-primary text-white">
            <div class="center-head">
                <div class="row">
                    <div class="col-12 text-center"><h1>&copy; OSS R&D Center, Web-Dev Team</h1></div>
                    <div class="col-12 text-center py-5 pb-5">
                        <a href="#"><i class="fa fa-github fa-2x px-3 text-white"></i></a>
                        <a href="https://facebook.com/ossrd"><i class="fa fa-facebook fa-2x px-3 text-white"></i></a>
                        <a href="http://ossrndc.in"><i class="fa fa-globe fa-2x px-3 text-white"></i></a>
                    </div>
                    <br>
                    <div class="col-12 pt-5 text-center">
                        <h2>We Innovate, We Create, We make it better</h2>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>

<script src="assets/plugins/jquery/jquery-3.3.1.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/slider.js"></script>
<script src="assets/js/custom.js"></script>
<script src="/js/autostart.js"></script>
<script src="/js/autoend.js"></script>
</body>
</html>

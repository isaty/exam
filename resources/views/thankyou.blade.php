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
    <style>
    *{
  box-sizing:border-box;
 /* outline:1px solid ;*/
}
body{
background: #ffffff;
background: linear-gradient(to bottom, #ffffff 0%,#e1e8ed 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#e1e8ed',GradientType=0 );
    height: 100%;
        margin: 0;
        background-repeat: no-repeat;
        background-attachment: fixed;
  
}

.wrapper-1{
  width:100%;
  height:100vh;
  display: flex;
flex-direction: column;
}
.wrapper-2{
  padding :30px;
  text-align:center;
}
h1{
    font-family: 'Kaushan Script', cursive;
  font-size:4em;
  letter-spacing:3px;
  color: #fd868c;
  margin:0;
  margin-bottom:20px;
}
.wrapper-2 p{
  margin:0;
  font-size:1.3em;
  color:#000000;
  font-family: 'Source Sans Pro', sans-serif;
  letter-spacing:1px;
}
.go-home{
  color:#fff;
  background:#ffffff;
  border:none;
  padding:10px 50px;
  margin:30px 0;
  border-radius:30px;
  text-transform:capitalize;
  box-shadow: 0 10px 16px 1px #fd868c;
}
.footer-like{
  margin-top: auto; 
  background: #ffffff;
  padding:6px;
  text-align:center;
}
.footer-like p{
  margin:0;
  padding:4px;
  color:#5892FF;
  font-family: 'Source Sans Pro', sans-serif;
  letter-spacing:1px;
}
.footer-like p a{
  text-decoration:none;
  color:#5892FF;
  font-weight:600;
}

@media (min-width:360px){
  h1{
    font-size:4.5em;
  }
  .go-home{
    margin-bottom:20px;
  }
}

@media (min-width:600px){
  .content{
  max-width:1000px;
  margin:0 auto;
}
  .wrapper-1{
  height: initial;
  max-width:620px;
  margin:0 auto;
  margin-top:50px;
  box-shadow: 4px 8px 40px 8px #fd868c 0.2;
}
  
}

.wrapper {
  /* overflow: hidden; */
  margin: 0 auto;
  width: 200px;
  height: 300px;
}

.intro, 
.challenges, 
.contact, 
.solutions {
  margin: 0 auto;
  width: 50%;
}

.intro__greeting {
  font-family: Georgia, 'Times New Roman', serif;
  font-size: 1.65rem;
  font-weight: 600;
  margin-bottom: 0;
  text-align: center
}

.intro__prompt {
  color: #000;
  margin-top: 8px;
}

.challenge {
  color: #000;
  font-weight: 600;
}

.contact {
  margin-bottom: 100px;
}

.contact__link {
  display: inline-block;
  color: #222;
  font-weight: 600;
  padding: 4px 2px;
  transition: all .2s ease-out;
}

.contact__link:hover {
  background: hsla(360,100%,100%, .5);
  border-radius: 3px;
}


/* Keyframes */
@keyframes slide-up {
  0% {
    transform: translateY(1000px);
    fill: transparent;
    opacity: 0;
  }
  60% {
    transform: translateY(-200px);
    opacity: 1;
  }
  80% {
    transform: translateY(200px);
  }
  100% {
    tranform: translateY(0);
  }
  
}

@keyframes wake-up {
  0% {
    transform: scaleY(0);
    opacity: 0;
  }
  30%{
    transform: scaleY(0.1);
    opacity: 1;
  }
  100% {
    transform: scaleY(1);
  }
}

@keyframes blink {
  20%{
    transform: scaleY(0.1);
  }
  40% {
    transform: scaleY(1);
  }
  80% {
    transform: scaleY(0.1);
  }
}

@keyframes fade-in {
  0% {
    opacity: 0;
    transform: scale(0.1);
  }
  80% {
    transform: scale(1.2);
  }
}

@keyframes offset-smile {
  100% {
    stroke-dashoffset: 0;
  }
}

/* SVG Styles */
.notetato * {
  transform:  skew(1deg) rotate(2deg);
  /* transform-origin: 50% 50%; */
  transform-origin: 0px 0px;
}
.head .square, 
.head-lines {
  animation: slide-up .65s 1s cubic-bezier(.17,-1.1,.83,1.1) backwards;
}

.head .square:nth-of-type(2) {
  animation-delay: 1.2s;
}

.head .square:nth-of-type(3), 
.head-lines {
  animation-delay: 1.4s;
}

.eye--left {
  animation: wake-up .5s 2.25s ease-in backwards;
  /* The Path provides the transform-origin values in d=Mx y */
  transform-origin: 414.608px 630.5px ;
}

.eye--right {
  animation: wake-up .5s 2.25s ease-in backwards, blink 1s 2.85s ease-in forwards;
  transform-origin: 846.777px 606.363px;
}

/* If I add infinite he pulse blushes in a funny way */
.blush--left{
  animation: fade-in .65s 2.75s cubic-bezier(.17,-1.1,.83,1.1) backwards;
  transform-origin: 353.5px 687px;
}

.blush--right{
  animation: fade-in .65s 2.75s cubic-bezier(.17,-1.1,.83,1.1) backwards;
  transform-origin: 868.5px 685px;
}

.smile {
  stroke-dasharray: 380;
  stroke-dashoffset: 380;
  animation: offset-smile .3s 2s linear forwards;
}
    </style>
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
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      
      <div class=content>
            <div class="wrapper-1">
              <div class="wrapper-2">
                <h1>Thank you !</h1>
                <h5><b>Best of luck for further rounds.</b> </h5>
                <h5><b> Hope to meet in personal interview round.</b> </h5>
                              </div>
              
          </div>
          </div>

          <div class="wrapper">
                <svg width="200px" height="300px" viewBox="0 0 1100 1100" xmlns="http://www.w3.org/2000/svg"
                  <g class="notetato">
                    <g class="head">
                      <rect class="square" stroke="#222" stroke-width="42.035" fill="#fff" sketch:type="MSShapeGroup" x="50" y="169" width="885" height="885" rx="11.062"/>
                      <rect class="square"stroke="#222" stroke-width="42.035" fill="#fff" sketch:type="MSShapeGroup" x="108" y="110.5" width="885" height="885" rx="11.062"/>
                      <rect class="square" stroke="#222" stroke-width="42.035" fill="#fff" sketch:type="MSShapeGroup" x="165" y="46.5" width="885" height="885" rx="11.062"/>
                      <g class="head-lines">
                        <path d="M804 139.5l-165.789 231.1" stroke="#000" stroke-width="13.274" stroke-linecap="round" sketch:type="MSShapeGroup"/>
                        <path d="M869 223.5l-58.889 84.897" stroke="#000" stroke-width="12.832" stroke-linecap="round" sketch:type="MSShapeGroup"/>
                        <path d="M646.885 151.609l-55.769 99.783" stroke="#000" stroke-width="13.009" stroke-linecap="round" sketch:type="MSShapeGroup"/>
                      </g>
                    </g>
                    <g class="eyes">
                      <path class="eye--left" d="M414.608 630.5c20.057-3.265 35.392-21.155 35.392-42.734 0-23.895-18.804-43.266-42-43.266s-42 19.371-42 43.266c0 6.972 1.601 13.559 4.445 19.392 2.153-.35 4.36-.532 6.608-.532 16.428 0 30.653 9.716 37.555 23.874z" fill="#000" sketch:type="MSShapeGroup"/>
                      <path class="eye--right" d="M846.777 606.363c2.705-5.687 4.223-12.076 4.223-18.828 0-23.767-18.804-43.035-42-43.035s-42 19.267-42 43.035c0 22.939 17.516 41.686 39.591 42.965 6.816-14.332 21.171-24.206 37.777-24.206.809 0 1.612.023 2.409.07z" fill="#000" sketch:type="MSShapeGroup"/>
                    </g>
                    <g class="blush">
                      <ellipse class="blush--left" fill="#F3D4CA" sketch:type="MSShapeGroup" cx="353.5" cy="687" rx="26.5" ry="27.5"/>
                      <ellipse class="blush--right" fill="#F3D4CA" sketch:type="MSShapeGroup" cx="868.5" cy="685" rx="26.5" ry="27.5"/>
                    </g>
                    <path class="smile" d="M444 726.586s205.373 133.278 350-1.086" stroke="#000" stroke-width="17.699" stroke-linecap="round" stroke-linejoin="bevel" sketch:type="MSShapeGroup" fill="none" />
                  </g>
                </svg>
              </div>
                 
          
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
          <link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Source+Sans+Pro" rel="stylesheet">

      
    <!-- SCRIPTS -->
    <script>var logout=setTimeout(function(){  document.getElementById('logout-form').submit();},10000); </script>
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
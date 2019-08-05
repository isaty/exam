/**
 * Created by Eleven on 27-02-2019.
 */

var $viewportWidth = Math.max(
  document.documentElement.clientWidth,
  window.innerWidth || 0
);

//$visible determines how many tiles to show on the slider
// depends upon $viewportWidth
var $visible;

//
var sliderList;

// calculateVisible() calculates the no. of tiles to show on the slider
function calculateVisible() {
  if ($viewportWidth < 576) $visible = 1;
  if ($viewportWidth >= 576 && $viewportWidth < 768) $visible = 1;
  if ($viewportWidth >= 768 && $viewportWidth < 992) $visible = 3;
  if ($viewportWidth > 992) $visible = 3;
}

var slider0 = [
  { title: 2015, id: 0, members: 8 },
  { title: 2016, id: 1, members: 8 },
  { title: 2017, id: 2, members: 8 }
];
var slider1 = [
  { title: "2011", members: "1" },
  { title: "2012", members: "1" },
  { title: "2013", members: "8" },
  { title: "2014", members: "5" }
];
var members2011 = [
  {
    name: "Puneet Bansal",
    year: "2011-2015",
    image: "./assets/images/members/2011-2015/PuneetBansal.jpg"
  }
];
var members2012 = [
  {
    name: "Aman Rai",
    year: "2012-2016",
    image: "./assets/images/members/2012-2016/AmanRai.jpg"
  }
];
var members2013 = [
  {
    name: "Prashant Kumar",
    year: "2013-2017",
    image: "./assets/images/members/2013-2017/PrashantKumar.jpg"
  },
  {
    name: "Nikhil Katiyar",
    year: "2013-2017",
    image: "./assets/images/members/2013-2017/NikhilKatiyar.jpg"
  },
  {
    name: "Rajat Srivastava",
    year: "2013-2017",
    image: "./assets/images/members/2013-2017/RajatSrivastava.jpg"
  },
  {
    name: "Harshit Agrawal",
    year: "2013-2017",
    image: "./assets/images/members/2013-2017/HarshitAgrawal.jpg"
  },
  {
    name: "Kshitij Yadav",
    year: "2013-2017",
    image: "./assets/images/members/2013-2017/KshitijYadav.jpg"
  },
  {
    name: "Nikhil Kumar",
    year: "2013-2017",
    image: "./assets/images/members/2013-2017/NikhilKumar.jpg"
  },
  {
    name: "Prashant Verma",
    year: "2013-2017",
    image: "./assets/images/members/2013-2017/PrashantVerma.jpg"
  },
  {
    name: "Abhinav Rai",
    year: "2013-2017",
    image: "./assets/images/members/2013-2017/AbhinavRai.jpg"
  }
];
var members2014 = [
  {
    name: "Ritik Raj",
    year: "2014-2018",
    image: "./assets/images/members/2014-2018/RitikRaj.jpg"
  },
  {
    name: "Shubham Bhatia",
    year: "2014-2018",
    image: "./assets/images/members/2014-2018/ShubhamBhatia.jpg"
  },
  {
    name: "Shivam Bansal",
    year: "2014-2018",
    image: "./assets/images/members/2014-2018/ShivamBansal.jpg"
  },
  {
    name: "Jagmohan Singh",
    year: "2014-2018",
    image: "./assets/images/members/2014-2018/JagmohanSingh.jpg"
  },
  {
    name: "Ayush Singh",
    year: "2014-2018",
    image: "./assets/images/members/2014-2018/AyushSingh.jpg"
  }
];
var members2015 = [
  {
    name: "Anshul Sharma",
    year: "2015-2019",
    image: "./assets/images/members/2015-2019/AnshulSharma.jpg"
  },
  {
    name: "Akshat Singhal",
    year: "2015-2019",
    image: "./assets/images/members/2015-2019/AkshatSinghal.jpg"
  },
  {
    name: "Himanshu Gupta",
    year: "2015-2019",
    image: "./assets/images/members/2015-2019/HimanshuGupta.jpg"
  },
  {
    name: "Archit Agrawal",
    year: "2015-2019",
    image: "./assets/images/members/2015-2019/ArchitAgrawal.jpg"
  },
  {
    name: "Deeksha Gupta",
    year: "2015-2019",
    image: "./assets/images/members/2015-2019/DikshaGupta.jpg"
  },
  {
    name: "Devanshi Khare",
    year: "2015-2019",
    image: "./assets/images/members/2015-2019/DevanshiKhare.jpg"
  },
  {
    name: "Divyam Singh",
    year: "2015-2019",
    image: "./assets/images/members/2015-2019/DivyamSingh.jpg"
  },
  {
    name: "Soumya Manchanda",
    year: "2015-2019",
    image: "./assets/images/members/2015-2019/SoumyaManchanda.jpg"
  }
];
var members2016 = [
  {
    name: "Saurabh Srivastava",
    year: "2016-2020",
    image: "./assets/images/members/2016-2020/SaurabhSrivastava.jpg"
  },
  {
    name: "Shivendra Gupta",
    year: "2016-2020",
    image: "./assets/images/members/2016-2020/ShivendraGupta.jpg"
  },
  {
    name: "Shivi Agrawal",
    year: "2016-2020",
    image: "./assets/images/members/2016-2020/ShiviAgrawal.jpg"
  },
  {
    name: "Shubham Singh",
    year: "2016-2020",
    image: "./assets/images/members/2016-2020/ShubhamSingh.jpg"
  },
  {
    name: "Rishabh Agrawal",
    year: "2016-2020",
    image: "./assets/images/members/2016-2020/RishabhAgrawal.jpg"
  },
  {
    name: "Krishnanshu Mishra",
    year: "2016-2020",
    image: "./assets/images/members/2016-2020/KrishnanshuMishra.jpg"
  },
  {
    name: "Sarvagya Jalota",
    year: "2016-2020",
    image: "./assets/images/members/2016-2020/SarvagyaJalota.jpg"
  },
  {
    name: "Srishti Singh",
    year: "2016-2020",
    image: "./assets/images/members/2016-2020/SrishtiSingh.jpg"
  }
];
var members2017 = [
  {
    name: "Ajeet Kumar",
    year: "2017-2021",
    image: "./assets/images/members/2017-2021/AjeetKumar.jpg"
  },
  {
    name: "Aniket Pandey",
    year: "2017-2021",
    image: "./assets/images/members/2017-2021/AniketPandey.jpg"
  },
  {
    name: "Kavinder Panwar",
    year: "2017-2021",
    image: "./assets/images/members/2017-2021/KavinderPanwar.jpg"
  },
  {
    name: "Gaurav",
    year: "2017-2021",
    image: "./assets/images/members/2017-2021/Gaurav.jpg"
  },
  {
    name: "Neha Shukla",
    year: "2017-2021",
    image: "./assets/images/members/2017-2021/NehaShukla.jpg"
  },
  {
    name: "Sagar Agrawal",
    year: "2017-2021",
    image: "./assets/images/members/2017-2021/SagarAgrawal.jpg"
  },
  {
    name: "Satyam Singh",
    year: "2017-2021",
    image: "./assets/images/members/2017-2021/SatyamSingh.jpg"
  },
  {
    name: "Ashutosh Yadav",
    year: "2017-2021",
    image: "./assets/images/members/2017-2021/AshutoshYadav.jpg"
  }
];

// checkControl() finds and sends data to check the next and previous buttons on slider
function checkControls() {
  $(".slider-prev").addClass("d-none");
  $(".slider-next").each(function() {
    var $children = $(this)
      .closest(".flat-slider")
      .find(".flat-slider-content")
      .children().length;
    if ($children <= $visible) {
      $(this).addClass("d-none");
    }
  });
}

// Hide the next/previous icons
function hideIcon($this) {
  $this.addClass("d-none");
}

// Show the next/previous icons
function showIcon($this) {
  $this.removeClass("d-none");
}

//Checks condition for visibility of next icon
function checkNext($this, $count, $totalChildren) {
  if ($count <= $totalChildren - $visible) showIcon($this);
  else hideIcon($this);
}

//Checks condition for visibility of prev icon
function checkPrev($this, $count, $totalChildren) {
  if ($count > 1 && $totalChildren !== 1 && $count <= $totalChildren)
    showIcon($this);
  else hideIcon($this);
}

function setActive($this, $index) {
  $this
    .find(".flat-slider-item")
    .eq($index)
    .addClass("active");
}
function setThisActive($this) {
  $this.siblings(".flat-slider-item.active").removeClass("active");
  $this.addClass("active");
}

function showSliderData(iSlider) {
  var sliderIndex = "slider" + iSlider;
  var memberYear = "members" + window[sliderIndex][0].title;
  switchCarousel(sliderIndex, 0, iSlider, memberYear);
}

function showActiveData($this, $index) {
  var $iSlider = $this.closest(".flat-slider");
  var i, sliderClass;
  for (i = 0; i < sliderList.length; i++) {
    sliderClass = "slider-" + i;
    if ($iSlider.hasClass(sliderClass)) {
      $iSlider = i;
      break;
    }
  }
  var sliderIndex = "slider" + $iSlider;
  var memberYear = "members" + window[sliderIndex][$index].title;
  $(".flat-slider.slider-" + $iSlider)
    .find(".carousel-indicators")
    .html(" ");
  $(".flat-slider.slider-" + $iSlider)
    .find(".carousel-inner")
    .html(" ");

  switchCarousel(sliderIndex, $index, $iSlider, memberYear);

  // $(".flat-slider.slider-"+$iSlider)
  //     .find(".title-body")
  //     .fadeOut(function () {
  //         $(this)
  //             .find(".title")
  //             .html(window[sliderIndex][$index].title)
  //             .end()
  //             .find(".body")
  //             .html(window[sliderIndex][$index].body)
  //     })
  //     .fadeIn();
}
function switchCarousel(sliderIndex, $index, $iSlider, memberYear) {
  // slider-1 0 1 members2010
  var k = 0;
  for (k = 0; k < window[sliderIndex][$index].members; k++) {
    $(".flat-slider.slider-" + $iSlider)
      .find(".carousel-indicators")
      .append(
        "" +
          '<li data-target="' +
          "#slider-" +
          $iSlider +
          '" data-slide-to="' +
          k +
          '"></li> '
      );
    $(".flat-slider.slider-" + $iSlider)
      .find(".carousel-inner")
      .append(
        "" +
          '<div class="carousel-item"> ' +
          '<figure class="member-image"> ' +
          '<img src="' +
          window[memberYear][k].image +
          '"> ' +
          "</figure> " +
          '<div class="member-name">' +
          "" +
          window[memberYear][k].name +
          "</div>" +
          '<div class="member-data">' +
          window[memberYear][k].year +
          "</div>" +
          "</div>"
      );
  }
  $(".flat-slider.slider-" + $iSlider)
    .find(".carousel-indicators li")
    .eq(0)
    .addClass("active");
  $(".flat-slider.slider-" + $iSlider)
    .find(".carousel-inner .carousel-item")
    .eq(0)
    .addClass("active");
}
$(document).ready(function() {
  var $val; //initialise count=1 as the first thing

  sliderList = $(".flat-slider");

  calculateVisible(); // Second Thing to do. Calculate Visible tiles
  checkControls(); // Check Controls Visibility after tiles visibility

  // these classes affect the $visibility of tiles
  $(".flat-slider-item").addClass("col-12 col-lg-4 col-md-4");

  var iSlider = 0;
  $(".flat-slider").each(function() {
    var $count = 1;
    var $totalChild = $(this)
      .find(".flat-slider-content")
      .children().length;
    setActive($(this), 0);
    $(this)
      .addClass("slider-" + iSlider)
      .find(".slider-next")
      .on("click", function() {
        if ($count <= $totalChild - $visible) {
          $val = $count * 100;
          $(this)
            .closest(".flat-slider")
            .find(".flat-slider-item")
            .animate({
              left: "-" + parseInt($val / $visible) + "%"
            });
          if ($visible === 1) {
            $(this)
              .closest(".flat-slider")
              .find(".item-group")
              .eq($count)
              .click();
          }
          $count++;
          checkNext($(this), $count, $totalChild);
          checkPrev(
            $(this)
              .closest(".flat-slider")
              .find(".slider-prev"),
            $count,
            $totalChild
          );
        }
      })
      .end()
      .find(".slider-prev")
      .on("click", function() {
        if ($count > 1 && $totalChild !== 1 && $count <= $totalChild) {
          $count--;
          $val = 100;
          $(this)
            .closest(".flat-slider")
            .find(".flat-slider-item")
            .animate({
              left: "+=" + $val / $visible + "%"
            });
          if ($visible === 1) {
            $(this)
              .closest(".flat-slider")
              .find(".flat-slider-item")
              .eq($count - 1)
              .click();
          }
          checkPrev($(this), $count, $totalChild);
          checkNext(
            $(this)
              .closest(".flat-slider")
              .find(".slider-next"),
            $count,
            $totalChild
          );
        }
      })
      .end()
      .find(".flat-slider-item")
      .on("click", function() {
        if (!$(this).hasClass("active")) {
          setThisActive($(this));
          showActiveData($(this), $(this).index());
        }
      });
    showSliderData(iSlider);
    iSlider++;
  });
});

$(window).resize(function() {
  $viewportWidth = Math.max(
    document.documentElement.clientWidth,
    window.innerWidth || 0
  );
  calculateVisible();
});

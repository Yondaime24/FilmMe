<?php 
  include('functions/functions.php');

  if (isset($_POST['contact_btn'])) {

  $fullname = $_POST['fullname'];
  $email = $_POST['email'];
  $contact_number = $_POST['contact_number'];
  $message = $_POST['message'];

  $query = "INSERT INTO `contact_us`(`fullname`, `email`, `contact_number`, `message`) VALUES ('$fullname','$email','$contact_number','$message')";

  $result = mysqli_query($db, $query);

  if ($result) {

    echo "<script>alert('Your message has been sent!')</script>";
    echo "<script>window.open('index.php','_self')</script>";
    
  }else{

  }

}

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
  <!-- Required meta tags-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="apple-touch-icon" sizes="76x76" href="images/logo2.png">
    <link rel="icon" type="image/png" href="images/logo2.png">

    <!-- Title Page-->
    <title>Film Me</title>
  <script>
    addEventListener("load", function () {
      setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
      window.scrollTo(0, 1);
    }
  </script>
  <!-- //Meta tag Keywords -->

  <!-- Custom-Files -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <!-- Bootstrap-Core-CSS -->
  <link href="css/pogo-slider.min.css" rel="stylesheet" type="text/css" media="all" />
  <!-- Banner-Slider-CSS -->
  <link rel="stylesheet" href="css/owl.theme.css" type="text/css" media="all">
  <link rel="stylesheet" href="css/owl.carousel.css" type="text/css" media="screen" property="" />
  <!-- owl carousel -->
  <link href="css/prettyPhoto.css" rel="stylesheet" type="text/css" />
  <!-- gallery lightbox -->
  <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
  <!-- Style-CSS -->
  <link rel="stylesheet" href="css/fontawesome-all.css">
  <!-- Font-Awesome-Icons-CSS -->
  <!-- //Custom-Files -->

  <!-- Web-Fonts -->
  <link href="//fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
      rel="stylesheet">
  <link href="//fonts.googleapis.com/css?family=Hind:300,400,500,600,700&amp;subset=devanagari,latin-ext" rel="stylesheet">
  <!-- //Web-Fonts -->

</head>

<body>
  <!-- header -->
  <header>
    <!-- navigation -->
    <div class="main-top py-1">
      <nav class="navbar navbar-expand-lg navbar-light fixed-navi">
        <div class="container">
          <!-- logo -->
          <h1>
            <a class="navbar-brand font-weight-bold" href="index.php">
              <img src="images/logo2.png" alt="" class="img-fluid"> Film Me
            </a>
          </h1>
          <!-- //logo -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
            <ul class="navbar-nav ml-lg-auto">
              <li class="nav-item active mx-lg-4 my-lg-0 my-3">
                 <a class="nav-link" href="index.php">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item mx-lg-4 my-lg-0 my-3">
                <a class="nav-link scroll" href="#about">About Us</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                  Sign-Up
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="filmme/cusreg.php">Customer</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="filmme/pvreg.php">Photographer/Videographer</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
    <!-- //navigation -->
  </header>
  <!-- //header -->

  <!-- banner -->
  <div class="pogoSlider" id="js-main-slider">
    <div class="pogoSlider-slide" data-transition="verticalSlide" data-duration="2000" style="background-image:url(images/bg2.jpg);">
      <div class="pogoSlider-slide-element">
        <div class="container">
          <h3 class="text-white">Creating quality photos with professional touch</h3>
          <p class="mt-3">Are you planning a special event?
            <span>We will make it a part of the history.</span>
          </p>
          <a href="filmme/login.php" class="button mt-md-5 mt-4">Sign-In</a>
        </div>
      </div>
    </div>
    <div class="pogoSlider-slide" data-transition="zipReveal" data-duration="2000" style="background-image:url(images/2.jpg);">
      <div class="pogoSlider-slide-element">
        <div class="container">
          <h3 class="text-white">Creating quality photos with professional touch</h3>
          <p class="mt-3">Are you planning a special event?
            <span>We will make it a part of the history.</span>
          </p>
          <a href="filmme/login.php" class="button mt-md-5 mt-4">Sign-In</a>
        </div>
      </div>
    </div>
    <div class="pogoSlider-slide " data-transition="Bars Reveal Down" data-duration="2000" style="background-image:url(images/4.jpg);">
      <div class="pogoSlider-slide-element">
        <div class="container">
          <h3 class="text-white">Creating quality photos with professional touch</h3>
          <p class="mt-3">Are you planning a special event?
            <span>We will make it a part of the history.</span>
          </p>
          <a href="filmme/login.php" class="button mt-md-5 mt-4">Sign-In</a>
        </div>
      </div>
    </div>
    <div class="pogoSlider-slide " data-transition="shrinkReveal" data-duration="2000" style="background-image:url(images/3.jpg);">
      <div class="pogoSlider-slide-element">
        <div class="container">
          <h3 class="text-white">Creating quality photos with professional touch</h3>
          <p class="mt-3">Are you planning a special event?
            <span>We will make it a part of the history.</span>
          </p>
          <a href="filmme/login.php" class="button mt-md-5 mt-4">Sign-In</a>
        </div>
      </div>
    </div>
  </div>
  <!-- //banner -->


  <!-- about -->
  <section class="banner-bottom-w3layouts py-5" id="about">
    <div class="container py-xl-5 py-lg-3">
      <div class="row mt-lg-5">
        <div class="col-lg-5 about-img text-center">
          <img src="images/ab1.png" alt="" class="img-fluid">
        </div>
        <div class="col-lg-7 about-w3ls-mk">
          <!-- heading title -->
          <div class="main-title mb-md-5 mb-4">
            <h3 class="tittle text-uppercase font-weight-bold">About Us</h3>
            <div class="title-icon title-icon2"
>              <i class="fas fa-camera"></i>
            </div>
           <!--  <p class="sub-tittle">Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation</p> -->
          </div>
          <!-- //heading title -->
          <h3 class="aboutright">Film Me</h3>
          <h4 class="aboutright">Where moments are captured!</h4>
          <p>Is a system that searches for Videographers / Photographer around Bohol, that are fit to perform for occasions like birthdays, weddings, and funerals to name a few.</p>
          <a href="filmme/login.php" class="button mt-md-5 mt-4">Sign-In</a>
          <a href="filmme/pvreg.php" class="button mt-md-5 mt-4">Sign-Up as Photographer</a>
        </div>
      </div>
    </div>
  </section>
  <!-- //about -->

  <!-- middle Img -->
  <div class="photo-style-img">

  </div>
  <!-- middle Img -->

  <!-- contact -->
  <section class="contact py-5" id="contact">
    <div class="container py-xl-5 py-lg-3">
      <!-- heading title -->
      <div class="main-title text-center mb-5">
       
        <div class="title-icon">
          <i class="fas fa-camera"></i>
        </div>
     <!--    <p class="sub-tittle">Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation</p> -->
 
  <!-- footer -->
  <footer>
    <div class="w3ls-footer-grids py-sm-4 py-3">
      <div class="container py-xl-5 py-lg-3">
        <div class="row">
          <div class="col-md-4 w3l-footer pr-4">
            <!-- logo -->
            <h2>
              <a class="navbar-brand font-weight-bold logo2" href="index.php">
                <img src="images/logo2.png" alt="" class="img-fluid"> Film Me
              </a>
            </h2>
            <!-- //logo -->
            <p class="mt-3">Where moments are captured!</p>
          </div>
          <div class="col-md-2 w3l-footer my-md-0 my-4">
            <h5 class="text-dark footer-links mb-4">Menu</h5>
            <ul class="list-unstyled">
              <li>
                <a href="index.php" class="">Home</a>
              </li>
              <li class="mt-2">
              </li>
            </ul>
          </div>
         
          <div class="col-md-3 w3l-footer footer-social-agile">
            <h5 class="text-dark footer-links mb-4">Connect with us</h5>
            <ul class="list-unstyled">
              <li>
                <a href="https://www.facebook.com/Film-Me-123766616558858">
                  <i class="fab fa-facebook-f"></i>
                </a>
              </li>
              
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- //footer -->

  <!-- copyright -->
  <div class="copy-right-w3ls py-3 border-top">
    <div class="container">
      <p class="copy-right-grids text-dark">© 2021 Film Me. All Rights Reserved
      </p>
    </div>
  </div>
  <!-- //copyright -->


  <!-- Js files -->
  <!-- JavaScript -->
  <script src="js/jquery-2.2.3.min.js"></script>
  <!-- Default-JavaScript-File -->
  <script src="js/bootstrap.js"></script>
  <!-- Necessary-JavaScript-File-For-Bootstrap -->

  <!-- carousel -->
  <script src="js/owl.carousel.js"></script>
  <script>
    $(document).ready(function () {
      $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        responsiveClass: true,
        responsive: {
          0: {
            items: 1,
            nav: true
          },
          600: {
            items: 1,
            nav: false
          },
          900: {
            items: 1,
            nav: false
          },
          1000: {
            items: 3,
            nav: true,
            loop: false,
            margin: 20
          }
        }
      })
    })
  </script>
  <!-- //carousel -->

  <!-- fixed navigation -->
  <script src="js/fixed-nav.js"></script>
  <!-- //fixed navigation -->

  <!-- stats -->
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.countup.js"></script>
  <script>
    $('.counter').countUp();
  </script>
  <!-- //stats -->

  <!-- Pogo slider (for banner) -->
  <script src="js/jquery.pogo-slider.min.js"></script>
  <script src="js/main.js"></script>
  <!-- Pogo slider (for banner) -->

  <!-- smooth scrolling -->
  <script src="js/SmoothScroll.min.js"></script>
  <!-- //smooth scrolling -->

  <!-- start-smoth-scrolling -->
  <script src="js/move-top.js"></script>
  <script src="js/easing.js"></script>
  <script>
    jQuery(document).ready(function ($) {
      $(".scroll").click(function (event) {
        event.preventDefault();
        $('html,body').animate({
          scrollTop: $(this.hash).offset().top
        }, 1000);
      });
    });
  </script>
  <!-- start-smoth-scrolling -->

  <!-- smooth scrolling-bottom-to-top -->
  <script>
    $(document).ready(function () {
      /*
        var defaults = {
        containerID: 'toTop', // fading element id
        containerHoverID: 'toTopHover', // fading element hover id
        scrollSpeed: 1200,
        easingType: 'linear' 
        };
      */
      $().UItoTop({
        easingType: 'easeOutQuart'
      });
    });
  </script>
  <!-- //smooth scrolling-bottom-to-top -->

  <!-- Gallery filter -->
  <script src="js/jquery-1.7.2.js"></script>
  <script src="js/jquery.quicksand.js"></script>
  <script src="js/pretty-script.js"></script>
  <script src="js/jquery.prettyPhoto.js"></script>
  <!-- //jQuery-Photo-filter-lightbox-Gallery-plugin -->
  <!-- //Js files -->

</body>

</html>

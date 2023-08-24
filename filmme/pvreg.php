<?php  
  include('../functions/functions.php');

?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="apple-touch-icon" sizes="76x76" href="../images/logo2.png">
    <link rel="icon" type="image/png" href="../images/logo2.png">

    <!-- Title Page-->
    <title>Film Me - Sign Up</title>
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/css/eye.css">


        <style>
      .error{
        color: red;
        font-style: italic;
    
    </style>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->






<!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                      <h4><img src="../images/logo2.png" width="30"> <b> Film Me </b> </h4>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                         <ul class="notification-area pull-right">
                           <a href="login.php"><b>Sign-In</b></a>
                        </ul>
                        <ul class="notification-area pull-right">
                           <a href="../index.php" style="margin-right: 20px;"><b>Home</b></a>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- header area end -->


    <!-- login area start -->
    <div class="login-area login-s2">
        <div class="container">
            <div class="login-box"> 
                <form id="register" action="pvreg.php" method="post" enctype="multipart/form-data">
                    <div class="login-form-head">
                        <h4>Sign up</h4>
                        <p>Hello there Photographer/Videographer, Sign up and choose an event now!</p>
                    </div>
                    <div class="login-form-body" >

                        <div class="form-group" style="width: 700px; position: absolute; top: 150px; right: 310px;">
                            <div class="form-row">
                              <div class="col-md-6 validate">
                                <div class="form-label-group">
                                  <label for="firstName">First Name</label>
                                  <input type="text" id="firstName" class="form-control" autofocus="autofocus" placeholder="Enter First Name" name="fname"> 
                                </div>
                              </div>
                              <div class="col-md-6 validate">
                                <div class="form-label-group">
                                  <label for="middleName">Middle Name</label>
                                  <input type="text" id="middleName" class="form-control" placeholder="Enter Middle Name" name="mname">
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="form-group" style="width: 700px; position: absolute; top: 250px; right: 310px;">
                            <div class="form-row">
                              <div class="col-md-6 validate">
                                <div class="form-label-group">
                                  <label for="lastName">Last Name</label>
                                  <input type="text" id="lastName" class="form-control" placeholder="Enter Last Name" name="lname"> 
                                </div>
                              </div>
                              <div class="col-md-6 validate">
                                <label for="age">Age</label>
                                <select class="form-control" name="age" id="age" style="cursor: pointer;">
                                  <option value="" disabled selected>Select Age</option>
                                  <?php
                                    for($x=18; $x <= 100; $x++)
                                    {
                                      ?>
                                      <option><?php echo $x; ?></option>
                                      <?php
                                    }
                                  ?>
                                </select>
                            </div>
                            </div>
                          </div>


                            <div class="form-group"  style="width: 700px; position: absolute; top: 350px; right: 310px;">
                            <div class="form-row">
                              <div class="col-md-6 validate">
                                <div class="form-label-group">
                                  <label for="birthday2">Enter Birthday</label>
                                  <input type="date" id="birthday2" class="form-control" placeholder="Birthday" name="birthday"> 
                                </div>
                              </div>
                              <div class="col-md-6 validate">
                                <label for="input-type">Select Gender:</label>
                                  <div id="input-type" class="row">
                                    <div class="col-sm-6">
                                      <label class="radio-inline" style="margin-left: 80px;">
                                        <input type="radio" name="gender" value="Male"> Male
                                      </label>
                                    </div>
                                    <div class="col-sm-6">
                                      <label class="radio-inline">
                                        <input type="radio" name="gender" value="Female"> Female
                                      </label>
                                    </div>
                                  </div>
                              </div>
                            </div>
                          </div>

                           <div class="form-group" style="width: 700px; position: absolute; top: 450px; right: 310px;">
                              <div class="form-row">
                                <div class="col-md-6 validate">
                                  <div class="form-label-group">
                                     <label for="emailAddress2">Email Address</label>
                                    <input type="email" id="emailAddress2" class="form-control" placeholder="Enter Email Address" autofocus="autofocus" name="email_address"> 
                                  </div>
                                </div>
                                <div class="col-md-6 validate">
                                  <div class="form-label-group">
                                     <label for="contactNumber2">Contact Number</label>
                                    <input type="text" id="contactNumber2" class="form-control" placeholder="Enter Contact Number" name="contact_number">
                                  </div>
                                </div>
                              </div>
                            </div>

                              <div class="form-group validate" style="width: 700px; position: absolute; top: 550px; right: 310px;">
                              <div class="form-label-group">
                                <label for="inputAddress">Residential address</label>
                                <input type="text" id="inputAddress" class="form-control" placeholder="Enter Residential Address" name="residential_address">
                              </div>
                            </div>

                              <div class="form-group" style="width: 700px; position: absolute; top: 650px; right: 310px;">
                              <div class="form-row">
                                <div class="col-md-6 validate">
                                <div class="form-label-group">
                                 <label for="passWord">Password</label>
                                 <input type="password" id="passWord" class="form-control" placeholder="Enter Password" name="password">
                                  <div class="input-group-append">
                                      <span><i class="ti-eye eye1" id="eye" onclick="toggle1()"></i></span>
                                  </div>
                                </div>
                               </div>
                                <div class="col-md-6 validate">
                                  <div class="form-label-group">
                                     <label for="username">Username</label>
                                    <input type="text" id="username" class="form-control" placeholder="Enter Username" autofocus="autofocus" name="username"> 
                                  </div>
                                </div>
                              </div>
                            </div>

                             <div class="form-group" style="width: 700px; position: absolute; top: 750px; right: 310px;">
                              <div class="form-row">
                                <div class="col-md-6 validate">
                                   <div class="form-label-group">
                                     <label for="confirm_password">Confirm Password</label>
                                    <input type="password" id="confirm_password" class="form-control" placeholder="Confirm Password" name="confirm_password">
                                  <div class="input-group-append">
                                     <span><i class="ti-eye eye2" id="eye2" onclick="toggle2()"></i></span>
                                  </div>
                                  </div>
                                </div>
                                <div class="col-md-6 validate">
                                  <div class="form-label-group text-center">
                                    <img style="margin-top: 40px; border-radius: 50px; cursor: pointer;" width="150" src="../images/profile.png" onclick="triggerClick()" id="profileDisplay" />
                                    <input type="file" name="photo" onchange="displayImage(this)" id="profileImage" style="display: none;">
                                  </div>
                                   <label id="profileLabel" for="profileImage" style="cursor: pointer; margin-left: 130px;">Profile Picture</label>
                                </div>
                              </div>
                            </div>

                            <div class="form-group" style="width: 700px; position: absolute; top: 850px; right: 400px;">
                              <span style="position: absolute; top: 130px; left: 240px">Please Add Three Sample Pictures (Watermark Required)</span>
                              <div class="form-row">
                                <div class="col-md-6 validate" style="position: absolute; top: 150px;">
                                    <div class="form-label-group text-center">
                                    <img style="margin-top: 40px; border-radius: 50px; cursor: pointer;" width="150" src="../images/t1.jpg" onclick="sample1trigger1()" id="profileDisplay1" />
                                    <input type="file" name="sample1" onchange="sample_1(this)" id="profileImage1" style="display: none;">
                                  </div>
                                   <label id="profileLabel1" for="profileImage1" style="cursor: pointer; margin-left: 140px;">Sample 1</label>
                                </div>
                                </div>
                                <div class="col-md-6 validate" style="position: absolute; top: 150px; left: 250px;">
                                  <div class="form-label-group text-center">
                                    <img style="margin-top: 40px; border-radius: 50px; cursor: pointer;" width="150" src="../images/t1.jpg" onclick="sample2trigger2()" id="profileDisplay2" />
                                    <input type="file" name="sample2" onchange="sample_2(this)" id="profileImage2" style="display: none;">
                                  </div>
                                   <label id="profileLabel2" for="profileImage2" style="cursor: pointer; margin-left: 130px;">Sample 2</label>
                                </div>
                              </div>
                            </div>


                             <div class="form-group" style="width: 700px; position: absolute; top: 850px; right: 310px;">
                              <div class="form-row">
                                <div class="col-md-6 validate">
                                </div>
                                <div class="col-md-6 validate"  style="position: absolute; top: 150px; left: 400px;">
                                  <div class="form-label-group text-center">
                                    <img style="margin-top: 40px; border-radius: 50px; cursor: pointer;" width="150" src="../images/t1.jpg" onclick="sample3trigger3()" id="profileDisplay3" />
                                    <input type="file" name="sample3" onchange="sample_3(this)" id="profileImage3" style="display: none;">
                                  </div>
                                   <label id="profileLabel3" for="profileImage3" style="cursor: pointer; margin-left: 130px;">Sample 3</label>
                                </div>
                              </div>
                            </div>


                   <br><br><br><br>   <br><br><br><br>   <br><br><br><br> <br><br><br><br> <br><br><br><br>
                        <div class="submit-btn-area" style="margin-top: 550px;">
                            <button id="form_submit" type="submit" name="registerBtn2">Register <i class="ti-arrow-right"></i></button>
                        </div>
                        <div class="form-footer text-center mt-5">
                            <p class="text-muted">Want to post an event?<a href="cusreg.php"><br>Register Here</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- login area end -->

            <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>© 2021 Film Me. All right reserved</p>
            </div>
        </footer>
        <!-- footer area end-->

    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>
    
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>


        <!-- validators -->
    <script src="../js/jquery.validator.js"></script>
    <script src="../js/additional-methods.min.js"></script>
    <!-- !validators -->

     <script src="../js/register2.js"></script>



   <script>   
      function triggerClick(){
      document.querySelector('#profileImage').click();

    }

    function displayImage(e) {
      if (e.files[0]){
        var reader = new FileReader();

        reader.onload = function(e) {
          document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
      }
    }
     </script>


   <script>   
      function sample1trigger1(){
      document.querySelector('#profileImage1').click();

    }

    function sample_1(e) {
      if (e.files[0]){
        var reader = new FileReader();

        reader.onload = function(e) {
          document.querySelector('#profileDisplay1').setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
      }
    }
     </script>

    <script>   
      function sample2trigger2(){
      document.querySelector('#profileImage2').click();

    }

    function sample_2(e) {
      if (e.files[0]){
        var reader = new FileReader();

        reader.onload = function(e) {
          document.querySelector('#profileDisplay2').setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
      }
    }
     </script>

    <script>   
      function sample3trigger3(){
      document.querySelector('#profileImage3').click();

    }

    function sample_3(e) {
      if (e.files[0]){
        var reader = new FileReader();

        reader.onload = function(e) {
          document.querySelector('#profileDisplay3').setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
      }
    }
     </script>


  <script>
    var state=false;
    function toggle1(){
      if (state) {
        document.getElementById("passWord").setAttribute("type","password");
        document.getElementById("eye").style.color='#3498db';
        state = false;
      }else{
        document.getElementById("passWord").setAttribute("type","text");
        document.getElementById("eye").style.color='#2ecc71';
        state = true;
      }
    }
  </script>

    <script>
    var state=false;
    function toggleModal1(){
      if (state) {
        document.getElementById("passWord2").setAttribute("type","password");
        document.getElementById("regEye").style.color='#3498db';
        state = false;
      }else{
        document.getElementById("passWord2").setAttribute("type","text");
        document.getElementById("regEye").style.color='#2ecc71';
        state = true;
      }
    }
  </script>

  <script>
    var state2=false;
    function toggle2(){
      if (state2) {
        document.getElementById("confirm_password").setAttribute("type","password");
        document.getElementById("eye2").style.color='#3498db';
        state2 = false;
      }else{
        document.getElementById("confirm_password").setAttribute("type","text");
        document.getElementById("eye2").style.color='#2ecc71';
        state2 = true;
      }
    }
  </script>

    <script>
    var state2=false;
    function toggleModal2(){
      if (state2) {
        document.getElementById("confirm_password2").setAttribute("type","password");
        document.getElementById("regEye2").style.color='#3498db';
        state2 = false;
      }else{
        document.getElementById("confirm_password2").setAttribute("type","text");
        document.getElementById("regEye2").style.color='#2ecc71';
        state2 = true;
      }
    }
  </script>




</body>

</html>
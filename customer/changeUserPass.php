<?php 
  include('../functions/functions.php');

    if (!isLoggedIn()) {
      header('location: ../index.php');
    }
    
     if (!isCustomer()) {
      $_SESSION['msg'] = "You must log in first";
      header('location: ../index.php');
    }
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="apple-touch-icon" sizes="76x76" href="../images/logo2.png">
    <link rel="icon" type="image/png" href="../images/logo2.png">

    <!-- Title Page-->
    <title>Film Me | Change Username & Password</title>

    <link rel="shortcut icon" type="image/png" href="../filmme/assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="../filmme/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../filmme/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../filmme/assets/css/themify-icons.css">
    <link rel="stylesheet" href="../filmme/assets/css/metisMenu.css">
    <link rel="stylesheet" href="../filmme/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../filmme/assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="../filmme/assets/css/typography.css">
    <link rel="stylesheet" href="../filmme/assets/css/default-css.css">
    <link rel="stylesheet" href="../filmme/assets/css/styles.css">
    <link rel="stylesheet" href="../filmme/assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="../filmme/assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <style>
      .error{
        color: red;
        font-style: italic;
      }
      .eye1{
        color: #3498db;
        position: absolute;
        top: 45px;
        right: 10px;
        cursor: pointer;
      }
      .eye2{
        color: #3498db;
        position: absolute;
        top: 45px;
        right: 10px;
        cursor: pointer;
      }
      .eye1:hover{
        color: #2ecc71;
      }
      .eye2:hover{
        color: #2ecc71;
      }
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
                           <a href="userHome.php" style="margin-right: 20px;"><b>Dashboard</b></a>
                        </ul>
                    </div>
                </div>
            </div>
<!-- header area end -->


    <!-- login area start -->
    <div class="login-area">
        <div class="container">
            <div class="login-box">
              <form id="userpass" method="post" action="changeUserPass.php" enctype="multipart/form-data">
                    <div class="login-form-head">
                        <h4>Change Username & Password</h4>
                    </div>
                    <div class="login-form-body">

      <?php
        $query=mysqli_query($db,"SELECT * FROM users WHERE user_id='".$_SESSION['user']['user_id']."'")or die(mysqli_error());
          while($row=mysqli_fetch_array($query)){
      ?>


            <div class="form-group validate" hidden>
              <div class="form-label-group">
                <label for="user_id">User ID</label>
                <input type="text" id="user_id" class="form-control" value="<?php echo $row['user_id']?>" name="user_id">
              </div>
            </div>

            <div class="form-group validate">
              <div class="form-label-group">
                <label for="inputAddress">Username</label>
                <input type="text" id="inputAddress" class="form-control" value="<?php echo $row['username']?>" name="username">
              </div>
            </div>

            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6 validate">
                <div class="form-label-group">
                 <label for="passWord2">Enter New Password</label>
                 <input type="password" id="passWord2" class="form-control" placeholder="Password" name="password">
                  <div class="input-group-append">
                      <span><i class="ti-eye eye1" id="regEye" onclick="toggleModal1()"></i></span>
                  </div>
                </div>
               </div>
                <div class="col-md-6 validate">
                  <div class="form-label-group">
                    <label for="confirm_password">Confirm New Password</label>
                    <input type="password" id="confirm_password2" class="form-control" placeholder="Confirm Password" name="confirm_password">
                  <div class="input-group-append">
                     <span><i class="ti-eye eye2" id="regEye2" onclick="toggleModal2()"></i></span>
                  </div>
                  </div>
                </div>
              </div>
            </div>


      <?php }?>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit" name="updateUserPass">Update <i class="ti-arrow-right"></i></button>
                            <br><br>
                            <a href="userHome.php" class="btn btn-block btn-secondary">Cancel</a>
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
    <script src="../filmme/assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="../filmme/assets/js/popper.min.js"></script>
    <script src="../filmme/assets/js/bootstrap.min.js"></script>
    <script src="../filmme/assets/js/owl.carousel.min.js"></script>
    <script src="../filmme/assets/js/metisMenu.min.js"></script>
    <script src="../filmme/assets/js/jquery.slimscroll.min.js"></script>
    <script src="../filmme/assets/js/jquery.slicknav.min.js"></script>
    
    <!-- others plugins -->
    <script src="../filmme/assets/js/plugins.js"></script>
    <script src="../filmme/assets/js/scripts.js"></script>

            <!-- validators -->
    <script src="../js/jquery.validator.js"></script>
    <script src="../js/additional-methods.min.js"></script>
    <!-- !validators -->

     <script src="../js/userpass.js"></script>


        <script>   
      function triggerClick2(){
      document.querySelector('#profileImage2').click();

    }

    function displayImage2(e) {
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
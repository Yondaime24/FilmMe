<?php 
  include('../functions/functions.php');

  $user_id = $_GET['user_id'];

    if (!isLoggedIn()) {
      header('location: ../index.php');
    }

    if (!isAdmin()) {
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
    <title>Film Me | New Photographer</title>

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
                           <a href="adminPanel.php" style="margin-right: 20px;"><b>Dashboard</b></a>
                        </ul>
                    </div>
                </div>
            </div>
<!-- header area end -->


    <!-- login area start -->
    <div class="login-area">
        <div class="container">
            <div class="login-box">
               
    <form id="messageForm" action="newphotographer.php" method="post">
                    <div class="login-form-head">
                        <h4>New Photographer Registration</h4>
                    </div>
                    <div class="login-form-body">
       
      <?php
          $query=mysqli_query($db,"SELECT * FROM users WHERE user_id='".$user_id."'")or die(mysqli_error());
                  while($row=mysqli_fetch_array($query)){
      ?>

            <center>
                <?php if($row['photo'] != ""): ?>
                    <img src="../images/<?php echo $row['photo']; ?>" width="200"/>
                <?php else: ?>
                    <img src="../images/profile.png" width="200"/>
                <?php endif; ?>
            </center>

            <div class="form-group">
                <label for="locId" class="control-label mb-1">Name:</label>
                <input id="locId" type="text" name="photographer_name" class="form-control" value="<?php echo $row['fname']; ?> <?php echo $row['mname']; ?> <?php echo $row['lname']; ?>" readonly>
            </div>

            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6 validate">
                  <div class="form-label-group">
                    <label for="firstName">Age:</label>
                    <input type="text" id="firstName" class="form-control" value="<?php echo $row['age']; ?>" name="fname" readonly> 
                  </div>
                </div>
                <div class="col-md-6 validate">
                  <div class="form-label-group">
                    <label for="middleName">Birthday:</label>
                    <input type="text" id="middleName" class="form-control" value="<?php echo date('F j, Y',strtotime($row['birthday'])); ?>" name="mname" readonly>
                  </div>
                </div>
              </div>
            </div>

             <div class="form-group">
              <div class="form-row">
                <div class="col-md-6 validate">
                  <div class="form-label-group">
                    <label for="firstName">Gender:</label>
                    <input type="text" id="firstName" class="form-control" value="<?php echo $row['gender']; ?>" name="fname" readonly> 
                  </div>
                </div>
                <div class="col-md-6 validate">
                  <div class="form-label-group">
                    <label for="middleName">Contact Number:</label>
                    <input type="text" id="middleName" class="form-control" value="<?php echo $row['contact_number']; ?>" name="mname" readonly>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
                <label for="locId" class="control-label mb-1">Email Address:</label>
                <input id="locId" type="text" name="photographer_name" class="form-control" value="<?php echo $row['email_address']; ?>" readonly>
            </div>

            <div class="form-group">
                <label for="locId" class="control-label mb-1">Residential Address:</label>
                <input id="locId" type="text" name="photographer_name" class="form-control" value="<?php echo $row['residential_address']; ?>" readonly>
            </div>

             <div class="recei-mess-list" style="margin-bottom: 10px;">
              <h5>Sample Photos:</h5>
                  <center>
                <?php if($row['sample1'] != ""): ?>
                    <img src="../images/<?php echo $row['sample1']; ?>" width="200"/>
                <?php else: ?>
                    <img src="../images/profile.png" width="200"/>
                <?php endif; ?>
                <br>
                <span>Sample 1</span>
                <br>
                <?php if($row['sample2'] != ""): ?>
                    <img src="../images/<?php echo $row['sample2']; ?>" width="200"/>
                <?php else: ?>
                    <img src="../images/profile.png" width="200"/>
                <?php endif; ?>
                <br>
                <span>Sample 2</span>
                <br>
                <?php if($row['sample3'] != ""): ?>
                    <img src="../images/<?php echo $row['sample3']; ?>" width="200"/>
                <?php else: ?>
                    <img src="../images/profile.png" width="200"/>
                <?php endif; ?>
                <br>
                <span>Sample 3</span>
                <br>
           		 </center>
              </div>

                <?php if ($row['user_type']=='pending') { ?>

                  <div>
                   <a class="btn btn-success btn-block" onclick="return confirm('Are you sure that you want to add this person as a photographer?')" href="acceptphotographer.php?user_id=<?php echo $row['user_id'] ?>">Accept photographer</a>
                  </div>

                <?php  }else if ($row['user_type']=='photographer') { ?>

                   <center> <h4 style="color: #2ecc71">Already a photographer!</h4> </center>

                <?php } ?>

          <?php }?>

              <div style="margin-top: 10px;">
                <a class="btn btn-block btn-secondary" href="adminPanel.php">Cancel</a>
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

     <script src="../js/message.js"></script>


</body>

</html>
<?php 
    include('../functions/functions.php');

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
    <title>Film Me | Gcash Account</title>

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

            <!-- page title area end -->
            <div class="main-content-inner">
                <!-- color pricing start -->
                <div class="row" style="margin-left: 300px;">
                    <div class="col-xl-3 col-ml-8 col-mdl-4 col-sm-6 mt-5">
                        <div class="card">
                            <div class="pricing-list">
                                <div class="prc-head">
                                    <h4>My GCash Account</h4>
                                </div>
                                <div class="prc-list">
                                    <ul>
    <?php
        $query=mysqli_query($db,"SELECT * FROM `gcash`")or die(mysqli_error());
          while($row=mysqli_fetch_array($query)){
   ?>
							        <form id="gcashform" action="gcash.php" method="post">

							       	<div class="form-group validate" hidden="hidden">
							            <label for="gcash_id" class="control-label mb-1">GCash Id</label>
							            <input id="gcash_id" type="text" name="gcash_id" class="form-control" value="<?php echo $row['gcash_id']; ?>">
							        </div>

							        <div class="form-group validate">
							            <label for="gcash_account" class="control-label mb-1">GCash Account</label>
							            <input id="gcash_account" type="text" name="gcash_account" class="form-control" value="<?php echo $row['gcash_account']; ?>">
							        </div>
							        <br>

							        </ul>
							        <br>
                         <div class="submit-btn-area">
                            <button id="form_submit" type="submit" name="updateGcash">Update <i class="ti-arrow-right"></i></button>
                        </div>
                                    </form>
    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- color pricing end -->
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

     <script src="../js/gcash.js"></script>


</body>

</html>

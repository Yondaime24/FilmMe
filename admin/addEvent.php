<?php 
  include('../functions/functions.php');

if (!isLoggedIn()) {
    header('location: ../index.php');
}

if (!isAdmin()) {
      $_SESSION['msg'] = "You must log in first";
      header('location: ../index.php');
    }

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['user']);
    header("location: ../index.php");
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
    <title>Film Me | Add Photographer</title>

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
                        <ul class="notification-area pull-right">
                           <a href="customer.php" style="margin-right: 20px;"><b>Customers</b></a>
                        </ul>
                    </div>
                </div>
            </div>
<!-- header area end -->


    <!-- login area start -->
    <div class="login-area">
        <div class="container">
            <div class="login-box">
                 <form id="event" action="addEvent.php" method="post">
                    <div class="login-form-head">
                        <h4>Add Event</h4>
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

             <div class="form-group validate" hidden>
              <div class="form-label-group">
                <label for="user_id">User ID</label>
                <input type="text" id="user_id" class="form-control" value="<?php echo $row['user_id']?>" name="user_id">
              </div>
            </div>

            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6 validate">
                  <div class="form-label-group">
                    <label for="firstName">Customer Name</label>
                    <input type="text" id="firstName" class="form-control" value="<?php echo $row['fname']?> <?php echo $row['mname']?> <?php echo $row['lname']?>" name="customer_name" readonly> 
                  </div>
                </div>
                <div class="col-md-6 validate">
                  <div class="form-label-group">
                    <label for="contactNumber">Contact Number</label>
                    <input type="text" id="contactNumber" class="form-control" value="<?php echo $row['contact_number']?>" name="contact_number" readonly>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group validate">
              <div class="form-label-group">
                <label for="inputAddress">Residential address</label>
                <input type="text" id="inputAddress" class="form-control" value="<?php echo $row['residential_address']?>" name="residential_address" readonly>
              </div>
            </div>

             <div class="form-group">
              <div class="form-row">
                <div class="col-md-6 validate">
                  <div class="form-label-group">
                    <label for="emailAddress">Email Address</label>
                    <input type="email" id="emailAddress" class="form-control" value="<?php echo $row['email_address']?>" name="email_address" readonly> 
                  </div>
                </div>
              </div>
            </div>

          <?php }?>


            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6 validate">
                  <div class="form-label-group">
                    <label for="eventName">Event Name</label>
                    <input type="text" id="eventName" class="form-control" name="event_name" placeholder="Enter Event Name"> 
                  </div>
                </div>
                <div class="col-md-6 validate">
                  <div class="form-label-group">
                    <label for="dateEvent">Select Date of Event</label>
                    <input type="date" id="dateEvent" class="form-control" name="event_date">
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6 validate">
                  <div class="form-label-group">
                    <label for="eventLoc">Event Location</label>
                    <input type="text" id="eventLoc" class="form-control" name="event_loc" placeholder="Enter Event Location"> 
                  </div>
                </div>
                <div class="col-md-6 validate">
                  <div class="form-label-group">
                   <label for="sadas">Event Price</label>
                    <input type="text" id="sadas" class="form-control" name="event_price" placeholder="Enter Event Price"> 
                  </div>
                </div>
              </div>
            </div>

               <div class="submit-btn-area">
                            <button id="form_submit" type="submit" name="addEventBtn2">Add <i class="ti-arrow-right"></i></button>
                        </div>
              <div style="margin-top: 10px;">
                <a class="btn btn-block btn-secondary" href="adminPanel.php">Cancel</a>
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

     <script src="../js/event2.js"></script>


</body>

</html>
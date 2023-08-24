<?php 
  include('../functions/functions.php');

 $booking_id = $_GET['booking_id'];
 $customer_id = $_GET['customer_id'];
 $event_id = $_GET['event_id'];

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
    <title>Film Me | View Booking</title>

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
                           <a href="bookings.php" style="margin-right: 20px;"><b>Bookings</b></a>
                        </ul>
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
          <form id="event" action="editEvent.php" method="post">
                    <div class="login-form-head">
                        <h4>View Bookings</h4>
                    </div>
                    <div class="login-form-body">


      <?php
        $query=mysqli_query($db,"SELECT * FROM users WHERE user_id='".$_SESSION['user']['user_id']."'")or die(mysqli_error());
          while($row=mysqli_fetch_array($query)){
      ?>

   <center>
              <span><b>Your Details</b></span>
            </center>

            <div class="form-group" hidden="hidden">
                <label for="userID" class="control-label mb-1">Event Id</label>
                <input id="userID" name="event_id" type="text" class="form-control" value="<?php echo $event_id; ?>" readonly>
            </div>

            <div class="form-group">
              <label for="userID" class="control-label mb-1">Full Name</label>
              <input id="userID" name="reserved_by" type="text" class="form-control" value="<?php echo $_SESSION['user']['fname']; ?> <?php echo $_SESSION['user']['mname']; ?> <?php echo $_SESSION['user']['lname']; ?>" readonly>
            </div>

            <div class="form-group">
                <label for="residentialAddress" class="control-label mb-1">Residential Address</label>
                <input id="residentialAddress" name="residential_address" type="text" class="form-control" value="<?php echo $_SESSION['user']['residential_address']; ?>" readonly>
            </div>

            <div class="form-group">
                <label for="contactNumber" class="control-label mb-1">Contact Number</label>
                 <input name="contact_number" id="contactNumber" type="text" class="form-control" value="<?php echo $_SESSION['user']['contact_number']; ?>" readonly="readonly">
            </div>

             <div class="form-group">
                <label for="inputNumber" class="control-label mb-1">Email Address</label>
                <input name="email_address" id="inputNumber" type="text" class="form-control" value="<?php echo $_SESSION['user']['email_address']; ?>" readonly="readonly">
            </div>

            <center>
              <a href="editProfile.php" class="btn btn-success btn-sm">Edit Profile</a>
            </center>
            <br>
           
      <?php }?>


         <center>
              <span><b>Photographer Details</b></span>
            </center>
<br>

            <?php
                $query=mysqli_query($db,"SELECT * FROM bookings WHERE booking_id='".$booking_id."'")or die(mysqli_error());
                  while($row=mysqli_fetch_array($query)){
            ?>

            <div class="row" hidden="">
              <div class="col-6 ">
                <div class="form-group validate">
                 <label for="inputNumber" class="control-label mb-1">Event ID</label>
                 <input name="event_id" id="inputNumber" type="text" class="form-control" value="<?php echo $row['event_id'];?>" readonly>
                </div>
              </div>
              <div class="col-6 ">
                <div class="form-group validate">
                 <label for="inputNumber" class="control-label mb-1">Customer ID</label>
                 <input name="customer_id" id="inputNumber" type="text" class="form-control" value="<?php echo $row['user_id'];?>" readonly>
                </div>
              </div>
             </div>

          <div class="form-group">
              <label for="useasdasrID" class="control-label mb-1">Photographer Name</label>
              <input id="useasdasrID" name="photographer_name" type="text" class="form-control" value="<?php echo $row['photographer_name']; ?>" readonly>
            </div>

            <div class="form-group">
                <label for="residentialAddress" class="control-label mb-1">Photographer Address</label>
                <input id="residentialAddress" name="photographer_address" type="text" class="form-control" value="<?php echo $row['photographer_address']; ?>" readonly>
            </div>

            <div class="form-group">
                <label for="contactNumber" class="control-label mb-1">Photographer Contact #</label>
                 <input name="photographer_contact" id="contactNumber" type="text" class="form-control" value="<?php echo $row['photographer_contact']; ?>" readonly="readonly">
            </div>

             <div class="form-group">
                <label for="inputNumber" class="control-label mb-1">Photographer Email</label>
                <input name="photographer_email" id="inputNumber" type="text" class="form-control" value="<?php echo $row['photographer_email']; ?>" readonly="readonly">
            </div>

             <center>
              <span><b>Event Details</b></span>
            </center>

            <div class="row">
              <div class="col-6 ">
                <div class="form-group validate">
                 <label for="inputBlock" class="control-label mb-1">Event Name</label>
                 <input name="event_name" id="inputBlock" type="text" class="form-control" value="<?php echo $row['event_name'];?>" readonly>
                </div>
              </div>
              <div class="col-6 ">
                <div class="form-group validate">
                 <label for="inputNumber" class="control-label mb-1">Event Date</label>
                 <input name="event_date" id="inputNumber" type="text" class="form-control" value="<?php echo date('F j, Y',strtotime($row['event_date']));?>" readonly>
                </div>
              </div>
             </div>

            <div class="form-group validate">
                <label for="inputNumber" class="control-label mb-1">Event Location</label>
                <input name="event_loc" id="inputNumber" type="text" class="form-control" value="<?php echo $row['event_loc'];?>" readonly>
            </div>

             <div class="form-group validate">
                <label for="inputNumber" class="control-label mb-1">Event Price</label>
                <input name="event_loc" id="inputNumber" type="text" class="form-control" value="<?php echo $row['event_price'];?>" readonly>
            </div>

          <?php }?>

            <?php
                $query=mysqli_query($db,"SELECT * FROM bookings WHERE booking_id='".$booking_id."'")or die(mysqli_error());
                while($row=mysqli_fetch_array($query)){
            ?>

          <?php
            $status=$row['status'];                              
              if ($status=="pending"){
          ?>
            <div class="form-group validate">
                <label for="inputNumber" class="control-label mb-1">Added On</label>
                <input name="date_added" id="inputNumber" type="text" class="form-control" value="<?php echo date('F j, Y / g:i a',strtotime($row['date_added']));?>" readonly>
            </div>
            <center>
              <h4 style="color: red">Event Pending!</h4>
            </center>
            <div>
                <button  class="btn btn-block btn-primary" onClick="return confirm('Are you sure you want to accept this event?' )" type="submit" name="acceptEvent">Accept Event</button>
                <a class="btn btn-block btn-success" href="sendmsgtocustomer.php?user_id=<?php echo $row['user_id'];?>&&event_id=<?php echo $row['event_id'];?>">Message Customer</a>
            </div>
          <?php }else if($status=="booked"){ ?> 


            <?php
                $query=mysqli_query($db,"SELECT * FROM bookings WHERE booking_id='".$booking_id."'")or die(mysqli_error());
                while($row=mysqli_fetch_array($query)){
            ?>

            <div class="form-group validate">
                <label for="inputNumber" class="control-label mb-1">Booked On:</label>
                <input name="event_loc" id="inputNumber" type="text" class="form-control" value="<?php echo date('F j, Y / g:i a',strtotime($row['status_date']));?>" readonly>
            </div>

            
            <center>
              <h4 style="color: blue">Event Booked!</h4>
               <a class="btn btn-block btn-success" href="sendmsgtophotographer.php?user_id=<?php echo $row['customer_id'];?>&&event_id=<?php echo $row['event_id'];?>">Message Photographer</a>
            </center>

            <?php }?>

          <?php }else if($status=="finished"){ ?> 
            <?php
                $query=mysqli_query($db,"SELECT * FROM bookings WHERE booking_id='".$booking_id."'")or die(mysqli_error());
                while($row=mysqli_fetch_array($query)){
            ?>

          <div class="form-group validate">
                <label for="inputNumber" class="control-label mb-1">Finished On:</label>
                <input name="event_loc" id="inputNumber" type="text" class="form-control" value="<?php echo date('F j, Y / g:i a',strtotime($row['status_date']));?>" readonly>
            </div>

            
            <center>
              <h4 style="color: #2ecc71">Event Finished!</h4>
               <a class="btn btn-block btn-info" href="bookings.php">View My Bookings</a>
              <a class="btn btn-block btn-primary" href="printInvoice.php?booking_id=<?php echo $row['booking_id'];?>">View Receipt</a>
              <a class="btn btn-block btn-success" href="sendmsgtophotographer.php?user_id=<?php echo $row['customer_id'];?>&&event_id=<?php echo $row['event_id'];?>">Message Photographer</a>
             </center>

             <?php }?>
          <?php
            }else{
          ?>
               <?php
                $query=mysqli_query($db,"SELECT * FROM bookings WHERE customer_id='".$user_id."'")or die(mysqli_error());
                while($row=mysqli_fetch_array($query)){
            ?>

            <div class="form-group validate">
                <label for="inputNumber" class="control-label mb-1">Booked By:</label>
                <input name="event_loc" id="inputNumber" type="text" class="form-control" value="<?php echo $row['photographer_name'];?>" readonly>
            </div>

            <?php }?>
            <center>
              <h4 style="color: red">Event Canceled!</h4>
               <a class="btn btn-block btn-info" href="bookings.php">View My Bookings</a>
            </center>

         <?php }
          ?>
           <?php }?>
            
              <div style="margin-top: 10px;">
                <a class="btn btn-block btn-secondary" href="userHome.php">Cancel</a>
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
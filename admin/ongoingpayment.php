<?php 
  include('../functions/functions.php');

  $event_id = $_GET['event_id'];
  $customer_id = $_GET['customer_id'];
  $photographer_id = $_GET['photographer_id'];

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
    <title>Film Me | Ongoing Payment</title>

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
                        <h4>GCash Payment</h4>
                    </div>
                    <div class="login-form-body">
       
            <center>
              <span><b>Photographer Details</b></span>
            </center>

            <?php
                $query=mysqli_query($db,"SELECT * FROM users WHERE user_id='".$photographer_id."'")or die(mysqli_error());
                  while($row=mysqli_fetch_array($query)){
            ?>

            <div class="form-group" hidden="hidden">
                <label for="userID" class="control-label mb-1">Photographer ID</label>
                <input id="userID" name="photographer_id" type="text" class="form-control" value="<?php echo $row['user_id']; ?>" readonly>
            </div>

            <div class="form-group">
              <label for="useasdasrID" class="control-label mb-1">Photographer Name</label>
              <input id="useasdasrID" name="photographer_name" type="text" class="form-control" value="<?php echo $row['fname']; ?> <?php echo $row['mname']; ?> <?php echo $row['lname']; ?>" readonly>
            </div>

            <div class="form-group">
                <label for="residentialAddress" class="control-label mb-1">Residential Address</label>
                <input id="residentialAddress" name="photographer_address" type="text" class="form-control" value="<?php echo $row['residential_address']; ?>" readonly>
            </div>

            <div class="form-group">
                <label for="contactNumber" class="control-label mb-1">Contact Number</label>
                 <input name="photographer_contact" id="contactNumber" type="text" class="form-control" value="<?php echo $row['contact_number']; ?>" readonly="readonly">
            </div>

             <div class="form-group">
                <label for="inputNumber" class="control-label mb-1">Email Address</label>
                <input name="photographer_email" id="inputNumber" type="text" class="form-control" value="<?php echo $row['email_address']; ?>" readonly="readonly">
            </div>

             <center>
              <a href="msgPhotographer.php?user_id=<?php echo $photographer_id ?>" class="btn btn-outline-success btn-sm">Message Photographer</a>
            </center>

             <center>
              <span><b>Customer Details</b></span>
            </center>
        <?php } ?>
<br>

            <?php
                $query=mysqli_query($db,"SELECT * FROM events WHERE event_id='".$event_id."'")or die(mysqli_error());
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

            <div class="form-group validate">
                <label for="inputNumber" class="control-label mb-1">Customer Name</label>
                <input name="customer_name" id="inputBlock" type="text" class="form-control" value="<?php echo $row['customer_name'];?>" readonly>
            </div>

            <div class="form-group validate">
                <label for="inputNumber" class="control-label mb-1">Customer Address</label>
                <input name="customer_address" id="inputBlock" type="text" class="form-control" value="<?php echo $row['residential_address'];?>" readonly>
            </div>

             <div class="row">
              <div class="col-6 ">
                <div class="form-group validate">
                 <label for="inputBlock" class="control-label mb-1">Contact Number</label>
                 <input name="customer_contact" id="inputBlock" type="text" class="form-control" value="<?php echo $row['contact_number'];?>" readonly>
                </div>
              </div>
              <div class="col-6 ">
                <div class="form-group validate">
                 <label for="inputNumber" class="control-label mb-1">Email Address</label>
                 <input name="customer_email" id="inputNumber" type="text" class="form-control" value="<?php echo $row['email_address'];?>" readonly>
                </div>
              </div>
             </div>

            <center>
              <a href="msgPhotographer.php?user_id=<?php echo $customer_id ?>" class="btn btn-outline-success btn-sm">Message Customer</a>
            </center>

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

            
        <?php } ?>


         <?php
                $query=mysqli_query($db,"SELECT * FROM pricing")or die(mysqli_error());
                  while($row=mysqli_fetch_array($query)){
            ?>

             <div class="form-group validate">
                <label for="inputNumber" class="control-label mb-1">Event Price</label>
                <input name="event_price" id="inputNumber" type="text" class="form-control" value="<?php echo $row['event_price'];?>" readonly>
            </div>

               <div class="form-group validate">
                <label for="tax_price" class="control-label mb-1">Tax Price</label>
                <input name="tax_price" id="tax_price" type="text" class="form-control" value="<?php echo $row['tax_price'];?>" readonly>
            </div>

         <?php } ?>


           <button  class="btn btn-block btn-primary" onClick="return confirm('Are you sure that this photographers payment has been done?' )" type="submit" name="acceptEvent">Payment Done</button>

            <a class="btn btn-block btn-danger" href="cancelPayment.php?event_id=<?php echo $event_id ?>&&customer_id=<?php echo $customer_id  ?>&&photographer_id=<?php echo $photographer_id ?>" onClick="return confirm('Are you sure you want to cancel this payment?' )">Cancel Payment</a>

             <a class="btn btn-block btn-secondary" href="adminPanel.php">Return</a>

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
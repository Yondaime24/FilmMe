<?php 
  include('../functions/functions.php');

  $booking_id = $_GET['booking_id'];

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
    <title>Film Me | Print Receipt</title>

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


        <style>
        @media print {
        body * {
          visibility: hidden;
        }
        .print-container, .print-container * {
          visibility: visible;
        }
      }
      </style>
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


  <!-- page title area end -->
     <section class="contact print-container" id="contact">
            <div class="main-content-inner">
                <div class="row">
                    <div class="col-lg-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="invoice-area">
                                    <div class="invoice-head">
                                        <div class="row">
                                            <div class="iv-left col-6">
                                                <span>FILM ME</span>
                                            </div>
                                            <div class="iv-right col-6 text-md-right">
            <?php
                $query=mysqli_query($db,"SELECT * FROM `bookings` WHERE `booking_id`='".$booking_id."'")or die(mysqli_error());
                  while($row=mysqli_fetch_array($query)){
            ?>
                                                <span>#<?php echo $row['booking_id']; ?><?php echo $row['photographer_id']; ?><?php echo $row['customer_id']; ?><?php echo $row['event_id']; ?></span>

            <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            <div class="invoice-address">
            <?php
                $query=mysqli_query($db,"SELECT * FROM `bookings` WHERE `booking_id`='".$booking_id."'")or die(mysqli_error());
                  while($row=mysqli_fetch_array($query)){
            ?>
                                                <h3>Finished Booking Receipt</h3>
                                                <h5><?php echo $row['customer_name']; ?></h5>
                                                <p><?php echo $row['customer_address']; ?></p>
                  <?php } ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-md-right">
                                            <ul class="invoice-date">
            <?php
                $query=mysqli_query($db,"SELECT * FROM `bookings` WHERE `booking_id`='".$booking_id."'")or die(mysqli_error());
                  while($row=mysqli_fetch_array($query)){
            ?>
                                                <li>Event  Date : <?php echo date('F j, Y',strtotime($row['event_date'])); ?></li>
                                                 <li>Date  Finished : <?php echo date('F j, Y / g:i a',strtotime($row['status_date'])); ?></li>

            <?php } ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="invoice-table table-responsive mt-5">
                                        <table class="table table-bordered table-hover text-right">
                                            <thead>
                                                <tr class="text-capitalize">

 <?php
                $query=mysqli_query($db,"SELECT * FROM `bookings` WHERE `booking_id`='".$booking_id."'")or die(mysqli_error());
                  while($row=mysqli_fetch_array($query)){
            ?>
                                                    <th class="text-center" style="width: 8%;">Booking ID</th>
                                                    <th class="text-center">Photographer Name</th>
                                                    <th class="text-center">Photographer Contact #</th>
                                                    <th class="text-center">Event Name</th>
                                                    <th class="text-center">Event Location</th>
                                                    <th class="text-center">Event Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center"><?php echo $row['booking_id']; ?></td>
                                                    <td class="text-center"><?php echo $row['photographer_name']; ?></td>
                                                    <td class="text-center"><?php echo $row['photographer_contact']; ?></td>
                                                    <td class="text-center"><?php echo $row['event_name']; ?></td>
                                                    <td class="text-center"><?php echo $row['event_loc']; ?></td>
   
           
                                                    <td>&#8369;<?php echo $row['event_price']; ?></td>
                                                </tr>
                                                

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="6">total payment : &#8369;<?php echo $row['event_price']; ?></td>
                                                     <?php } ?>
                                                </tr>
                                            </tfoot>
                                        </table>
                                       <!--    <div class="invoice-buttons text-right">
                                          <input  style="font-size: 9px; width: 200px; background: transparent; margin-top: 45px; border: none;"disabled value="Cashier's Signature Over Printed Name">
                                          <div> -->
                                    </div>
                                </div>
                           
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </section>
          <div class="invoice-buttons text-left" style="position: absolute; top: 550px; left: 650px;">
                                    <a href="" class="invoice-btn" onclick="window.print();">print receipt</a>
          </div>
        <!-- main content area end -->
  
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
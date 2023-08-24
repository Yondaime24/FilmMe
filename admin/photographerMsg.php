<?php 
  include('../functions/functions.php');

  $photographer_id = $_GET['photographer_id'];
  $msg_id = $_GET['msg_id'];

  $query ="UPDATE `photographerandcustomermsgtoadmin` SET `status` = 'read' WHERE `msg_id` = $msg_id;";
  performQuery($query);

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
    <title>Film Me | Photographer Message</title>

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
                <form id="messageForm" action="photographerMsg.php" method="post">
                    <div class="login-form-head">
                        <h4>Photographer Message</h4>
                    </div>
                    <div class="login-form-body">
        <div class="form-group" hidden="hidden">
            <label for="sda" class="control-label mb-1">Admin ID:</label>
            <input id="sda" type="text" name="admin_id" class="form-control" value="<?php echo $_SESSION['user']['user_id']; ?>" readonly>
        </div>

        <div class="form-group" hidden="hidden">
            <label for="sda" class="control-label mb-1">Admin Name:</label>
            <input id="sda" type="text" name="full_name" class="form-control" value="<?php echo $_SESSION['user']['fname']; ?> <?php echo $_SESSION['user']['mname']; ?> <?php echo $_SESSION['user']['lname']; ?>" readonly>
        </div>

         <div class="form-group" hidden="hidden">
            <label for="sda" class="control-label mb-1">Admin Contact:</label>
            <input id="sda" type="text" name="contact_number" class="form-control" value="<?php echo $_SESSION['user']['contact_number']; ?>" readonly>
        </div>

         <div class="form-group" hidden="hidden">
            <label for="sda" class="control-label mb-1">Admin Email:</label>
            <input id="sda" type="text" name="email_address" class="form-control" value="<?php echo $_SESSION['user']['email_address']; ?>" readonly>
        </div>

      <?php
          $query=mysqli_query($db,"SELECT * FROM photographerandcustomermsgtoadmin WHERE msg_id='".$msg_id."'")or die(mysqli_error());
                  while($row=mysqli_fetch_array($query)){
      ?>

            <div class="form-group" hidden="hidden">
                <label for="userID" class="control-label mb-1">photographer ID</label>
                <input id="userID" name="photographer_id" type="text" class="form-control" value="<?php echo $row['photographer_id']; ?>" readonly>
            </div>

             <div class="form-group">
                <label for="locId" class="control-label mb-1">From photographer:</label>
                <input id="locId" type="text" class="form-control" value="<?php echo $row['full_name']; ?>" readonly>
            </div>

            <div class="form-group">
                <label for="contactNumber" class="control-label mb-1">photographer Contact Number:</label>
                 <input id="contactNumber" type="text" class="form-control" value="<?php echo $row['contact_number']; ?>" readonly="readonly">
            </div>

             <div class="form-group">
                <label for="inputNumber" class="control-label mb-1">photographer Email Address:</label>
                <input id="inputNumber" type="text" class="form-control" value="<?php echo $row['email_address']; ?>" readonly="readonly">
            </div>

                  <div class="form-group validate">
                <label for="textArea" class="control-label mb-1"><h5>Message:</h5></label>
                 <textarea id="textarea-input" rows="9" readonly="on" class="form-control" style="border: none; height: 100px"><?php echo $row['message']; ?></textarea>
            </div>


            <div class="form-group validate">
                <label for="textArea" class="control-label mb-1"><h5>Reply:</h5></label>
                 <textarea name="message" id="textarea-input" rows="9" placeholder="Input Reply Here..." class="form-control"></textarea>
            </div>
          <?php }?>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit" name="admintophotographer">Send Reply <i class="ti-arrow-right"></i></button>
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

     <script src="../js/message.js"></script>


</body>

</html>
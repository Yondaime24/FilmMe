<?php  

    include('../functions/functions.php');

    $user_id = $_GET['user_id'];
    $event_id = $_GET['event_id'];

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
    <title>Film Me | View Events</title>
    <link rel="shortcut icon" type="image/png" href="../filmme/assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="../filmme/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../filmme/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../filmme/assets/css/themify-icons.css">
    <link rel="stylesheet" href="../filmme/assets/css/metisMenu.css">
    <link rel="stylesheet" href="../filmme/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../filmme/assets/css/slicknav.min.css">
    <!-- amcharts css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="../filmme/assets/css/typography.css">
    <link rel="stylesheet" href="../filmme/assets/css/default-css.css">
    <link rel="stylesheet" href="../filmme/assets/css/styles.css">
    <link rel="stylesheet" href="../filmme/assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="../filmme/assets/js/vendor/modernizr-2.8.3.min.js"></script>
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
    <!-- page container area start -->
    <div class="page-container">
           <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="adminPanel.php"><img src="../images/logo2.png" alt="logo" width="40"><h5>Film Me</h5></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                           
                            <li><a href="adminPanel.php"><i class="ti-dashboard"></i> <span>dashboard</span></a></li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-user"></i><span>customer</span></a>
                                <ul class="collapse">
                                    <li><a href="customer.php">View Customer</a></li>
                                    <li><a href="addCustomer.php">Add Customer</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-camera"></i><span>photographers</span></a>
                                <ul class="collapse">
                                    <li><a href="photographer.php">View Photographer</a></li>
                                    <li><a href="addphotographer.php">Add Photographer</a></li>
                                </ul>
                            </li>
                            <li class="active">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-calendar"></i><span>events</span></a>
                                <ul class="collapse">
                                    <li class="active"><a href="eventsTable.php">All Events</a></li>
                                    <li><a href="pendingEvents.php">Pending</a></li>
                                    <li><a href="bookedEvents.php">Booked</a></li>
                                    <li><a href="finishedEvents.php">Finished</a></li>
                                    <li><a href="canceledEvents.php">Canceled</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-book"></i><span>bookings</span></a>
                                <ul class="collapse">
                                    <li><a href="bookingsTable.php">All Bookings</a></li>
                                    <li><a href="bookedBookings.php">Booked</a></li>
                                    <li><a href="finishedBookings.php">Finished</a></li>
                                    <li><a href="canceledBookings.php">Canceled</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i>&#8369;</i> <span>Pricing</span></a>
                                <ul class="collapse">
                                    <li><a href="pricing.php">Pricing</a></li>
                                    <li><a href="gcash.php">GCash Account</a></li>
                                    <li><a href="payment.php">Payments</a></li>
                                </ul>
                            </li>
                             <li><a href="customerDeactivated.php"><i class="ti-na"></i> <span>Deactivated Customer</span></a></li>
                             <li><a href="photographerDeactivated.php"><i class="ti-na"></i> <span>Deactivated Photographer</span></a></li>

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
           <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li id="full-view"><i class="ti-fullscreen"></i></li>
                            <li id="full-view-exit"><i class="ti-zoom-out"></i></li>








                            <li class="dropdown">
                                <i data-toggle="dropdown">Ongoing Payment
                                    
                                   <?php
                                        $query = "SELECT * from `events` where `status` = 'processing' order by `process_date` DESC";
                                        if(count(fetchAll($query))>0){
                                    ?>
                                        <span><?php echo count(fetchAll($query)); ?></span>
                                  
                                    <?php } ?>
                                </i>
                                <div class="dropdown-menu bell-notify-box notify-box">

                                   <?php
                                       $query = "SELECT * from `events` where `status` = 'processing' order by `process_date` DESC";
                                        if(count(fetchAll($query))>0){
                                    ?>

                                    <span class="notify-title">You have <?php echo count(fetchAll($query)); ?> ongoing payment</span>

                                   <?php } ?>

                                    <div class="nofity-list">
                                         <div class="scroll2">

                                    <?php 
                                      $query = "SELECT * from `events`  where `status` = 'processing' order by `process_date` DESC";
                                            if(count(fetchAll($query))>0){
                                              foreach(fetchAll($query) as $i){
                                    ?>
                                       <?php if ($i['notif_status']=='ongoing') { ?>

                                        <a class="notifi__item" href="ongoingpayment.php?event_id=<?php echo $i['event_id'] ?>&&customer_id=<?php echo $i['user_id'] ?>&&photographer_id=<?php echo $i['photographer_id'] ?>">
                                            <div class="bg-c1 img-cir img-40">
                                                <i>&#8369;</i>
                                            </div>
                                            <div class="content">
                                                    <p><b><?php echo $i['event_name'] ?></b></p>
                                                <small style="color: black;"><?php echo date('F j, Y / g:i a',strtotime($i['process_date'])) ?></small>
                                            </div>
                                        </a>

                                    <?php  }else if ($i['notif_status']=='done') { ?>

                                       <a class="notifi__item"href="ongoingpayment.php?event_id=<?php echo $i['event_id'] ?>&&customer_id=<?php echo $i['user_id'] ?>&&photographer_id=<?php echo $i['photographer_id'] ?>">
                                            <div class="bg-c1 img-cir img-40" style="background: gray">
                                                <!-- <i class="zmdi zmdi-email-open"></i> -->
                                            </div>
                                            <div class="content">
                                              <p style="color: gray"><b>Payment Done</b></p>
                                                <small style="color: gray;"><?php echo date('F j, Y / g:i a',strtotime($i['process_date'])) ?></small>
                                            </div>
                                        </a>

                                    <?php } ?>

                                      <?php 
                                          }
                                        }

                                        else{
                                          echo "<div class=\"mess__footer\">
                                                     <p style=\"color: red\">No Ongoing Payments Yet</p>
                                                </div>";
                                        }

                                      ?>

                                       </div>
                                        <!-- <div class="footer">
                                         <center><a href="messageAdmin.php">Message Admin</a></center>
                                      </div> -->
                                    </div>
                                </div>
                            </li>











                            <li class="dropdown">
                                <i class="ti-comment dropdown-toggle" data-toggle="dropdown">
                                    
                                   <?php
                                        $query = "SELECT * from `photographerandcustomermsgtoadmin` where `status` = 'unread' && `notif_status` = 'user' order by `date_sent` DESC";
                                        if(count(fetchAll($query))>0){
                                    ?>
                                        <span><?php echo count(fetchAll($query)); ?></span>
                                  
                                    <?php } ?>
                                </i>
                                <div class="dropdown-menu bell-notify-box notify-box">

                                    <?php
                                        $query = "SELECT * from `photographerandcustomermsgtoadmin` where `status` = 'unread' && `notif_status` = 'user' order by `date_sent` DESC";
                                        if(count(fetchAll($query))>0){
                                    ?>
                                    <span class="notify-title">You have <?php echo count(fetchAll($query)); ?> new customer message</span>

                                   <?php } ?>

                                    <div class="nofity-list">
                                         <div class="scroll2">
 <?php 
                                        $query = "SELECT * from `photographerandcustomermsgtoadmin` order by `date_sent` DESC";
                                            if(count(fetchAll($query))>0){
                                              foreach(fetchAll($query) as $i){
                                    ?>
                                      
                                        <?php if ($i['user_type']=='customer') { ?>


                                            <?php if ($i['status']=='unread') { ?>

                                                  <a class="notifi__item" href="customerMsg.php?customer_id=<?php echo $i['customer_id'] ?>&&msg_id=<?php echo $i['msg_id'] ?>">
                                                    <div class="bg-c1 img-cir img-40">
                                                        <i class="ti-email"></i>
                                                    </div>
                                                    <div class="content">
                                                        <small style="color: black">From: <?php echo $i['full_name'] ?></small>
                                                            <p><b>You receive a new message from customer</b></p>
                                                        <small style="color: black;"><?php echo date('F j, Y / g:i a',strtotime($i['date_sent'])) ?></small>
                                                    </div>
                                                </a>

                                            <?php  }else if ($i['status']=='read') { ?>

                                              <a class="notifi__item" href="customerMsg.php?customer_id=<?php echo $i['customer_id'] ?>&&msg_id=<?php echo $i['msg_id'] ?>">
                                                    <div class="bg-c1 img-cir img-40" style="background: gray">
                                                        <i class="zmdi zmdi-email-open"></i>
                                                    </div>
                                                    <div class="content">
                                                         <small style="color: black">From: <?php echo $i['full_name'] ?></small>
                                                            <p>Customer message opened</p>
                                                        <small style="color: gray;"><?php echo date('F j, Y / g:i a',strtotime($i['date_sent'])) ?></small>
                                                    </div>
                                                </a>

                                            <?php } ?>
                                             

                                        <?php  }else if ($i['user_type']=='photographer') { ?>

                                        
                                        

                                           <?php if ($i['status']=='unread') { ?>

                                                <a class="notifi__item" href="photographerMsg.php?photographer_id=<?php echo $i['photographer_id'] ?>&&msg_id=<?php echo $i['msg_id'] ?>">
                                                    <div class="bg-c1 img-cir img-40">
                                                        <i class="ti-email"></i>
                                                    </div>
                                                   <div class="content">
                                                        <small style="color: black">From: <?php echo $i['full_name'] ?></small>
                                                            <p><b>You receive a new message from photographer</b></p>
                                                        <small style="color: black;"><?php echo date('F j, Y / g:i a',strtotime($i['date_sent'])) ?></small>
                                                    </div>
                                                </a>

                                            <?php  }else if ($i['status']=='read') { ?>

                                                 <a class="notifi__item" href="photographerMsg.php?photographer_id=<?php echo $i['photographer_id'] ?>&&msg_id=<?php echo $i['msg_id'] ?>">
                                                        <div class="bg-c1 img-cir img-40" style="background: gray">
                                                            <i class="zmdi zmdi-email-open"></i>
                                                        </div>
                                                        <div class="content">
                                                             <small style="color: black">From: <?php echo $i['full_name'] ?></small>
                                                                <p>Photographer message opened</p>
                                                            <small style="color: gray;"><?php echo date('F j, Y / g:i a',strtotime($i['date_sent'])) ?></small>
                                                        </div>
                                                    </a>

                                            <?php } ?>

                                        <?php } ?>

                                      <?php 
                                          }
                                        }

                                        else{
                                          echo "<div class=\"mess__footer\">
                                                     <p style=\"color: red\">No Messages Yet</p>
                                                </div>";
                                        }

                                      ?>
                                       </div>
                                    </div>
                                </div>
                            </li>


                             <li class="dropdown">
                                <i class="fa fa-bell-o dropdown-toggle" data-toggle="dropdown">
                                    
                                   <?php
                                        $query = "SELECT * from `users` where `user_type` = 'pending' order by `date_registered` DESC";
                                        if(count(fetchAll($query))>0){
                                    ?>
                                        <span><?php echo count(fetchAll($query)); ?></span>
                                  
                                    <?php } ?>
                                </i>
                                <div class="dropdown-menu bell-notify-box notify-box">

                                   <?php
                                        $query = "SELECT * from `users` where `user_type` = 'pending' order by `date_registered` DESC";
                                        if(count(fetchAll($query))>0){
                                    ?>

                                    <span class="notify-title">You have <?php echo count(fetchAll($query)); ?> new message from admin</span>

                                   <?php } ?>

                                    <div class="nofity-list">
                                         <div class="scroll2">

                                    <?php 
                                      $query = "SELECT * from `users` order by `date_registered` DESC";
                                            if(count(fetchAll($query))>0){
                                              foreach(fetchAll($query) as $i){
                                    ?>
                                       <?php if ($i['user_type']=='pending') { ?>

                                        <a class="notifi__item" href="newphotographer.php?user_id=<?php echo $i['user_id'] ?>">
                                            <div class="bg-c1 img-cir img-40">
                                                <i class="fa fa-bell"></i>
                                            </div>
                                            <div class="content">
                                                <small style="color: black">Name: <?php echo $i['fname'] ?> <?php echo $i['mname'] ?> <?php echo $i['lname'] ?></small>
                                                    <p><b>New Photographer Registration</b></p>
                                                <small style="color: black;"><?php echo date('F j, Y / g:i a',strtotime($i['date_registered'])) ?></small>
                                            </div>
                                        </a>

                                    <?php  }else if ($i['user_type']=='photographer') { ?>

                                       <a class="notifi__item" href="newphotographer.php?user_id=<?php echo $i['user_id'] ?>">
                                            <div class="bg-c1 img-cir img-40" style="background: gray">
                                                <i class="zmdi zmdi-email-open"></i>
                                            </div>
                                            <div class="content">
                                                <small style="color: gray">Name: <?php echo $i['fname'] ?> <?php echo $i['mname'] ?> <?php echo $i['lname'] ?></small>
                                                    <p>Photographer Registered</p>
                                                <small style="color: gray;"><?php echo date('F j, Y / g:i a',strtotime($i['date_registered'])) ?></small>
                                            </div>
                                        </a>

                                    <?php } ?>

                                      <?php 
                                          }
                                        }

                                        else{
                                          echo "<div class=\"mess__footer\">
                                                     <p style=\"color: red\">No Messages Yet</p>
                                                </div>";
                                        }

                                      ?>

                                       </div>
                                        <!-- <div class="footer">
                                         <center><a href="messageAdmin.php">Message Admin</a></center>
                                      </div> -->
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- header area end -->
          <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Events</h4>
                            <ul class="breadcrumbs pull-left">
                                    <?php if (isset($_SESSION['success'])) : ?>
                                     <h5 style="color: blue;">
                                      <?php 
                                        echo $_SESSION['success']; 
                                        unset($_SESSION['success']);
                                      ?>
                                      <?php  if (isset($_SESSION['user'])) : ?>
                                      <strong><?php echo $_SESSION['user']['fname']; ?> <?php echo $_SESSION['user']['mname']; ?> <?php echo $_SESSION['user']['lname']; ?></strong>
                                     <?php endif ?>!!!
                                    </h5>
                                    <?php endif ?>  
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">

      <?php
        $query=mysqli_query($db,"SELECT * FROM users WHERE user_id='".$_SESSION['user']['user_id']."'")or die(mysqli_error());
          while($row=mysqli_fetch_array($query)){
      ?>

                                        <div class="image">
                                            <?php if($row['photo'] != ""): ?>
                                                <img class="avatar user-thumb" src="../images/<?php echo $row['photo']; ?>" alt="avatar">
                                            <?php else: ?>
                                                <img class="avatar user-thumb" src="../images/profile.png"/>
                                            <?php endif; ?>
                                        </div>

                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?php echo $row['fname']; ?><i class="fa fa-angle-down"></i></h4>

     <?php } ?>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="myProfile.php"> <i class="ti-user"></i> Account</a>
                                <a class="dropdown-item" href="changePhoto.php"> <i class="ti-pencil"></i> Change Profile Picture</a>
                                <a class="dropdown-item" href="changeUserPass.php"> <i class="ti-pencil"></i> Change Username & Password</a>
                                <hr>
                                 <a class="dropdown-item" href="adminPanel.php?logout='1'"><i class="ti-power-off"></i> Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">
                    
                    <!-- Primary table start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body" style="height: 600px;">
                                <!-- <h4 class="header-title">Customer Profile</h4> -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="au-card recent-report">
                                    <div class="au-card-inner">
                                        <h3 class="title-2 text-center"> <u> Event Details </u></h3>
                                        <br>
          <?php
            $query=mysqli_query($db,"SELECT * FROM users WHERE user_id='".$user_id."'")or die(mysqli_error());
            while($row=mysqli_fetch_array($query)){
          ?>

                                    <?php if($row['photo'] != ""): ?>
                                        <img src="../images/<?php echo $row['photo'];?>" width="280"/>
                                    <?php else: ?>
                                        <img src="../images/profile.png" width="250"/>
                                    <?php endif; ?>
          <?php }?>

           <?php
            $query=mysqli_query($db,"SELECT * FROM events WHERE event_id='".$event_id."'")or die(mysqli_error());
            while($row=mysqli_fetch_array($query)){
          ?>

                                     <h3 class="title-2" style="position: absolute; top: 100px; left: 350px;">Event By: </h3>
                                     <h5 style="position: absolute; top: 105px; left: 475px;"><u> <?php echo $row['customer_name'];?> </h5>

                                     <h3 class="title-2" style="position: absolute; top: 130px; left: 350px;">Contact #: </h3>
                                     <h5 style="position: absolute; top: 135px; left: 485px;"><u><?php echo $row['contact_number'];?></h5>

                                     <h3 class="title-2" style="position: absolute; top: 160px; left: 350px;">Address: </h3>
                                     <h5 style="position: absolute; top: 165px; left: 460px;"><u><?php echo $row['residential_address'];?></h5>

                                     <h3 class="title-2" style="position: absolute; top: 190px; left: 350px;">Email: </h3>
                                     <h5 style="position: absolute; top: 195px; left: 430px;"><u><?php echo $row['email_address'];?></h5>

                                     <h3 class="title-2" style="position: absolute; top: 220px; left: 350px;">Event Name: </h3>
                                     <h5 style="position: absolute; top: 225px; left: 515px;"><u><?php echo $row['event_name'];?></h5>

                                    <h3 class="title-2" style="position: absolute; top: 250px; left: 350px;">Event Location: </h3>
                                    <h5 style="position: absolute; top: 255px; left: 545px;"><u><?php echo $row['event_loc'];?></h5>

                                    <h3 class="title-2" style="position: absolute; top: 280px; left: 350px;">Event Date: </h3>
                                    <h5 style="position: absolute; top: 285px; left: 500px;"><u><?php echo date('F j, Y',strtotime($row['event_date']));?></h5>

                                     <h3 class="title-2" style="position: absolute; top: 310px; left: 350px;">Event Price: </h3>
                                     <h5 style="position: absolute; top: 315px; left: 505px;"><u>&#8369;<?php echo $row['event_price'];?></h5>


                                    <?php if ($row['status']=='finished') { ?>

                                    <h3 class="title-2" style="position: absolute; top: 350px; left: 350px; background: #2ecc71">Finished On: </h3>
                                    <h5 style="position: absolute; top: 355px; left: 510px;"><u><?php echo date('F j, Y',strtotime($row['date_added']));?></h5>

                                    <h3 class="title-2" style="position: absolute; top: 380px; left: 350px;">Status: </h3>
                                    <h5 style="position: absolute; top: 385px; left: 440px; background: #2ecc71"><u><?php echo $row['status'];?></h5>

                                    <a href="eventsTable.php" class="btn btn-outline-primary btn-sm" style="position: absolute; top:  430px; left: 475px;">Return</a>

                                     <a href="msgCustomer.php?user_id=<?php echo $row['user_id'];?>" class="btn btn-outline-success btn-sm" style="position: absolute; top:  430px; left: 548px;">Message Customer</a>

                                    <!--  <a href="deleteEvent.php?event_id=<?php echo $row['event_id'];?>" class="btn btn-outline-danger btn-sm" style="position: absolute; top:  405px; left: 661px;" onclick="return confirm('Are you sure want to delete this event?')">Delete</a> -->

                                    <?php }else if ($row['status']=='pending') { ?>

                                    <h3 class="title-2" style="position: absolute; top: 350px; left: 350px;">Added On: </h3>
                                    <h5 style="position: absolute; top: 355px; left: 490px;"><u><?php echo date('F j, Y',strtotime($row['date_added']));?></h5>

                                    <h3 class="title-2" style="position: absolute; top: 380px; left: 350px;">Status: </h3>
                                    <h5 style="position: absolute; top: 385px; left: 440px;"><u><?php echo $row['status'];?></h5>

                                     <a href="eventsTable.php" class="btn btn-outline-primary btn-sm" style="position: absolute; top:  430px; left: 386px;">Return</a>

                                     <a href="bookphotographer.php?customer_id=<?php echo $row['user_id'];?>&&event_id=<?php echo $row['event_id'];?>" class="btn btn-outline-info btn-sm" style="position: absolute; top:  430px; left: 458px;">Book photographer</a>

                                     <a href="msgCustomer.php?user_id=<?php echo $row['user_id'];?>" class="btn btn-outline-success btn-sm" style="position: absolute; top:  430px; left: 600px;">Message Customer</a>


                                     <a href="cancelEvent.php?event_id=<?php echo $row['event_id'];?>" class="btn btn-outline-danger btn-sm" style="position: absolute; top:  430px; left: 744px;" onclick="return confirm('Are you sure want to cancel this event? Once canceled it cannot be undone')">Cancel Event</a>


                                    <?php }else if ($row['status']=='booked') { ?>

                                    <h3 class="title-2" style="position: absolute; top: 350px; left: 350px; color: white; background: blue">Booked On: </h3>
                                    <h5 style="position: absolute; top: 355px; left: 500px;"><u><?php echo date('F j, Y',strtotime($row['date_added']));?></h5>

                                    <h3 class="title-2" style="position: absolute; top: 380px; left: 350px;">Status: </h3>
                                    <h5 style="position: absolute; top: 385px; left: 440px; color: white; background: blue"><u><?php echo $row['status'];?></h5>

          <?php
            $query=mysqli_query($db,"SELECT * FROM bookings WHERE event_id='".$event_id."'")or die(mysqli_error());
            while($row2=mysqli_fetch_array($query)){
          ?>

                                    <h3 class="title-2" style="position: absolute; top: 410px; left: 350px;">Booked By: </h3>
                                    <h5 style="position: absolute; top: 415px; left: 495px;"><u><?php echo $row2['photographer_name'];?></h5>
          
                                   <a href="eventsTable.php" class="btn btn-outline-primary btn-sm" style="position: absolute; top:  450px; left: 351px;">Return</a>

                                     <a href="msgphotographer.php?user_id=<?php echo $row2['photographer_id'];?>" class="btn btn-outline-success btn-sm" style="position: absolute; top:  450px; left: 421px;">Message Photographer</a>
           <?php }  ?>

                                  <!--   <a href="eventsTable.php" class="btn btn-outline-primary btn-sm" style="position: absolute; top:  450px; left: 497px;">Return</a> -->

                                   <a href="msgCustomer.php?user_id=<?php echo $row['user_id'];?>" class="btn btn-outline-success btn-sm" style="position: absolute; top:  450px; left: 587px;">Message Customer</a>

                                     <a href="cancelBooking.php?event_id=<?php echo $row['event_id'];?>" class="btn btn-outline-danger btn-sm" style="position: absolute; top:  450px; left: 730px;" onclick="return confirm('Are you sure want to cancel the booking of this event? Once canceled it cannot be undone')">Cancel Booking</a>
                                        
                                    <?php }else if ($row['status']=='canceled') {  ?>


                                    <h3 class="title-2" style="position: absolute; top: 350px; left: 350px; color: white; background: red">Canceled On: </h3>
                                    <h5 style="position: absolute; top: 355px; left: 530px;"><u><?php echo date('F j, Y',strtotime($row['date_added']));?></h5>

                                    <h3 class="title-2" style="position: absolute; top: 380px; left: 350px;">Status: </h3>
                                    <h5 style="position: absolute; top: 385px; left: 440px; color: white; background: red"><u><?php echo $row['status'];?></h5>

                                      <a href="eventsTable.php" class="btn btn-outline-primary btn-sm" style="position: absolute; top:  430px; left: 475px;">Return</a>

                                     <a href="msgCustomer.php?user_id=<?php echo $row['user_id'];?>" class="btn btn-outline-success btn-sm" style="position: absolute; top:  430px; left: 545px;">Message Customer</a>

                                     <a href="deleteEvent.php?event_id=<?php echo $row['event_id'];?>" class="btn btn-outline-danger btn-sm" style="position: absolute; top:  430px; left: 688px;" onclick="return confirm('Are you sure want to delete this event?')">Delete</a>


                                    <?php } ?>
                                   

                                  
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
   <?php }?>
                                
                            </div>
                        </div>
                    </div>
                    <!-- Primary table end -->
                </div>
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>© Film Me 2021. All right reserved.</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
    <!-- jquery latest version -->
    <script src="../filmme/assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="../filmme/assets/js/popper.min.js"></script>
    <script src="../filmme/assets/js/bootstrap.min.js"></script>
    <script src="../filmme/assets/js/owl.carousel.min.js"></script>
    <script src="../filmme/assets/js/metisMenu.min.js"></script>
    <script src="../filmme/assets/js/jquery.slimscroll.min.js"></script>
    <script src="../filmme/assets/js/jquery.slicknav.min.js"></script>

    <!-- Start datatable js -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    <!-- others plugins -->
    <script src="../filmme/assets/js/plugins.js"></script>
    <script src="../filmme/assets/js/scripts.js"></script>
</body>

</html>

<?php  

    include('../functions/functions.php');

      $sql2 = "SELECT sum(amount) AS total FROM payment";
  $stmt2 = $db->query($sql2);
  $row1 = $stmt2->fetch_assoc();

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
    <title>Film Me | Admin Dashboard</title>

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
    <link rel="stylesheet" href="../filmme/assets/css/scroll.css">
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
                           
                            <li class="active"><a href="adminPanel.php"><i class="ti-dashboard"></i> <span>dashboard</span></a></li>
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
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-calendar"></i><span>events</span></a>
                                <ul class="collapse">
                                    <li><a href="eventsTable.php">All Events</a></li>
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
                            <h4 class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="adminPanel.php">Home</a></li>
                                <li><span>Admin</span></li>
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
                <!-- sales report area start -->
                <div class="sales-report-area mt-5 mb-5">
                    <div class="row">


                        <div class="col-md-4">
                            <div class="single-report mb-xs-30">
                            	<a href="customer.php">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                    <div class="icon"><i class="ti-user"></i></div>

                                    <?php

                                        $query = "SELECT * from `users` where `user_type` = 'customer' && `status`='active'";
                                        if(count(fetchAll($query))>0){
                                    ?>

                                  <?php
                                  if(count(fetchAll($query))==1){
                                    ?>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Customer Registered</h4>
                                       
                                    </div>
                                     <div class="d-flex justify-content-between pb-2">
                                        <h2><?php echo count(fetchAll($query)); ?></h2>
                                    </div>
                                     <small>Click to check it out now!</small>

                                  <?php
                                    }else{
                                  ?>
                                       <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Customers Registered</h4>
                                       
                                    </div>
                                     <div class="d-flex justify-content-between pb-2">
                                        <h2><?php echo count(fetchAll($query)); ?></h2>
                                    </div>
                                     <small>Click to check them out now!</small>
                                    <?php }
                                  ?>           

                                    <?php
                                        }else{
                                          echo "No Customers Yet!";
                                        }
                                    ?>                                 
                                </div>
                            </a>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="single-report mb-xs-30">
                            	<a href="photographer.php">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                    <div class="icon"><i class="ti-camera"></i></div>

                                    <?php

                                        $query = "SELECT * from `users` where `user_type` = 'photographer' && `status`='active'";
                                        if(count(fetchAll($query))>0){
                                    ?>

                                  <?php
                                  if(count(fetchAll($query))==1){
                                    ?>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Photographer Registered</h4>
                                       
                                    </div>
                                     <div class="d-flex justify-content-between pb-2">
                                        <h2><?php echo count(fetchAll($query)); ?></h2>
                                    </div>
                                     <small>Click to check it out now!</small>

                                  <?php
                                    }else{
                                  ?>
                                       <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Photographers Registered</h4>
                                       
                                    </div>
                                     <div class="d-flex justify-content-between pb-2">
                                        <h2><?php echo count(fetchAll($query)); ?></h2>
                                    </div>
                                     <small>Click to check them out now!</small>
                                    <?php }
                                  ?>           

                                    <?php
                                        }else{
                                          echo "No Photographers Yet!";
                                        }
                                    ?>                                 
                                </div>
                            </a>
                            </div>
                        </div>




                         <div class="col-md-4">
                            <div class="single-report mb-xs-30">
                            	   <a href="payment.php">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                    <div class="icon"><i>&#8369;</i></div>
                                    <?php
                                       
                                        $query = "SELECT * from `payment`";
                                        if(count(fetchAll($query))>0){
                                    ?>



                                 
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Total Payment</h4>
                                       
                                    </div>
                                     <div class="d-flex justify-content-between pb-2">
                                        <h2><?php echo $row1["total"] ?></h2>
                                    </div>
                                     <small>Click to check it out now!</small>

                                 
                                 

                                    <?php
                                        }else{
                                          echo "No Payments Yet!";
                                        }
                                    ?>                                 
                                </div>
                            </a>
                            </div>
                        </div>

                     

                         <div class="col-md-4" style="margin-top: 20px;">
                            <div class="single-report mb-xs-30">
                                <a href="pendingEvents.php">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                    <div class="icon"><i class="ti-calendar"></i></div>

                                    <?php
                                       
                                        $query = "SELECT * from `events` where `status` = 'pending'";
                                        if(count(fetchAll($query))>0){
                                    ?>

                                  <?php
                                  if(count(fetchAll($query))==1){
                                    ?>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Available Customer Event</h4>
                                       
                                    </div>
                                     <div class="d-flex justify-content-between pb-2">
                                        <h2><?php echo count(fetchAll($query)); ?></h2>
                                    </div>
                                     <small>Click to check it out now!</small>

                                  <?php
                                    }else{
                                  ?>
                                       <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Available Customer Events</h4>
                                       
                                    </div>
                                     <div class="d-flex justify-content-between pb-2">
                                        <h2><?php echo count(fetchAll($query)); ?></h2>
                                    </div>
                                     <small>Click to check them out now!</small>
                                    <?php }
                                  ?>           

                                    <?php
                                        }else{
                                          echo "No Pending Events Yet!";
                                        }
                                    ?>                                 
                                </div>
                            </a>
                            </div>
                        </div>


                           <div class="col-md-4" style="margin-top: 20px;">
                            <div class="single-report mb-xs-30">
                                <a href="bookedEvents.php">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                    <div class="icon"><i class="ti-book"></i></div>

                                <?php
                                       
                                        $query = "SELECT * from `events` where `status` = 'booked'";
                                        if(count(fetchAll($query))>0){
                                    ?>

                                  <?php
                                  if(count(fetchAll($query))==1){
                                    ?>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Booked Customer Event</h4>
                                       
                                    </div>
                                     <div class="d-flex justify-content-between pb-2">
                                        <h2><?php echo count(fetchAll($query)); ?></h2>
                                    </div>
                                     <small>Click to check it out now!</small>

                                  <?php
                                    }else{
                                  ?>
                                       <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Booked Customer Events</h4>
                                       
                                    </div>
                                     <div class="d-flex justify-content-between pb-2">
                                        <h2><?php echo count(fetchAll($query)); ?></h2>
                                    </div>
                                     <small>Click to check them out now!</small>
                                    <?php }
                                  ?>           

                                    <?php
                                        }else{
                                          echo "No Booked Events Yet!";
                                        }
                                    ?>                                 
                                </div>
                            </a>
                            </div>
                        </div>

                        <div class="col-md-4" style="margin-top: 20px;">
                            <div class="single-report mb-xs-30">
                                <a href="bookedBookings.php">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                    <div class="icon"><i class="ti-book"></i></div>

                                <?php
                                       
                                        $query = "SELECT * from `bookings` where `status` = 'booked'";
                                        if(count(fetchAll($query))>0){
                                    ?>


                                  <?php
                                  if(count(fetchAll($query))==1){
                                    ?>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Photographer Booking</h4>
                                       
                                    </div>
                                     <div class="d-flex justify-content-between pb-2">
                                        <h2><?php echo count(fetchAll($query)); ?></h2>
                                    </div>
                                     <small>Click to check it out now!</small>

                                  <?php
                                    }else{
                                  ?>
                                       <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Photographer Bookings</h4>
                                       
                                    </div>
                                     <div class="d-flex justify-content-between pb-2">
                                        <h2><?php echo count(fetchAll($query)); ?></h2>
                                    </div>
                                     <small>Click to check them out now!</small>
                                    <?php }
                                  ?>           

                                    <?php
                                        }else{
                                          echo "No Photographer Bokings Yet!";
                                        }
                                    ?>                                 
                                </div>
                            </a>
                            </div>
                        </div>

                          <div class="col-md-4" style="margin-top: 20px;">
                            <div class="single-report mb-xs-30">
                                <a href="finishedEvents.php">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                    <div class="icon"><i class="ti-check"></i></div>

                                 <?php
                                       
                                        $query = "SELECT * from `bookings` where `status` = 'finished'";
                                        if(count(fetchAll($query))>0){
                                    ?>


                                  <?php
                                  if(count(fetchAll($query))==1){
                                    ?>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Finished Booking</h4>
                                       
                                    </div>
                                     <div class="d-flex justify-content-between pb-2">
                                        <h2><?php echo count(fetchAll($query)); ?></h2>
                                    </div>
                                     <small>Click to check it out now!</small>

                                  <?php
                                    }else{
                                  ?>
                                       <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Finished Bookings</h4>
                                       
                                    </div>
                                     <div class="d-flex justify-content-between pb-2">
                                        <h2><?php echo count(fetchAll($query)); ?></h2>
                                    </div>
                                     <small>Click to check them out now!</small>
                                    <?php }
                                  ?>           

                                    <?php
                                        }else{
                                          echo "No Finished Bookings Yet!";
                                        }
                                    ?>                                 
                                </div>
                            </a>
                            </div>
                        </div>


                        <div class="col-md-4" style="margin-top: 20px;">
                            <div class="single-report mb-xs-30">
                                <a href="finishedEvents.php">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                    <div class="icon"><i class="ti-check"></i></div>

                                  <?php
                                       
                                        $query = "SELECT * from `events` where `status` = 'finished'";
                                        if(count(fetchAll($query))>0){
                                    ?>


                                  <?php
                                  if(count(fetchAll($query))==1){
                                    ?>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Finished Event</h4>
                                       
                                    </div>
                                     <div class="d-flex justify-content-between pb-2">
                                        <h2><?php echo count(fetchAll($query)); ?></h2>
                                    </div>
                                     <small>Click to check it out now!</small>

                                  <?php
                                    }else{
                                  ?>
                                       <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Finished Events</h4>
                                       
                                    </div>
                                     <div class="d-flex justify-content-between pb-2">
                                        <h2><?php echo count(fetchAll($query)); ?></h2>
                                    </div>
                                     <small>Click to check them out now!</small>
                                    <?php }
                                  ?>           

                                    <?php
                                        }else{
                                          echo "No Finished Events Yet!";
                                        }
                                    ?>                                 
                                </div>
                            </a>
                            </div>
                        </div>



                        <div class="col-md-4" style="margin-top: 20px;">
                            <div class="single-report mb-xs-30">
                                <a href="canceledEvents.php">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                    <div class="icon"><i class="ti-na"></i></div>
   <?php
                                       
                                        $query = "SELECT * from `events` where `status` = 'canceled'";
                                        if(count(fetchAll($query))>0){
                                    ?>



                                  <?php
                                  if(count(fetchAll($query))==1){
                                    ?>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Canceled Event</h4>
                                       
                                    </div>
                                     <div class="d-flex justify-content-between pb-2">
                                        <h2><?php echo count(fetchAll($query)); ?></h2>
                                    </div>
                                     <small>Click to check it out now!</small>

                                  <?php
                                    }else{
                                  ?>
                                       <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Canceled Events</h4>
                                       
                                    </div>
                                     <div class="d-flex justify-content-between pb-2">
                                        <h2><?php echo count(fetchAll($query)); ?></h2>
                                    </div>
                                     <small>Click to check them out now!</small>
                                    <?php }
                                  ?>           

                                    <?php
                                        }else{
                                          echo "No Canceled Events Yet!";
                                        }
                                    ?>                                 
                                </div>
                            </a>
                            </div>
                        </div>


                        <div class="col-md-4" style="margin-top: 20px;">
                            <div class="single-report mb-xs-30">
                                <a href="canceledBookings.php">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                    <div class="icon"><i class="ti-na"></i></div>
     <?php
                                       
                                        $query = "SELECT * from `bookings` where `status` = 'canceled'";
                                        if(count(fetchAll($query))>0){
                                    ?>



                                  <?php
                                  if(count(fetchAll($query))==1){
                                    ?>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Canceled Booking</h4>
                                       
                                    </div>
                                     <div class="d-flex justify-content-between pb-2">
                                        <h2><?php echo count(fetchAll($query)); ?></h2>
                                    </div>
                                     <small>Click to check it out now!</small>

                                  <?php
                                    }else{
                                  ?>
                                       <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Canceled Booking</h4>
                                       
                                    </div>
                                     <div class="d-flex justify-content-between pb-2">
                                        <h2><?php echo count(fetchAll($query)); ?></h2>
                                    </div>
                                     <small>Click to check them out now!</small>
                                    <?php }
                                  ?>           

                                    <?php
                                        }else{
                                          echo "No Canceled Bookings Yet!";
                                        }
                                    ?>                                 
                                </div>
                            </a>
                            </div>
                        </div>


  <div class="col-md-4" style="margin-top: 20px;">
                            <div class="single-report mb-xs-30">
                                <a href="customerDeactivated.php">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                    <div class="icon"><i class="ti-na"></i></div>

                                     <?php

                                        $query = "SELECT * from `users` where `user_type` = 'customer' && `status`='deactivated'";
                                        if(count(fetchAll($query))>0){
                                    ?>

                                  <?php
                                  if(count(fetchAll($query))==1){
                                    ?>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Deactivated Customer</h4>
                                       
                                    </div>
                                     <div class="d-flex justify-content-between pb-2">
                                        <h2><?php echo count(fetchAll($query)); ?></h2>
                                    </div>
                                     <small>Click to check it out now!</small>

                                  <?php
                                    }else{
                                  ?>
                                       <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Deactivated Customers</h4>
                                       
                                    </div>
                                     <div class="d-flex justify-content-between pb-2">
                                        <h2><?php echo count(fetchAll($query)); ?></h2>
                                    </div>
                                     <small>Click to check them out now!</small>
                                    <?php }
                                  ?>           

                                    <?php
                                        }else{
                                          echo "No Deactivated Customers Yet!";
                                        }
                                    ?>                                 
                                </div>
                            </a>
                            </div>
                        </div>


                            <div class="col-md-4" style="margin-top: 20px;">
                            <div class="single-report mb-xs-30">
                                <a href="photographerDeactivated.php">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                    <div class="icon"><i class="ti-na"></i></div>

                                     <?php

                                        $query = "SELECT * from `users` where `user_type` = 'photographer' && `status`='deactivated'";
                                        if(count(fetchAll($query))>0){
                                    ?>

                                  <?php
                                  if(count(fetchAll($query))==1){
                                    ?>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Deactivated photographer</h4>
                                       
                                    </div>
                                     <div class="d-flex justify-content-between pb-2">
                                        <h2><?php echo count(fetchAll($query)); ?></h2>
                                    </div>
                                     <small>Click to check it out now!</small>

                                  <?php
                                    }else{
                                  ?>
                                       <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Deactivated Photographers</h4>
                                       
                                    </div>
                                     <div class="d-flex justify-content-between pb-2">
                                        <h2><?php echo count(fetchAll($query)); ?></h2>
                                    </div>
                                     <small>Click to check them out now!</small>
                                    <?php }
                                  ?>           

                                    <?php
                                        }else{
                                          echo "No Deactivated Photographers Yet!";
                                        }
                                    ?>                                 
                                </div>
                            </a>
                            </div>
                        </div>











                    </div>
                </div>
                <!-- sales report area end -->
              
           
            </div>
        </div>
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

    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- all line chart activation -->
    <script src="../filmme/assets/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="../filmme/assets/js/pie-chart.js"></script>
    <!-- others plugins -->
    <script src="../filmme/assets/js/plugins.js"></script>
    <script src="../filmme/assets/js/scripts.js"></script>
</body>

</html>

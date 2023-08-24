<?php  

    include('../functions/functions.php');

    if (!isLoggedIn()) {
      header('location: ../index.php');
    }

    if (!isphotographer()) {
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
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/images/icon/logo.png">
    <link rel="icon" type="image/png" href="../assets/images/icon/logo.png">

    <!-- Title Page-->
    <title>Film Me | Bookings</title>
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
                    <a href="photographerHome.php"><img src="../images/logo2.png" alt="logo" width="40"><h5>Film Me</h5></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                           
                            <li ><a href="photographerHome.php"><i class="ti-dashboard"></i> <span>dashboard</span></a></li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-calendar"></i><span>my events</span></a>
                                <ul class="collapse">
                                    <li><a href="pendingEvents.php">Pending</a></li>
                                    <li><a href="bookedEvents.php">Booked</a></li>
                                    <li><a href="finishedEvents.php">Finished</a></li>
                                    <li><a href="canceledEvents.php">Canceled</a></li>
                                </ul>
                            </li>
                            <li class="active"><a href="bookings.php"><i class="ti-book"></i> <span>my bookings</span></a></li>

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
                                <i class="ti-comment dropdown-toggle" data-toggle="dropdown">
                                    
                                    <?php
                                        $query = "SELECT * from `customertophotographermsg` where `status` = 'unread' && `photographer_id`='".$_SESSION['user']['user_id']."' order by `date_sent` DESC";
                                        if(count(fetchAll($query))>0){
                                    ?>
                                        <span><?php echo count(fetchAll($query)); ?></span>
                                  
                                    <?php } ?>
                                </i>
                                <div class="dropdown-menu bell-notify-box notify-box">

                                    <?php
                                        $query = "SELECT * from `customertophotographermsg` where `status` = 'unread' && `photographer_id`='".$_SESSION['user']['user_id']."' order by `date_sent` DESC";
                                        if(count(fetchAll($query))>0){
                                    ?>
                                    <span class="notify-title">You have <?php echo count(fetchAll($query)); ?> new customer message</span>

                                   <?php } ?>

                                    <div class="nofity-list">
                                         <div class="scroll2">

                                   <?php 
                                        $query = "SELECT * from `customertophotographermsg` where `photographer_id`='".$_SESSION['user']['user_id']."' order by `date_sent` DESC";
                                            if(count(fetchAll($query))>0){
                                              foreach(fetchAll($query) as $i){
                                    ?>
                                      
                                        <?php if ($i['status']=='unread') { ?>

                                       
                                        <a class="notifi__item" href="customerMsg.php?customer_id=<?php echo $i['customer_id'] ?>&&msg_id=<?php echo $i['msg_id'] ?>">
                                            <div class="bg-c1 img-cir img-40">
                                                <i class="ti-email"></i>
                                            </div>
                                            <div class="content">
                                                <small style="color: black">From customer: <?php echo $i['customer_name'] ?></small>
                                                    <p><b>You receive a new message</b></p>
                                                <small style="color: black;"><?php echo date('F j, Y / g:i a',strtotime($i['date_sent'])) ?></small>
                                            </div>
                                        </a>
                                             

                                        <?php  }else if ($i['status']=='read') { ?>

                                        
                                       <a class="notifi__item" href="customerMsg.php?customer_id=<?php echo $i['customer_id'] ?>&&msg_id=<?php echo $i['msg_id'] ?>">
                                            <div class="bg-c1 img-cir img-40" style="color: gray">
                                                <!-- <i class="ti-email"></i> -->
                                            </div>
                                            <div class="content">
                                                  <small style="color: gray">From customer: <?php echo $i['customer_name'] ?></small>
                                                    <p style="color: gray">Message opened</p>
                                                <small style="color: gray;"><?php echo date('F j, Y / g:i a',strtotime($i['date_sent'])) ?></small>
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
                                    </div>
                                </div>
                            </li>


                             <li class="dropdown">
                                <i class="fa fa-envelope-o dropdown-toggle" data-toggle="dropdown">
                                    
                                    <?php
                                        $query = "SELECT * from `photographerandcustomermsgtoadmin` where `photographer_id` = '".$_SESSION['user']['user_id']."' && `status` = 'unread' && `notif_status` = 'admin'";
                                        if(count(fetchAll($query))>0){
                                    ?>
                                        <span><?php echo count(fetchAll($query)); ?></span>
                                  
                                    <?php } ?>
                                </i>
                                <div class="dropdown-menu bell-notify-box notify-box">

                                   <?php
                                        $query = "SELECT * from `photographerandcustomermsgtoadmin` where `photographer_id` = '".$_SESSION['user']['user_id']."' && `status` = 'unread' && `notif_status` = 'admin'";
                                        if(count(fetchAll($query))>0){
                                    ?>

                                    <span class="notify-title">You have <?php echo count(fetchAll($query)); ?> new message from admin</span>

                                   <?php } ?>

                                    <div class="nofity-list">
                                         <div class="scroll2">

                                   <?php 
                                        $query = "SELECT * from `photographerandcustomermsgtoadmin` where `photographer_id`='".$_SESSION['user']['user_id']."' && `notif_status` = 'admin' order by `date_sent` DESC";
                                            if(count(fetchAll($query))>0){
                                              foreach(fetchAll($query) as $i){
                                    ?>
                                        <?php if ($i['status']=='unread') { ?>

                                       
                                        <a class="notifi__item" href="replyMsg.php?photographer_id=<?php echo $i['photographer_id'] ?>&&msg_id=<?php echo $i['msg_id'] ?>">
                                            <div class="bg-c1 img-cir img-40">
                                                <i class="ti-email"></i>
                                            </div>
                                            <div class="content">
                                                <small style="color: black">From Admin: <?php echo $i['full_name'] ?></small>
                                                    <p><b>You receive a new message</b></p>
                                                <small style="color: black;"><?php echo date('F j, Y / g:i a',strtotime($i['date_sent'])) ?></small>
                                            </div>
                                        </a>
                                             

                                        <?php  }else if ($i['status']=='read') { ?>

                                        
                                       <a class="notifi__item" href="replyMsg.php?photographer_id=<?php echo $i['photographer_id'] ?>&&msg_id=<?php echo $i['msg_id'] ?>">
                                            <div class="bg-c1 img-cir img-40" style="background: gray">
                                                <!-- <i class="zmdi zmdi-email-open"></i> -->
                                            </div>
                                            <div class="content">
                                                  <small style="color: gray">From Admin: <?php echo $i['full_name'] ?></small>
                                                    <p style="color: gray">Message opened</p>
                                                <small style="color: gray;"><?php echo date('F j, Y / g:i a',strtotime($i['date_sent'])) ?></small>
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
                                        <div class="footer">
                                         <center><a href="messageAdmin.php">Message Admin</a></center>
                                      </div>
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
                            <h4 class="page-title pull-left">My Bookings</h4>
                            <ul class="breadcrumbs pull-left">
                                <!-- <li><a href="photographerHome.php">Home</a></li> -->
                                <li><span>Photographer</span></li>
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
                                 <a class="dropdown-item" href="photographerHome.php?logout='1'"><i class="ti-power-off"></i> Logout</a>
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
                            <div class="card-body">
                                <h4 class="header-title">My Bookings</h4>
                                <div class="data-tables datatable-primary">
                        <?php
                                             
                          $user_id = $_SESSION['user']['user_id'];                 
                          $query = "SELECT * FROM bookings WHERE photographer_id='$user_id' ORDER BY event_date ASC";
                          $result = mysqli_query($db,$query);
                        
                        ?>  

                                    <table id="dataTable2" class="text-center">
                                        <thead class="text-capitalize">
                                           <tr>
                                              <tr>
                                                   <th>Customer Name</th>
                                                  <th>Customer Contact</th>
                                                  <th>Event Name</th>
                                                  <th>Event Date</th>
                                                  <th>Event Price</th>
                                                  <th>Date</th>
                                                  <th>Status</th>
                                                  <th>Option</th>
                                                </tr>
                                            </tr>
                                        </thead>
                                        <tbody>
                         <?php
                            if($result){
                              while($res = mysqli_fetch_array($result)) {     
                                echo "<tr>";
                                  echo "<td>".$res['customer_name']."</td>";
                                  echo "<td>".$res['customer_contact']."</td>";
                                  echo "<td>".$res['event_name']."</td>";
                                  echo "<td>".date('F j, Y',strtotime($res['event_date']))."</td>";
                                   echo "<td>&#8369;".$res['event_price']."</td>";

                                if ($res['status']=='booked') {
                                    echo "<td><span style=\"background: blue; color: white\">Booked On:</span> ".date('F j, Y / g:i a',strtotime($res['status_date']))."</td>"; 
                                }else if ($res['status']=='finished') {
                                     echo "<td><span style=\"background: #2ecc71; color: white\">Finished On:</span> ".date('F j, Y / g:i a',strtotime($res['status_date']))."</td>"; 
                                }else if ($res['status']=='canceled'){
                                    echo "<td><span style=\"background: red; color: white\">Canceled On:</span> ".date('F j, Y / g:i a',strtotime($res['status_date']))."</td>"; 
                                }

                                if ($res['status']=='booked') {
                                     echo "<td style=\"color: blue;\">".$res['status']."</td>";
                                     echo "<td class=\"text-center\">
                                      <a class=\"btn btn-outline-info btn-sm btn-block\" href=\"viewBooking.php?booking_id=$res[booking_id]&&customer_id=$res[customer_id]&&event_id=$res[event_id]\">View</a>
                                       <a class=\"btn btn-outline-success btn-sm btn-block\" href=\"sendmsgtocustomer.php?event_id=$res[event_id]&&user_id=$res[customer_id]\">Message</a>
                                      <a class=\"btn btn-outline-danger btn-sm btn-block\" href=\"cancelBooking.php?booking_id=$res[booking_id]&&customer_id=$res[customer_id]&&event_id=$res[event_id]\" onClick=\"return confirm('Are you sure you want to cancel this booking? Once canceled it cannot be undone' )\">Cancel</a>
                                       </td>";
                                }else if ($res['status']=='finished') {
                                     echo "<td style=\"color: #2ecc71;\">".$res['status']."</td>";
                                     echo "<td class=\"text-center\">
                                      <a class=\"btn btn-outline-info btn-sm btn-block\" href=\"viewBooking.php?booking_id=$res[booking_id]&&customer_id=$res[customer_id]&&event_id=$res[event_id]\">View</a>
                                       <a class=\"btn btn-outline-success btn-sm btn-block\" href=\"sendmsgtocustomer.php?event_id=$res[event_id]&&user_id=$res[customer_id]\">Message</a>
                                       </td>";
                                }else{
                                  echo "<td style=\"color: red;\">".$res['status']."</td>";
                                  echo "<td class=\"text-center\">
                                        <a class=\"btn btn-outline-danger btn-sm btn-block\" href=\"deleteBooking.php?booking_id=$res[booking_id]&&customer_id=$res[customer_id]&&event_id=$res[event_id]\" onClick=\"return confirm('Are you sure you want to delete this booking?' )\">Delete</a>
                                         <a class=\"btn btn-outline-success btn-sm btn-block\" href=\"sendmsgtocustomer.php?event_id=$res[event_id]&&user_id=$res[customer_id]\">Message</a>
                                  </td>";

                                }

                                 echo "</tr>";                                   
                              }
                            }?>
                                        </tbody>
                                    </table>
                                </div>
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

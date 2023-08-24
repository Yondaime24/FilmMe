<?php  
  include('../functions/functions.php');

 $event_id = $_GET['event_id'];
 $customer_id = $_GET['customer_id'];
 $photographer_id = $_GET['photographer_id'];

 $query="UPDATE `events` SET `status`='pending', `photographer_id`='', `process_date`='0000-00-00 00:00:00', `notif_status`='' WHERE event_id='$event_id'";
 $query_run = mysqli_query($db, $query);


     if ($query_run) {
      echo "<script>alert('Event Booking Canceled!!!')</script>";
      echo "<script>window.open('adminPanel.php','_self')</script>";
     }else{

      echo "<script>alert('Update Failed!')</script>";
      // echo "<script>window.open('photographerHome.php','_self')</script>";

     }

    include('../functions/functions.php');

    if (!isLoggedIn()) {
      header('location: ../index.php');
    }

    if (!isAdmin()) {
      $_SESSION['msg'] = "You must log in first";
      header('location: ../index.php');
    }


?>
<?php
    
    include("../functions/functions.php");

    $booking_id = $_GET['booking_id'];
    $event_id = $_GET['event_id'];

    $query="UPDATE `events` SET `status`='finished' WHERE event_id='$event_id'";
    $query_run = mysqli_query($db, $query);

    $query2="UPDATE `events` SET `date_added`=CURRENT_TIMESTAMP WHERE event_id='$event_id'";
    $query_run2 = mysqli_query($db, $query2);

    $query3="UPDATE `bookings` SET `status`='finished' WHERE booking_id='$booking_id'";
    $query_run3 = mysqli_query($db, $query3);

    $query4="UPDATE `bookings` SET `status_date`=CURRENT_TIMESTAMP WHERE booking_id='$booking_id'";
    $query_run4 = mysqli_query($db, $query4);

    if ($query_run && $query_run2) {

       echo "<script>alert('Booking data has been finished successfully!')</script>";
       echo "<script>window.open('adminPanel.php','_self')</script>";

     }else{

      echo "<script>alert('Failed')</script>".mysqli_error($db);

     }

        mysqli_close($db);


if (!isLoggedIn()) {
  header('location: ../index.php');
}

  if (!isAdmin()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../index.php');
  }
    
?>
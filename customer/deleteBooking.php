<?php
    
    include("../functions/functions.php");

    $booking_id = $_GET['booking_id'];

    $query = "DELETE FROM `bookings` WHERE `booking_id` = $booking_id;";

     if (mysqli_query($db, $query)) {

        echo "<script>alert('Booking data has been deleted successfully!')</script>";
        echo "<script>window.open('userHome.php','_self')</script>";
            
        }else{

        echo "<script>alert('Failed')</script>".mysqli_error($db);

        }

        mysqli_close($db);


    if (!isLoggedIn()) {
      header('location: ../index.php');
    }

    if (!isCustomer()) {
      $_SESSION['msg'] = "You must log in first";
      header('location: ../index.php');
    }
    
?>
<?php
    
    include("../functions/functions.php");

    $event_id = $_GET['event_id'];

    $query = "DELETE FROM `events` WHERE `event_id` = $event_id;";

     if (mysqli_query($db, $query)) {

        echo "<script>alert('Event data has been deleted successfully!')</script>";
        echo "<script>window.open('myEvents.php','_self')</script>";
            
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
<?php
    
    include("../functions/functions.php");

    $user_id = $_GET['user_id'];

    $query="UPDATE `users` SET `user_type`='photographer' WHERE user_id='$user_id'";
    $query_run = mysqli_query($db, $query);

    if ($query_run) {

       echo "<script>alert('New photographer has been added successfully!')</script>";
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
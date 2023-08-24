<?php 

session_start();

// connect to database
$db = mysqli_connect('localhost', 'bisucala_filmme', 'F%-xMDx*%.n$', 'bisucala_filmme');

// variable declaration
// $username = "bisucala_filmme";
// $password = "F%-xMDx*%.n$";
// $email    = "";
// $errors   = array(); 
$username = "";
$email    = "";
$errors   = array(); 

// Admin
  define('DBINFO', 'mysql:host=localhost;dbname=bisucala_filmme');
    define('DBUSER','bisucala_filmme');
    define('DBPASS','F%-xMDx*%.n$');

    function fetchAll($query){
        $con = new PDO(DBINFO, DBUSER, DBPASS);
        $stmt = $con->query($query);
        return $stmt->fetchAll();
    }
    function performQuery($query){
        $con = new PDO(DBINFO, DBUSER, DBPASS);
        $stmt = $con->prepare($query);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
// End admin

        // call the register() function if register_btn is clicked
    if (isset($_POST['registerBtn'])) {
        register();
    }

        // call the register() function if register_btn is clicked
    if (isset($_POST['registerBtn2'])) {
        register2();
    }


    // REGISTER USER
function register(){
    // call these variables with the global keyword to make them available in function
    global $db, $errors, $username, $email;

    // receive all input values from the form. Call the e() function
    // defined below to escape form values
    $fname = e($_POST['fname']);
    $mname = e($_POST['mname']);
    $lname = e($_POST['lname']);
    $age = e($_POST['age']);
    $birthday = e($_POST['birthday']);
    $gender = e($_POST['gender']);
    $email_address = e($_POST['email_address']);
    $contact_number = e($_POST['contact_number']);
    $residential_address = e($_POST['residential_address']);
    $username = e($_POST['username']);
    $password = e($_POST['password']);
    $confirm_password = e($_POST['confirm_password']);
    // $photo = e($_POST['photo']);

    move_uploaded_file($_FILES["photo"]["tmp_name"],"../images/" . $_FILES["photo"]["name"]);
    $photo=$_FILES["photo"]["name"];

    // form validation: ensure that the form is correctly filled
    if (empty($username)) { 
        array_push($errors, "Username is required"); 
    }
    if (empty($email_address)) { 
        array_push($errors, "Email is required"); 
    }
    if (empty($password)) { 
        array_push($errors, "Password is required"); 
    }
    if ($password != $confirm_password) {
        array_push($errors, "The two passwords do not match");
    }

     $sqlCheckUsername = "SELECT * FROM `users` WHERE `username` LIKE '$username' ";
     $usernameQuery = mysqli_query($db,$sqlCheckUsername);

     $sqlCheckEmail = "SELECT * FROM `users` WHERE `email_address` LIKE '$email_address' ";
     $emailQuery = mysqli_query($db,$sqlCheckEmail);

     if(mysqli_num_rows($usernameQuery)>0){

            echo "<script>alert('Username is Already Used, Type Another One')</script>";
            echo "<script>window.open('cusreg.php','_self')</script>";

     } else if (mysqli_num_rows($emailQuery)>0) {

            echo "<script>alert('This Email is Already Registered Type Another One')</script>";
            echo "<script>window.open('cusreg.php','_self')</script>";
            
    }

    // register user if there are no errors in the form
    else if (count($errors) == 0) {
        $password = md5($password); //encrypt the password before saving in the database

        if (isset($_POST['user_type'])) {
            $user_type = e($_POST['user_type']);
            $query = "INSERT INTO users (fname, mname, lname, age, birthday, gender, email_address, contact_number, residential_address, username, password, date_registered, status, photo, user_type)
                VALUES('$fname', '$mname', '$lname', '$age', '$birthday', '$gender', '$email_address', '$contact_number', '$residential_address', '$username', '$password', CURRENT_TIMESTAMP, 'active', '$photo', '$user_type')";
            mysqli_query($db, $query);

            // $_SESSION['success']  = "New user successfully created!!";
            // header('location: home.php');
            echo "<script>alert('Account Successfully Created')</script>";
            echo "<script>window.open('login.php','_self')</script>";

        }else{
            $query = "INSERT INTO users (fname, mname, lname, age, birthday, gender, email_address, contact_number, residential_address, username, password, date_registered, status, photo, user_type)
                VALUES('$fname', '$mname', '$lname', '$age', '$birthday', '$gender', '$email_address', '$contact_number', '$residential_address', '$username', '$password', CURRENT_TIMESTAMP, 'active', '$photo', 'customer')";
            mysqli_query($db, $query);

            // get id of the created user
            $logged_in_user_id = mysqli_insert_id($db);

            $_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
            $_SESSION['success']  = "Welcome";
            echo "<script>alert('Account Successfully Created')</script>";
            echo "<script>window.open('login.php','_self')</script>";
            // header('location: index.php');               
        }
    }
}

    // REGISTER USER
function register2(){
    // call these variables with the global keyword to make them available in function
    global $db, $errors, $username, $email;

    // receive all input values from the form. Call the e() function
    // defined below to escape form values
    $fname = e($_POST['fname']);
    $mname = e($_POST['mname']);
    $lname = e($_POST['lname']);
    $age = e($_POST['age']);
    $birthday = e($_POST['birthday']);
    $gender = e($_POST['gender']);
    $email_address = e($_POST['email_address']);
    $contact_number = e($_POST['contact_number']);
    $residential_address = e($_POST['residential_address']);
    $username = e($_POST['username']);
    $password = e($_POST['password']);
    $confirm_password = e($_POST['confirm_password']);
    // $photo = e($_POST['photo']);

    move_uploaded_file($_FILES["photo"]["tmp_name"],"../images/" . $_FILES["photo"]["name"]);
    $photo=$_FILES["photo"]["name"];

    move_uploaded_file($_FILES["sample1"]["tmp_name"],"../images/" . $_FILES["sample1"]["name"]);
    $sample1=$_FILES["sample1"]["name"];

    move_uploaded_file($_FILES["sample2"]["tmp_name"],"../images/" . $_FILES["sample2"]["name"]);
    $sample2=$_FILES["sample2"]["name"];

    move_uploaded_file($_FILES["sample3"]["tmp_name"],"../images/" . $_FILES["sample3"]["name"]);
    $sample3=$_FILES["sample3"]["name"];

    // form validation: ensure that the form is correctly filled
    if (empty($username)) { 
        array_push($errors, "Username is required"); 
    }
    if (empty($email_address)) { 
        array_push($errors, "Email is required"); 
    }
    if (empty($password)) { 
        array_push($errors, "Password is required"); 
    }
    if ($password != $confirm_password) {
        array_push($errors, "The two passwords do not match");
    }

     $sqlCheckUsername = "SELECT * FROM `users` WHERE `username` LIKE '$username' ";
     $usernameQuery = mysqli_query($db,$sqlCheckUsername);

     $sqlCheckEmail = "SELECT * FROM `users` WHERE `email_address` LIKE '$email_address' ";
     $emailQuery = mysqli_query($db,$sqlCheckEmail);

     if(mysqli_num_rows($usernameQuery)>0){

            echo "<script>alert('Username is Already Used, Type Another One')</script>";
            echo "<script>window.open('pvreg.php','_self')</script>";

     } else if (empty($sample1)) {
        
         echo "<script>alert('Please Add 3 Sample Pictures!')</script>";
         echo "<script>window.open('pvreg.php','_self')</script>";

     } else if (empty($sample2)) {
        
         echo "<script>alert('Please Add 3 Sample Pictures!')</script>";
         echo "<script>window.open('pvreg.php','_self')</script>";

     }else if (empty($sample3)) {
        
         echo "<script>alert('Please Add 3 Sample Pictures!')</script>";
         echo "<script>window.open('pvreg.php','_self')</script>";

     }else if (mysqli_num_rows($emailQuery)>0) {

            echo "<script>alert('This Email is Already Registered Type Another One')</script>";
            echo "<script>window.open('pvreg.php','_self')</script>";
            
    }

    // register user if there are no errors in the form
    else if (count($errors) == 0) {
        $password = md5($password); //encrypt the password before saving in the database

        if (isset($_POST['user_type'])) {
            $user_type = e($_POST['user_type']);
            $query = "INSERT INTO users (fname, mname, lname, age, birthday, gender, email_address, contact_number, residential_address, username, password, date_registered, status, photo, sample1, sample2, sample3, user_type)
                VALUES('$fname', '$mname', '$lname', '$age', '$birthday', '$gender', '$email_address', '$contact_number', '$residential_address', '$username', '$password', CURRENT_TIMESTAMP, 'active', '$photo', '$sample1', '$sample2', '$sample3', '$user_type')";
            mysqli_query($db, $query);

            // $_SESSION['success']  = "New user successfully created!!";
            // header('location: home.php');
            echo "<script>alert('Account Successfully Created')</script>";
            echo "<script>window.open('login.php','_self')</script>";

        }else{
            $query = "INSERT INTO users (fname, mname, lname, age, birthday, gender, email_address, contact_number, residential_address, username, password, date_registered, status, photo, sample1, sample2, sample3, user_type)
                VALUES('$fname', '$mname', '$lname', '$age', '$birthday', '$gender', '$email_address', '$contact_number', '$residential_address', '$username', '$password', CURRENT_TIMESTAMP, 'active', '$photo', '$sample1', '$sample2', '$sample3', 'pending')";
            mysqli_query($db, $query);

            // get id of the created user
            $logged_in_user_id = mysqli_insert_id($db);

            $_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
            $_SESSION['success']  = "Welcome";
            echo "<script>alert('Account Successfully Created')</script>";
            echo "<script>window.open('login.php','_self')</script>";
            // header('location: index.php');               
        }
    }
}


// return user array from their id
function getUserById($id){
    global $db;
    $query = "SELECT * FROM users WHERE user_id=" . $id;
    $result = mysqli_query($db, $query);

    $users = mysqli_fetch_assoc($result);
    return $users;
}

// escape string
function e($val){
    global $db;
    return mysqli_real_escape_string($db, trim($val));
}

function display_error() {
    global $errors;

    if (count($errors) > 0){
        echo '<div class="error">';
            foreach ($errors as $error){
                echo $error .'<br>';
            }
        echo '</div>';
    }
}   

function isLoggedIn()
{
    if (isset($_SESSION['user'])) {
        return true;
    }else{
        return false;
    }
}

// log user out if logout button clicked
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['user']);
    header("location: ../index.php");
}

// call the login() function if register_btn is clicked
if (isset($_POST['loginBtn'])) {
    login();
}

// LOGIN USER
function login(){
    global $db, $username, $errors;

    // grap form values
    $username = e($_POST['username']);
    $password = e($_POST['password']);

    // make sure form is filled properly
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    // attempt login if no errors on form
    if (count($errors) == 0) {
        $password = md5($password);

        $query = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
        $results = mysqli_query($db, $query);

        if (mysqli_num_rows($results) == 1) { // user found
            // check if user is admin or user
            $logged_in_user = mysqli_fetch_assoc($results);
            if ($logged_in_user['user_type'] == 'admin') {

                $_SESSION['user'] = $logged_in_user;
                $_SESSION['success']  = "You are now logged in";
                header('location: ../admin/adminPanel.php');         
            }else if ($logged_in_user['user_type'] == 'photographer' && $logged_in_user['status'] == 'active') {
                $_SESSION['user'] = $logged_in_user;
                $_SESSION['success']  = "Welcome";
                header('location: ../photographer/photographerHome.php');
            }else if ($logged_in_user['user_type'] == 'pending') {
                $_SESSION['user'] = $logged_in_user;
                $_SESSION['success']  = "Welcome";
                header('location: accountPending.php');
            }else if ($logged_in_user['status'] == 'deactivated') {
                $_SESSION['user'] = $logged_in_user;
                $_SESSION['success']  = "Welcome";
                header('location: deactivatedAccount.php');
            }else{
                $_SESSION['user'] = $logged_in_user;
                $_SESSION['success']  = "Welcome";
                header('location: ../customer/userHome.php');
            }
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}

function isAdmin()
{
    if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
        return true;
    }else{
        return false;
    }
}

function isCustomer()
{
    if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'customer' ) {
        return true;
    }else{
        return false;
    }
}

function isphotographer()
{
    if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'photographer' ) {
        return true;
    }else{
        return false;
    }
}



if (isset($_POST['editProfile'])) {
    profileEdit();
}

function profileEdit(){

    global $db, $errors, $username, $email;

    $user_id = $_POST['user_id'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];
    $residential_address = $_POST['residential_address'];
    $email_address = $_POST['email_address'];
    $contact_number = $_POST['contact_number'];

    $query="UPDATE `users` SET `fname`='$fname', `mname`='$mname', `lname`='$lname', `age`='$age', `birthday`='$birthday', `gender`='$gender', `residential_address`='$residential_address', `email_address`='$email_address', `contact_number`='$contact_number' WHERE user_id='$user_id'";
    $query_run = mysqli_query($db, $query);


     if ($query_run) {
      echo "<script>alert('Update Success!!!')</script>";
      echo "<script>window.open('myProfile.php','_self')</script>";
     }else{

      echo "<script>alert('Update Failed!')</script>";
      echo "<script>window.open('myProfile.php','_self')</script>";

     }
        
}

if (isset($_POST['updatePhoto'])) {
    photoEdit();
}

function photoEdit(){

    global $db, $errors, $username, $email;

    $user_id = $_POST['user_id'];
    $photo = $_FILES["photo"]['name'];

    
    if (empty($photo)) {
         echo "<script>alert('Please Select New Profile Picture!')</script>";
         echo "<script>window.open('changePhoto.php','_self')</script>";
    }else{

     $query="UPDATE `users` SET `photo`='$photo' WHERE user_id='$user_id'";
     $query_run = mysqli_query($db, $query);

    }


     if ($query_run) {
      move_uploaded_file($_FILES["photo"]["tmp_name"],"../images/".$_FILES["photo"]["name"]);  
      echo "<script>alert('Update Success!!!')</script>";
      echo "<script>window.open('userHome.php','_self')</script>";
     }else{

      echo "<script>alert('Update Failed!')</script>";
      echo "<script>window.open('userHome.php','_self')</script>";

     }
        
}


if (isset($_POST['updateAdminPhoto'])) {
    updateadminphoto();
}

function updateadminphoto(){

    global $db, $errors, $username, $email;

    $user_id = $_POST['user_id'];
    $photo = $_FILES["photo"]['name'];

    
    if (empty($photo)) {
         echo "<script>alert('Please Select New Profile Picture!')</script>";
         echo "<script>window.open('changePhoto.php','_self')</script>";
    }else{

     $query="UPDATE `users` SET `photo`='$photo' WHERE user_id='$user_id'";
     $query_run = mysqli_query($db, $query);

    }


     if ($query_run) {
      move_uploaded_file($_FILES["photo"]["tmp_name"],"../images/".$_FILES["photo"]["name"]);  
      echo "<script>alert('Update Success!!!')</script>";
      echo "<script>window.open('adminPanel.php','_self')</script>";
     }else{

      echo "<script>alert('Update Failed!')</script>";
      echo "<script>window.open('adminPanel.php','_self')</script>";

     }
        
}

if (isset($_POST['updatePhoto2'])) {
    photoEdit2();
}

function photoEdit2(){

    global $db, $errors, $username, $email;

    $user_id = $_POST['user_id'];
    $photo = $_FILES["photo"]['name'];

    
    if (empty($photo)) {
         echo "<script>alert('Please Select New Profile Picture!')</script>";
         echo "<script>window.open('changePhoto.php','_self')</script>";
    }else{

     $query="UPDATE `users` SET `photo`='$photo' WHERE user_id='$user_id'";
     $query_run = mysqli_query($db, $query);

    }


     if ($query_run) {
      move_uploaded_file($_FILES["photo"]["tmp_name"],"../images/".$_FILES["photo"]["name"]);  
      echo "<script>alert('Update Success!!!')</script>";
      echo "<script>window.open('photographerHome.php','_self')</script>";
     }else{

      echo "<script>alert('Update Failed!')</script>";
      echo "<script>window.open('photographerHome.php','_self')</script>";

     }
        
}


if (isset($_POST['updateUserPass'])) {
    userpassEdit();
}

function userpassEdit(){

    global $db, $errors, $username, $email;

    
    $user_id = $_POST['user_id'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $password = md5($password);

    $query="UPDATE `users` SET  `username`='$username', `password`='$password' WHERE user_id='$user_id'";
    $query_run = mysqli_query($db, $query);

     if ($query_run) {
      echo "<script>alert('Update Success!!!')</script>";
      echo "<script>window.open('userHome.php','_self')</script>";
     }else{

      echo "<script>alert('Update Failed!')</script>";
      echo "<script>window.open('userHome.php','_self')</script>";

     }
        
}

if (isset($_POST['updateAdminUserPass'])) {
    updateadminuserphoto();
}

function updateadminuserphoto(){

    global $db, $errors, $username, $email;

    
    $user_id = $_POST['user_id'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $password = md5($password);

    $query="UPDATE `users` SET  `username`='$username', `password`='$password' WHERE user_id='$user_id'";
    $query_run = mysqli_query($db, $query);

     if ($query_run) {
      echo "<script>alert('Update Success!!!')</script>";
      echo "<script>window.open('adminPanel.php','_self')</script>";
     }else{

      echo "<script>alert('Update Failed!')</script>";
      echo "<script>window.open('adminPanel.php','_self')</script>";

     }
        
}

if (isset($_POST['updateUserPass2'])) {
    userpassEdit2();
}

function userpassEdit2(){

    global $db, $errors, $username, $email;

    
    $user_id = $_POST['user_id'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $password = md5($password);

    $query="UPDATE `users` SET  `username`='$username', `password`='$password' WHERE user_id='$user_id'";
    $query_run = mysqli_query($db, $query);

     if ($query_run) {
      echo "<script>alert('Update Success!!!')</script>";
      echo "<script>window.open('photographerHome.php','_self')</script>";
     }else{

      echo "<script>alert('Update Failed!')</script>";
      echo "<script>window.open('photographerHome.php','_self')</script>";

     }
        
}

if (isset($_POST['customerMessage'])) {
    customermsg();
}

function customermsg(){

    global $db, $errors, $username, $email;

    $user_id = $_POST['user_id'];
    $photographer_id = $_POST['photographer_id'];
    $name = $_POST['name'];
    $contact_number = $_POST['contact_number'];
    $email_address = $_POST['email_address'];
    $message = $_POST['message'];

        $query = "INSERT INTO admintophotographermsg (`photographer_id`, `user_id`, `msg_from`, `contact_number`, `email_address`, `message`, `date_sent`, `status`)VALUES('$photographer_id', '$user_id', '$name', '$contact_number', '$email_address', '$message', CURRENT_TIMESTAMP, 'unread')";
        $query_run = mysqli_query($db, $query);

        echo "<script>alert('Message has been sent succesfully!')</script>";
        echo "<script>window.open('photographersList.php','_self')</script>";
        
}

if (isset($_POST['addEventBtn'])) {
    addevent();
}

function addevent(){

    global $db, $errors, $username, $email;

    $user_id = $_POST['user_id'];
    $customer_name = $_POST['customer_name'];
    $contact_number = $_POST['contact_number'];
    $residential_address = $_POST['residential_address'];
    $email_address = $_POST['email_address'];
    $event_name = $_POST['event_name'];
    $event_date = $_POST['event_date'];
    $event_loc = $_POST['event_loc'];
    $event_price = $_POST['event_price'];

        $query = "INSERT INTO events (`user_id`, `customer_name`, `contact_number`, `residential_address`, `email_address`, `event_name`, `event_date`, `event_loc`, `event_price`, `status`, `date_added`)VALUES('$user_id', '$customer_name', '$contact_number', '$residential_address', '$email_address', '$event_name', '$event_date', '$event_loc', '$event_price', 'pending', CURRENT_TIMESTAMP)";
        $query_run = mysqli_query($db, $query);

        echo "<script>alert('Event Has Been Added Successfully!')</script>";
        echo "<script>window.open('userHome.php','_self')</script>";
        
}

if (isset($_POST['addEventBtn2'])) {
    addevent2();
}

function addevent2(){

    global $db, $errors, $username, $email;

    $user_id = $_POST['user_id'];
    $customer_name = $_POST['customer_name'];
    $contact_number = $_POST['contact_number'];
    $residential_address = $_POST['residential_address'];
    $email_address = $_POST['email_address'];
    $event_name = $_POST['event_name'];
    $event_date = $_POST['event_date'];
    $event_loc = $_POST['event_loc'];
    $event_price = $_POST['event_price'];

        $query = "INSERT INTO events (`user_id`, `customer_name`, `contact_number`, `residential_address`, `email_address`, `event_name`, `event_date`, `event_loc`, `event_price`, `status`, `date_added`)VALUES('$user_id', '$customer_name', '$contact_number', '$residential_address', '$email_address', '$event_name', '$event_date', '$event_loc', '$event_price', 'pending', CURRENT_TIMESTAMP)";
        $query_run = mysqli_query($db, $query);

        echo "<script>alert('Event Has Been Added Successfully!')</script>";
        echo "<script>window.open('customer.php','_self')</script>";
        
}

if (isset($_POST['updateEvent'])) {
    eventUodate();
}

function eventUodate(){

    global $db, $errors, $username, $email;

    $event_id = $_POST['event_id'];
    $event_name = $_POST['event_name'];
    $event_date = $_POST['event_date'];
    $event_loc = $_POST['event_loc'];
    $event_price = $_POST['event_price'];

    $query="UPDATE `events` SET `event_name`='$event_name', `event_date`='$event_date', `event_loc`='$event_loc', `event_price`='$event_price' WHERE event_id='$event_id'";
    $query_run = mysqli_query($db, $query);


     if ($query_run) {
      echo "<script>alert('Update Success!!!')</script>";
      echo "<script>window.open('myEvents.php','_self')</script>";
     }else{

      echo "<script>alert('Update Failed!')</script>";
      echo "<script>window.open('myEvents.php','_self')</script>";

     }
        
}

if (isset($_POST['acceptEvent'])) {
    event_accept();
}

function event_accept(){

    global $db, $errors, $username, $email;

    $photographer_id = $_POST['photographer_id'];
    $customer_id = $_POST['customer_id'];
    $event_id = $_POST['event_id'];
    $photographer_name = $_POST['photographer_name'];
    $photographer_address = $_POST['photographer_address'];
    $photographer_contact = $_POST['photographer_contact'];
    $photographer_email = $_POST['photographer_email'];
    $customer_name = $_POST['customer_name'];
    $customer_address = $_POST['customer_address'];
    $customer_contact = $_POST['customer_contact'];
    $customer_email = $_POST['customer_email'];
    $event_name = $_POST['event_name'];
    $event_date = $_POST['event_date'];
    $event_loc = $_POST['event_loc'];
    $event_price = $_POST['event_price'];
    $tax_price = $_POST['tax_price'];


        $query = "INSERT INTO bookings (`photographer_id`, `customer_id`, `event_id`, `photographer_name`, `photographer_address`, `photographer_contact`, `photographer_email`, `customer_name`, `customer_address`, `customer_contact`, `customer_email`, `event_name`, `event_date`, `event_loc`, `event_price`, `status_date`, `status`)VALUES('$photographer_id', '$customer_id', '$event_id', '$photographer_name', '$photographer_address', '$photographer_contact', '$photographer_email', '$customer_name', '$customer_address', '$customer_contact', '$customer_email', '$event_name', '$event_date', '$event_loc', '$event_price', CURRENT_TIMESTAMP, 'booked')";
        $query_run = mysqli_query($db, $query);

        $query2="UPDATE `events` SET `date_added`=CURRENT_TIMESTAMP WHERE event_id='$event_id'";
        $query_run2 = mysqli_query($db, $query2);

        $query3="UPDATE `events` SET `status`='booked' WHERE event_id='$event_id'";
        $query_run3 = mysqli_query($db, $query3);

        $query4 = "INSERT INTO payment (`customer_id`, `photographer_id`, `event_id`, `amount`, `date_paid`)VALUES('$customer_id', '$photographer_id', '$event_id', '$tax_price', CURRENT_TIMESTAMP)";
        $query_run4 = mysqli_query($db, $query4);


        echo "<script>alert('Photographer booked Succesfully!')</script>";
        echo "<script>window.open('printInvoice.php?customer_id=$customer_id&&photographer_id=$photographer_id&&event_id=$event_id','_self')</script>";
        
}

if (isset($_POST['photographerMessage'])) {
    photographermsg();
}

function photographermsg(){

    global $db, $errors, $username, $email;

    $photographer_id = $_POST['photographer_id'];
    $customer_id = $_POST['customer_id'];
    $customer_name = $_POST['customer_name'];
    $photographer_name = $_POST['photographer_name'];
    $photographer_contact = $_POST['photographer_contact'];
    $photographer_email = $_POST['photographer_email'];
    $photographer_address = $_POST['photographer_address'];
    $message = $_POST['message'];


        $query = "INSERT INTO photographertocustomermsg (`photographer_id`, `customer_id`, `customer_name`, `photographer_name`, `photographer_contact`, `photographer_email`, `photographer_address`, `message`, `date_sent`, `status`)VALUES('$photographer_id', '$customer_id', '$customer_name', '$photographer_name', '$photographer_contact', '$photographer_email', '$photographer_address', '$message', CURRENT_TIMESTAMP, 'unread')";
        $query_run = mysqli_query($db, $query);

        echo "<script>alert('Message has been sent succesfully!')</script>";
        echo "<script>window.open('photographerHome.php','_self')</script>";
        
}

if (isset($_POST['custmsg'])) {
    custmsg();
}

function custmsg(){

    global $db, $errors, $username, $email;

    $photographer_id = $_POST['photographer_id'];
    $customer_id = $_POST['customer_id'];
    $photographer_name = $_POST['photographer_name'];
    $customer_name = $_POST['customer_name'];
    $customer_contact = $_POST['customer_contact'];
    $customer_email = $_POST['customer_email'];
    $customer_address = $_POST['customer_address'];
    $message = $_POST['message'];


        $query = "INSERT INTO customertophotographermsg (`photographer_id`, `customer_id`, `photographer_name`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`, `message`, `date_sent`, `status`)VALUES('$photographer_id', '$customer_id', '$photographer_name', '$customer_name', '$customer_contact', '$customer_email', '$customer_address', '$message', CURRENT_TIMESTAMP, 'unread')";
        $query_run = mysqli_query($db, $query);

        echo "<script>alert('Message has been sent succesfully!')</script>";
        echo "<script>window.open('userHome.php','_self')</script>";
        
}

if (isset($_POST['replyphotographermsg'])) {
    replymsg();
}

function replymsg(){

    global $db, $errors, $username, $email;

    $photographer_id = $_POST['photographer_id'];
    $customer_id = $_POST['customer_id'];
    $photographer_name = $_POST['photographer_name'];
    $customer_name = $_POST['customer_name'];
    $customer_contact = $_POST['customer_contact'];
    $customer_email = $_POST['customer_email'];
    $customer_address = $_POST['customer_address'];
    $message = $_POST['message'];


        $query = "INSERT INTO customertophotographermsg (`photographer_id`, `customer_id`, `photographer_name`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`, `message`, `date_sent`, `status`)VALUES('$photographer_id', '$customer_id', '$photographer_name', '$customer_name', '$customer_contact', '$customer_email', '$customer_address', '$message', CURRENT_TIMESTAMP, 'unread')";
        $query_run = mysqli_query($db, $query);

        echo "<script>alert('Message has been sent succesfully!')</script>";
        echo "<script>window.open('userHome.php','_self')</script>";
        
}


if (isset($_POST['replycustomermsg'])) {
    replymsgc();
}

function replymsgc(){

    global $db, $errors, $username, $email;

    $photographer_id = $_POST['photographer_id'];
    $customer_id = $_POST['customer_id'];
    $customer_name = $_POST['customer_name'];
    $photographer_name = $_POST['photographer_name'];
    $photographer_contact = $_POST['photographer_contact'];
    $photographer_email = $_POST['photographer_email'];
    $photographer_address = $_POST['photographer_address'];
    $message = $_POST['message'];


        $query = "INSERT INTO photographertocustomermsg (`photographer_id`, `customer_id`, `customer_name`, `photographer_name`, `photographer_contact`, `photographer_email`, `photographer_address`, `message`, `date_sent`, `status`)VALUES('$photographer_id', '$customer_id', '$customer_name', '$photographer_name', '$photographer_contact', '$photographer_email', '$photographer_address', '$message', CURRENT_TIMESTAMP, 'unread')";
        $query_run = mysqli_query($db, $query);

        echo "<script>alert('Message has been sent succesfully!')</script>";
        echo "<script>window.open('photographerHome.php','_self')</script>";
        
}

if (isset($_POST['customerMsgAdmin'])) {
    custmsgad();
}

function custmsgad(){

    global $db, $errors, $username, $email;

    $customer_id = $_POST['customer_id'];
    $full_name = $_POST['full_name'];
    $contact_number = $_POST['contact_number'];
    $email_address = $_POST['email_address'];
    $message = $_POST['message'];


        $query = "INSERT INTO photographerandcustomermsgtoadmin (`customer_id`, `admin_id`, `photographer_id`, `full_name`, `contact_number`, `email_address`, `message`, `date_sent`, `status`, `user_type`, `notif_status`)VALUES('$customer_id', '', '', '$full_name', '$contact_number', '$email_address', '$message', CURRENT_TIMESTAMP, 'unread', 'customer', 'user')";
        $query_run = mysqli_query($db, $query);

        echo "<script>alert('Message has been sent succesfully!')</script>";
        echo "<script>window.open('userHome.php','_self')</script>";
        
}

if (isset($_POST['photographerMsgAdmin'])) {
    musmsgad();
}

function musmsgad(){

    global $db, $errors, $username, $email;

    $photographer_id = $_POST['photographer_id'];
    $full_name = $_POST['full_name'];
    $contact_number = $_POST['contact_number'];
    $email_address = $_POST['email_address'];
    $message = $_POST['message'];


        $query = "INSERT INTO photographerandcustomermsgtoadmin (`customer_id`, `admin_id`, `photographer_id`, `full_name`, `contact_number`, `email_address`, `message`, `date_sent`, `status`, `user_type`, `notif_status`)VALUES('', '', '$photographer_id', '$full_name', '$contact_number', '$email_address', '$message', CURRENT_TIMESTAMP, 'unread', 'photographer', 'user')";
        $query_run = mysqli_query($db, $query);

        echo "<script>alert('Message has been sent succesfully!')</script>";
        echo "<script>window.open('photographerHome.php','_self')</script>";
        
}

if (isset($_POST['admintoCustomer'])) {
    admintocust();
}

function admintocust(){

    global $db, $errors, $username, $email;

    $customer_id = $_POST['customer_id'];
    $admin_id = $_POST['admin_id'];
    $full_name = $_POST['full_name'];
    $contact_number = $_POST['contact_number'];
    $email_address = $_POST['email_address'];
    $message = $_POST['message'];


        $query = "INSERT INTO photographerandcustomermsgtoadmin (`customer_id`, `admin_id`, `photographer_id`, `full_name`, `contact_number`, `email_address`, `message`, `date_sent`, `status`, `user_type`, `notif_status`)VALUES('$customer_id', '$admin_id', '', '$full_name', '$contact_number', '$email_address', '$message', CURRENT_TIMESTAMP, 'unread', 'admin', 'admin')";
        $query_run = mysqli_query($db, $query);

        echo "<script>alert('Message to customer has been sent succesfully!')</script>";
        echo "<script>window.open('adminPanel.php','_self')</script>";
        
}

if (isset($_POST['admintophotographer'])) {
    admintomus();
}

function admintomus(){

    global $db, $errors, $username, $email;

    $photographer_id = $_POST['photographer_id'];
    $admin_id = $_POST['admin_id'];
    $full_name = $_POST['full_name'];
    $contact_number = $_POST['contact_number'];
    $email_address = $_POST['email_address'];
    $message = $_POST['message'];


        $query = "INSERT INTO photographerandcustomermsgtoadmin (`customer_id`, `admin_id`, `photographer_id`, `full_name`, `contact_number`, `email_address`, `message`, `date_sent`, `status`, `user_type`, `notif_status`)VALUES('', '$admin_id', '$photographer_id', '$full_name', '$contact_number', '$email_address', '$message', CURRENT_TIMESTAMP, 'unread', 'admin', 'admin')";
        $query_run = mysqli_query($db, $query);

        echo "<script>alert('Message to photographer has been sent succesfully!')</script>";
        echo "<script>window.open('adminPanel.php','_self')</script>";
        
}


if (isset($_POST['AdminCustomerRegistration'])) {
    admincustomerregistration();
}


    // REGISTER USER
function admincustomerregistration(){
    // call these variables with the global keyword to make them available in function
    global $db, $errors, $username, $email;

    // receive all input values from the form. Call the e() function
    // defined below to escape form values
    $fname = e($_POST['fname']);
    $mname = e($_POST['mname']);
    $lname = e($_POST['lname']);
    $age = e($_POST['age']);
    $birthday = e($_POST['birthday']);
    $gender = e($_POST['gender']);
    $email_address = e($_POST['email_address']);
    $contact_number = e($_POST['contact_number']);
    $residential_address = e($_POST['residential_address']);
    $username = e($_POST['username']);
    $password = e($_POST['password']);
    $confirm_password = e($_POST['confirm_password']);
    // $photo = e($_POST['photo']);

    move_uploaded_file($_FILES["photo"]["tmp_name"],"../images/" . $_FILES["photo"]["name"]);
    $photo=$_FILES["photo"]["name"];

    // form validation: ensure that the form is correctly filled
    if (empty($username)) { 
        array_push($errors, "Username is required"); 
    }
    if (empty($email_address)) { 
        array_push($errors, "Email is required"); 
    }
    if (empty($password)) { 
        array_push($errors, "Password is required"); 
    }
    if ($password != $confirm_password) {
        array_push($errors, "The two passwords do not match");
    }

     $sqlCheckUsername = "SELECT * FROM `users` WHERE `username` LIKE '$username' ";
     $usernameQuery = mysqli_query($db,$sqlCheckUsername);

     $sqlCheckEmail = "SELECT * FROM `users` WHERE `email_address` LIKE '$email_address' ";
     $emailQuery = mysqli_query($db,$sqlCheckEmail);

     if(mysqli_num_rows($usernameQuery)>0){

            echo "<script>alert('Username is Already Used, Type Another One')</script>";
            echo "<script>window.open('addCustomer.php','_self')</script>";

     } else if (mysqli_num_rows($emailQuery)>0) {

            echo "<script>alert('This Email is Already Registered Type Another One')</script>";
            echo "<script>window.open('addCustomer.php','_self')</script>";
            
    }

    // register user if there are no errors in the form
    else if (count($errors) == 0) {
        $password = md5($password); //encrypt the password before saving in the database

        if (isset($_POST['user_type'])) {
            $user_type = e($_POST['user_type']);
            $query = "INSERT INTO users (fname, mname, lname, age, birthday, gender, email_address, contact_number, residential_address, username, password, date_registered, status, photo, user_type)
                VALUES('$fname', '$mname', '$lname', '$age', '$birthday', '$gender', '$email_address', '$contact_number', '$residential_address', '$username', '$password', CURRENT_TIMESTAMP, 'active', '$photo', '$user_type')";
            mysqli_query($db, $query);

            // $_SESSION['success']  = "New user successfully created!!";
            // header('location: home.php');
            echo "<script>alert('Account Successfully Created')</script>";
            echo "<script>window.open('../admin/adminPanel.php','_self')</script>";

        }else{
            $query = "INSERT INTO users (fname, mname, lname, age, birthday, gender, email_address, contact_number, residential_address, username, password, date_registered, status, photo, user_type)
                VALUES('$fname', '$mname', '$lname', '$age', '$birthday', '$gender', '$email_address', '$contact_number', '$residential_address', '$username', '$password', CURRENT_TIMESTAMP, 'active', '$photo', 'customer')";
            mysqli_query($db, $query);

            // get id of the created user
            $logged_in_user_id = mysqli_insert_id($db);

            // $_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
            $_SESSION['success']  = "Welcome";
            echo "<script>alert('Account Successfully Created')</script>";
            echo "<script>window.open('../admin/adminPanel.php','_self')</script>";
            // header('location: index.php');               
        }
    }
}


if (isset($_POST['adminaddBooking'])) {
    adminbooking();
}

function adminbooking(){

    global $db, $errors, $username, $email;

    $photographer_id = $_POST['photographer_id'];
    $customer_id = $_POST['customer_id'];
    $event_id = $_POST['event_id'];
    $photographer_name = $_POST['photographer_name'];
    $photographer_address = $_POST['photographer_address'];
    $photographer_contact = $_POST['photographer_contact'];
    $photographer_email = $_POST['photographer_email'];
    $customer_name = $_POST['customer_name'];
    $customer_address = $_POST['customer_address'];
    $customer_contact = $_POST['customer_contact'];
    $customer_email = $_POST['customer_email'];
    $event_name = $_POST['event_name'];
    $event_date = $_POST['event_date'];
    $event_loc = $_POST['event_loc'];
    $event_price = $_POST['event_price'];


        $query = "INSERT INTO bookings (`photographer_id`, `customer_id`, `event_id`, `photographer_name`, `photographer_address`, `photographer_contact`, `photographer_email`, `customer_name`, `customer_address`, `customer_contact`, `customer_email`, `event_name`, `event_date`, `event_loc`, `event_price`, `status_date`, `status`)VALUES('$photographer_id', '$customer_id', '$event_id', '$photographer_name', '$photographer_address', '$photographer_contact', '$photographer_email', '$customer_name', '$customer_address', '$customer_contact', '$customer_email', '$event_name', '$event_date', '$event_loc', '$event_price', CURRENT_TIMESTAMP, 'booked')";
        $query_run = mysqli_query($db, $query);

        $query2="UPDATE `events` SET `date_added`=CURRENT_TIMESTAMP WHERE event_id='$event_id'";
        $query_run2 = mysqli_query($db, $query2);

        $query3="UPDATE `events` SET `status`='booked' WHERE event_id='$event_id'";
        $query_run3 = mysqli_query($db, $query3);

        echo "<script>alert('You Have Succesfully Booked This Event to Film Me!')</script>";
        echo "<script>window.open('adminPanel.php','_self')</script>";
        
}

if (isset($_POST['adminaddphotographer'])) {
    adminaddphotographer();
}

   // REGISTER USER
function adminaddphotographer(){
    // call these variables with the global keyword to make them available in function
    global $db, $errors, $username, $email;

    // receive all input values from the form. Call the e() function
    // defined below to escape form values
    $fname = e($_POST['fname']);
    $mname = e($_POST['mname']);
    $lname = e($_POST['lname']);
    $age = e($_POST['age']);
    $birthday = e($_POST['birthday']);
    $gender = e($_POST['gender']);
    $email_address = e($_POST['email_address']);
    $contact_number = e($_POST['contact_number']);
    $residential_address = e($_POST['residential_address']);
    $username = e($_POST['username']);
    $password = e($_POST['password']);
    $confirm_password = e($_POST['confirm_password']);
    // $photo = e($_POST['photo']);

    move_uploaded_file($_FILES["photo"]["tmp_name"],"../images/" . $_FILES["photo"]["name"]);
    $photo=$_FILES["photo"]["name"];

    move_uploaded_file($_FILES["sample1"]["tmp_name"],"../images/" . $_FILES["sample1"]["name"]);
    $sample1=$_FILES["sample1"]["name"];

    move_uploaded_file($_FILES["sample2"]["tmp_name"],"../images/" . $_FILES["sample2"]["name"]);
    $sample2=$_FILES["sample2"]["name"];

    move_uploaded_file($_FILES["sample3"]["tmp_name"],"../images/" . $_FILES["sample3"]["name"]);
    $sample3=$_FILES["sample3"]["name"];

    // form validation: ensure that the form is correctly filled
    if (empty($username)) { 
        array_push($errors, "Username is required"); 
    }
    if (empty($email_address)) { 
        array_push($errors, "Email is required"); 
    }
    if (empty($password)) { 
        array_push($errors, "Password is required"); 
    }
    if ($password != $confirm_password) {
        array_push($errors, "The two passwords do not match");
    }

     $sqlCheckUsername = "SELECT * FROM `users` WHERE `username` LIKE '$username' ";
     $usernameQuery = mysqli_query($db,$sqlCheckUsername);

     $sqlCheckEmail = "SELECT * FROM `users` WHERE `email_address` LIKE '$email_address' ";
     $emailQuery = mysqli_query($db,$sqlCheckEmail);

     if(mysqli_num_rows($usernameQuery)>0){

            echo "<script>alert('Username is Already Used, Type Another One')</script>";
            echo "<script>window.open('addphotographer.php','_self')</script>";

     } else if (empty($sample1)) {
        
         echo "<script>alert('Please Add 3 Sample Pictures!')</script>";
         echo "<script>window.open('addphotographer.php','_self')</script>";

     } else if (empty($sample2)) {
        
         echo "<script>alert('Please Add 3 Sample Pictures!')</script>";
         echo "<script>window.open('addphotographer.php','_self')</script>";

     }else if (empty($sample3)) {
        
         echo "<script>alert('Please Add 3 Sample Pictures!')</script>";
         echo "<script>window.open('addphotographer.php','_self')</script>";

     }else if (mysqli_num_rows($emailQuery)>0) {

            echo "<script>alert('This Email is Already Registered Type Another One')</script>";
            echo "<script>window.open('addphotographer.php','_self')</script>";
            
    }

    // register user if there are no errors in the form
    else if (count($errors) == 0) {
        $password = md5($password); //encrypt the password before saving in the database

        if (isset($_POST['user_type'])) {
            $user_type = e($_POST['user_type']);
            $query = "INSERT INTO users (fname, mname, lname, age, birthday, gender, email_address, contact_number, residential_address, username, password, date_registered, status, photo, sample1, sample2, sample3, user_type)
                VALUES('$fname', '$mname', '$lname', '$age', '$birthday', '$gender', '$email_address', '$contact_number', '$residential_address', '$username', '$password', CURRENT_TIMESTAMP, 'active', '$photo', '$sample1', '$sample2', '$sample3', '$user_type')";
            mysqli_query($db, $query);

            // $_SESSION['success']  = "New user successfully created!!";
            // header('location: home.php');
            echo "<script>alert('Account Successfully Created')</script>";
            echo "<script>window.open('adminPanel.php','_self')</script>";

        }else{
            $query = "INSERT INTO users (fname, mname, lname, age, birthday, gender, email_address, contact_number, residential_address, username, password, date_registered, status, photo, sample1, sample2, sample3, user_type)
                VALUES('$fname', '$mname', '$lname', '$age', '$birthday', '$gender', '$email_address', '$contact_number', '$residential_address', '$username', '$password', CURRENT_TIMESTAMP, 'active', '$photo', '$sample1', '$sample2', '$sample3', 'pending')";
            mysqli_query($db, $query);

            // get id of the created user
            $logged_in_user_id = mysqli_insert_id($db);

            // $_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
            $_SESSION['success']  = "Welcome";
            echo "<script>alert('Account Successfully Created')</script>";
            echo "<script>window.open('adminPanel.php','_self')</script>";
            // header('location: index.php');               
        }
    }
}


if (isset($_POST['updatePricing'])) {
    updatepricing();
}

function updatepricing(){

    global $db, $errors, $username, $email;

    $event_price = $_POST['event_price'];
    $tax_price = $_POST['tax_price'];
    $pricing_id = $_POST['pricing_id'];

    $query="UPDATE `pricing` SET `event_price`='$event_price', `tax_price`='$tax_price' WHERE pricing_id='$pricing_id'";
    $query_run = mysqli_query($db, $query);


     if ($query_run) {
      echo "<script>alert('Update Success!!!')</script>";
      echo "<script>window.open('adminPanel.php','_self')</script>";
     }else{

      echo "<script>alert('Update Failed!')</script>";
      echo "<script>window.open('adminPanel.php','_self')</script>";

     }
        
}

if (isset($_POST['updateGcash'])) {
    updategcash();
}

function updategcash(){

    global $db, $errors, $username, $email;

    $gcash_id = $_POST['gcash_id'];
    $gcash_account = $_POST['gcash_account'];

    $query="UPDATE `gcash` SET `gcash_account`='$gcash_account' WHERE gcash_id='$gcash_id'";
    $query_run = mysqli_query($db, $query);


     if ($query_run) {
      echo "<script>alert('Update Success!!!')</script>";
      echo "<script>window.open('adminPanel.php','_self')</script>";
     }else{

      echo "<script>alert('Update Failed!')</script>";
      echo "<script>window.open('adminPanel.php','_self')</script>";

     }
        
}


?>
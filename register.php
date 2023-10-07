<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$hostname = "localhost";
$username = "root";
$password = "";
$database = "social";

// Create a connection to the MySQL server
$con = mysqli_connect($hostname, $username, $password, $database);

$fname = ""; //first name
$lname = ""; //last name
$em = ""; //email
$em2 = ""; //email 1
$password = ""; //password
$password2 = ""; //password
$date = ""; //date
$error_array =""; // holds error messages

if(isset($_POST['register_button'])){

    //last_name
    $lname = strip_tags($_POST['reg_lastname']); // remove html tags
    $lname = str_replace(' ', '', $lname);
    // remove spaces
    $lname = ucfirst(strtolower($lname));
    $_SESSION['reg_lastname'] = $lname;

     //first_name

     $fname = strip_tags($_POST['reg_firstname']); // remove html tags
     $fname = str_replace(' ', '', $fname ); // remove spaces
     $fname = ucfirst(strtolower($fname));
     $_SESSION['reg_firstname'] = $fname;

       //email
    $em = strip_tags($_POST['reg_email']); // remove html tags
    $em = str_replace(' ', '', $em ); // remove spaces
    $em = ucfirst(strtolower($em));
    $_SESSION['reg_email'] = $fname;

        //email2
        $em2 = strip_tags($_POST['reg_confirm_email']); // remove html tags
        $em2 = str_replace(' ', '', $em2); // remove spaces
        $em2 = ucfirst(strtolower($em2));
        $_SESSION['reg_confirm_email'] = $fname;

        $password = strip_tags($_POST['reg_password']);
        $password2 = strip_tags($_POST['reg_confirm_password']);

        $date = date("Y-m-d"); // current date

        if($em == $em2) {
             if(filter_var($em, FILTER_VALIDATE_EMAIL)){
               $em = filter_var($em, FILTER_VALIDATE_EMAIL);

               $e_check = mysqli_query($con, "SELECT email FROM users WHERE email='$em'");

               $num_rows = mysqli_num_rows($e_check);

               if($num_rows >0){
                echo "Email already in use";
               }
             }else {
                echo "Invalid format";
             }
        }
        else {
            echo"Emails don't match";
        }

        if(strlen($fname)> 25 || strlen($fname) < 2){
            echo "Your first name should be between 2 and 25 characters";
        }

        if(strlen($lname)> 25 || strlen($lname) < 2){
            echo "Your last name should be between 2 and 25 characters";
        }

        if($password != $password){
            echo "Your passwords do not match";

        }
        else {
            if(preg_match('/[^A-Za-z0-9]/', $password)){
             echo "Your password can only contain english characters or numbers";
            }
        }
        if(strlen($password > 30 || strlen(password) < 5)) {
            echo "Your password must be between 5 and 30 characters";
        }
    }
?>
<html>
<head>
    <title>Welcome to PetConnect</title>
</head>
<body>
    <h1>Registration Form</h1>
    <form action="register.php" method="post">
        <input type="text" name="reg_firstname" placeholder="First Name" value =  "<?php if(isset($_SESSION['reg_firstname'])) { echo $_SESSION['reg_firstname'];}?>" required><br><br>

        <input type="text" name="reg_lastname" placeholder="Last Name" value =  "<?php if(isset($_SESSION['reg_lastname'])) { echo $_SESSION['reg_lastname'];}?>" required><br><br>

        <input type="email" name="reg_email" placeholder="Email" value =  "<?php if(isset($_SESSION['reg_email'])) { echo $_SESSION['reg_email'];}?>"required><br><br>

        <input type="email" name="reg_confirm_email" placeholder="Confirm Email" value =  "<?php if(isset($_SESSION['reg_confirm_email'])) { echo $_SESSION['reg_confirm_email'];}?>"required><br><br>

        <input type="password" name="reg_password" placeholder="Password" required><br><br>

        <input type="password" name="reg_confirm_password" placeholder="Confirm Password" required><br><br>

        <input type="submit" name= "register_button" value="Submit">
    </form>
</body>
</html>


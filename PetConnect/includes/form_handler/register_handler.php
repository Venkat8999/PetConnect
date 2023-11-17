<?php

$fname = ""; //first name
$lname = ""; //last name
$em = ""; //email
$em2 = ""; //email 1
$password = ""; //password
$password2 = ""; //password
$date = ""; //date
$error_array =array(); // holds error messages

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
    $_SESSION['reg_email'] = $em;

        //email2
        $em2 = strip_tags($_POST['reg_confirm_email']); // remove html tags
        $em2 = str_replace(' ', '', $em2); // remove spaces
        $em2 = ucfirst(strtolower($em2));
        $_SESSION['reg_confirm_email'] = $em2;

        $password = strip_tags($_POST['reg_password']);
        $password2 = strip_tags($_POST['reg_confirm_password']);

        $date = date("Y-m-d"); // current date

        if($em == $em2) {
             if(filter_var($em, FILTER_VALIDATE_EMAIL)){
               $em = filter_var($em, FILTER_VALIDATE_EMAIL);

               $e_check = mysqli_query($con, "SELECT email FROM users WHERE email='$em'");

               $num_rows = mysqli_num_rows($e_check);

               if($num_rows >0){
                array_push($error_array,"Email already in use<br>");
               }
             }else {
                array_push($error_array,"Invalid Email format<br>");
             }
        }
        else {
            array_push($error_array,"Emails don't match<br>");
        }

        if(strlen($fname)> 25 || strlen($fname) < 2){
            array_push($error_array,"Your first name should be between 2 and 25 characters<br>");
        }

        if(strlen($lname)> 25 || strlen($lname) < 2){
            array_push($error_array,"Your last name should be between 2 and 25 characters<br>");
        }

        if ($password != $password2) {
            array_push($error_array, "Your passwords do not match<br>");
        }
        
        else {
            if(preg_match('/[^A-Za-z0-9]/', $password)){
                array_push($error_array, "Your password can only contain english characters or numbers<br>");
            }
        }

        if (strlen($password) > 30 || strlen($password) < 5) {
            array_push($error_array, "Your password must be between 5 and 30 characters<br>");
        }
        
        if (empty($error_array)) {
            $password = md5($password); // Encrypt password before sending to the database
        
            // Generate username by concatenating first_name and last_name
            $username = strtolower($fname . "_" . $lname);
        
            // Check if the username already exists
            $check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username = '$username'");
        
            $i = 0;
        
            // If username exists, add a number to the username
            while (mysqli_num_rows($check_username_query) != 0) {
                $i++; // Add 1 to i
                $username = $username . "_" . $i;
        
                // Check the new username
                $check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username = '$username'");
            }
        
            // Profile picture assignment
            $rand = rand(1, 2); // Random number between 1 and 2
        
            if ($rand == 1)
                $profile_pic = "assets/images/profile_pics/default/dog1.png";
            else if ($rand == 2)
                $profile_pic = "assets/images/profile_pics/default/dog2.png";
        
                $query = mysqli_query($con, "INSERT INTO users (first_name, last_name, username, email, password, signup_date, profile_pic, num_posts, num_likes, user_closed, friend_array) VALUES ('$fname', '$lname', '$username', '$em', '$password', '$date', '$profile_pic', '0', '0', 'no', '')");
            array_push($error_array, "<span style='color: #14C800;'> you're all set! Go ahead and login</span><br>");
            $_SESSION['registration_success'] = "You have successfully registered! You can now log in.";

          
        }
       
    


        
    }
    ?>
<?php

session_start();


$error_array = array();

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'config/config.php';
require 'includes/form_handler/register_handler.php';
require 'includes/form_handler/login_handler.php';


if (!isset($con) || !$con instanceof mysqli) {
    die("Database connection or configuration error.");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetConnect Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    body {
        background-color: #f0f2f5;
        font-family: Arial, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    body {
        position: relative;
   
 
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;
    background-attachment: fixed;
    font-family: Arial, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}
body::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(255, 255, 255, 0.2); /* This is a white overlay with 80% opacity, adjust as needed */
    z-index: -1; /* This ensures the overlay is behind the content */
}s
.main-container {
    background-color: rgba(255, 255, 255, 0.2); /* White overlay with 70% opacity */
    padding: 20px;
    border-radius: 10px;
}


    .main-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 80%;
    }

    h1 {
        font-size: 48px;
        color: #a38351; /* A neutral pet color */
        margin-bottom: 20px;
    }

    p.caption {
        font-size: 24px;
        margin-bottom: 30px;
        color: #555;
    }

    .login-form {
        background-color: #ffffff;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        width: 400px;
    }

    .btn-primary {
        background-color: #a38351;
    border-color: #a38351;
    }

    .btn-primary:hover {
        background-color: #8c6d42;
    border-color: #8c6d42;
    }

    .btn-primary::before {
    content: "";
    background-image: url('assets/images/ui/paw.webp');
    background-size: contain;
    background-repeat: no-repeat;
    width: 24px;
    height: 24px;
    display: inline-block;
    vertical-align: middle;
    margin-right: 10px;
}

    </style>
</head>

<body>

    <div class="main-container">
        <!-- Logo and Caption -->
        <div>
            <h1>PetConnect</h1>
            <p class="caption">Connect with pets and their world on PetConnect.</p>
        </div>
        
        <!-- Login Form -->
        <div class="login-form">
    <form method="POST">
        <div class="mb-3">
            <input type="email" name="log_email" class="form-control" placeholder="Email Address" required>
            <?php 
            // Display error messages
            if(in_array("Email or password was incorrect<br>", $error_array)) echo '<span style="color: red;">Email or password was incorrect</span><br>';
 
            ?>
        </div>
        <div class="mb-3">
            <input type="password" name="log_password" class="form-control" placeholder="Password">
        </div>
        <button type="submit" name="login_button" class="btn btn-primary w-100 mb-3">Paw In</button>
    </form>
          <!-- This will be the button to trigger the modal -->
          <a href="register.php" class="btn btn-light w-100">
    Create new account
</a>


        </div>
    </div>
<!-- Registration Modal -->
<!-- Registration Modal -->



    <!-- Optional: Bootstrap JS and Popper.js for Bootstrap's components -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>

</html>
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
if(isset($_SESSION['registration_success'])) {
    unset($_SESSION['reg_firstname']);
    unset($_SESSION['reg_lastname']);
    unset($_SESSION['reg_email']);
    unset($_SESSION['reg_confirm_email']);
   
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to PetConnect</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    body {
        background-color: #f0f2f5;
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
        background: rgba(255, 255, 255, 0.2);
        z-index: -1;
    }
    .main-container {
        background-color: rgba(255, 255, 255, 0.2);
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px;
        border-radius: 10px;
        width: 80%;
    }
    h1 {
        font-size: 48px;
        color: #a38351;
        margin-bottom: 20px;
    }
    p.caption {
        font-size: 24px;
        margin-bottom: 30px;
        color: #555;
    }
    .register-form {
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
            <p class="caption">Register to connect with pets and their world on PetConnect.</p>
        </div>

        <!-- Registration Form -->
        <div class="register-form">
    <form action="register.php" method="POST">
        <div class="mb-3">
            <input type="text" name="reg_firstname" class="form-control" placeholder="First Name" value="<?php if(isset($_SESSION['reg_firstname'])) { echo $_SESSION['reg_firstname']; } ?>" required>
            <?php if(in_array("Your first name should be between 2 and 25 characters<br>", $error_array)) echo '<span style="color: red;">Your first name should be between 2 and 25 characters</span><br>'; ?>
        </div>
        
        <div class="mb-3">
            <input type="text" name="reg_lastname" class="form-control" placeholder="Last Name" value="<?php if(isset($_SESSION['reg_lastname'])) { echo $_SESSION['reg_lastname']; } ?>" required>
            <?php if(in_array("Your last name should be between 2 and 25 characters<br>", $error_array)) echo '<span style="color: red;">Your last name should be between 2 and 25 characters</span><br>'; ?>
        </div>

        <div class="mb-3">
            <input type="email" name="reg_email" class="form-control" placeholder="Email" value="<?php if(isset($_SESSION['reg_email'])) { echo $_SESSION['reg_email']; } ?>" required>
            <input type="email" name="reg_confirm_email" class="form-control mt-2" placeholder="Confirm Email" value="<?php if(isset($_SESSION['reg_confirm_email'])) { echo $_SESSION['reg_confirm_email']; } ?>" required>
            <?php 
                if(in_array("Email already in use<br>", $error_array)) echo '<span style="color: red;">Email already in use</span><br>';
                else if(in_array("Invalid Email format<br>", $error_array)) echo '<span style="color: red;">Invalid Email format</span><br>';
                else if(in_array("Emails don't match<br>", $error_array)) echo '<span style="color: red;">Emails don\'t match</span><br>';
            ?>
        </div>

        <div class="mb-3">
            <input type="password" name="reg_password" class="form-control" placeholder="Password" required>
            <input type="password" name="reg_confirm_password" class="form-control mt-2" placeholder="Confirm Password" required>
            <?php 
                if(in_array("Your passwords do not match<br>", $error_array)) echo '<span style="color: red;">Your passwords do not match</span><br>';
                else if(in_array("Your password can only contain english characters or numbers<br>", $error_array)) echo '<span style="color: red;">Your password can only contain english characters or numbers</span><br>';
                else if(in_array("Your password must be between 5 and 30 characters<br>", $error_array)) echo '<span style="color: red;">Your password must be between 5 and 30 characters</span><br>';
            ?>
        </div>

        <button type="submit" name="register_button" class="btn btn-primary w-100 mb-3">Paw UP</button>
    </form>

    <?php 
    if (isset($_SESSION['registration_success'])) {
        echo '<div class="alert alert-success">' . $_SESSION['registration_success'] . '</div>';
        unset($_SESSION['registration_success']);
    }
    ?>
    <a href="login.php" class="btn btn-light w-100">Already have an account? Login here</a>
</div>


    <!-- Optional: Bootstrap JS and Popper.js for Bootstrap's components -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>

</html>

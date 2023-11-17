<?php
require 'config/config.php';
session_start(); // Ensure that session_start() is called to start the session.

if(isset($_SESSION['username'])){
    $userLoggedIn = $_SESSION['username'];
    $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username= '$userLoggedIn'");
    $user = mysqli_fetch_array($user_details_query);
}
else{
    header("Location: register.php");
    exit(); // It's a good practice to call exit() after a header redirect.
}
?>
<html>
<head>
    <title>Welcome to PetConnect</title>
    <!-- Javascript --->
    <script src="assets/js/bootstrap.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" />


</head>
<body>
    <!-- The rest of your HTML goes here -->


<div class="top_bar">
<div class="logo">
    <a href="index.php">
        <h1>PetConnect</h1>
    </a>
</div>
    <nav class="nav">
    <a href="#">
             <?php echo $user['first_name'];?> </a>
    <a href="#" class="nav-link"><i class="bi bi-house-door"></i></a>
    <a href="#" class="nav-link"><i class="bi bi-person"></i></a>
    <a href="#" class="nav-link"><i class="bi bi-bell"></i></a>
    <a href="#" class="nav-link"><i class="bi bi-envelope"></i></a>
    <a href="#" class="nav-link"><i class="bi bi-gear"></i></a>
    <a href="includes/handlers/logout.php" class="nav-link"><i class="bi bi-box-arrow-right"></i></a>

</nav>
</div>
<div class="wrapper">
</body>
</html>






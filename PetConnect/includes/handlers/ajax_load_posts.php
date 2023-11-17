<?php
// Assuming 'config.php', 'User.php', and 'Post.php' are in the correct relative paths
include("../../config/config.php");
include("../classes/User.php");
include("../classes/Post.php");

// Set the number of posts to be loaded per call
$limit = 10;//number of posts to be lodaded

// Create a new Post object and load posts
$posts = new Post($con, $_REQUEST['userLoggedIn']);
$posts->loadPostsFriends($_REQUEST, $limit);
?>
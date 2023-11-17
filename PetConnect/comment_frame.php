<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
    <?php
    require 'config/config.php';
    include("includes/classes/User.php");
    include("includes/classes/Post.php");

    session_start(); // Start the session.

    if (isset($_SESSION['username'])) {
        $userLoggedIn = $_SESSION['username'];
        $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedIn'");
        $user = mysqli_fetch_array($user_details_query);
    } else {
        header("Location: register.php");
        exit();
    }

    $_post_id = isset($_GET['post_id']) ? $_GET['post_id'] : null;

    if ($_post_id) {
        $user_query = mysqli_query($con, "SELECT added_by, user_to FROM posts WHERE id='$_post_id'");
        $row = mysqli_fetch_array($user_query);
        $posted_to = $row['added_by'];

        if (isset($_POST['postComment' . $_post_id])) {
            $post_body = $_POST['post_body'];
            $post_body = mysqli_real_escape_string($con, $post_body);
            $date_time_now = date("Y-m-d H:i:s");
            $insert_post = mysqli_query($con, "INSERT INTO comments (post_body, posted_by, posted_to, date_added, removed, post_id) VALUES ('$post_body', '$userLoggedIn', '$posted_to', '$date_time_now', 'no', '$_post_id')");
            echo "<p>Comment Posted!</p>";
        }
    ?>
    <form action="comment_frame.php?post_id=<?php echo $_post_id; ?>" id="comment_form" name="postComment<?php echo $_post_id; ?>" method="POST">
        <textarea name="post_body"></textarea>
        <input type="submit" name="postComment<?php echo $_post_id; ?>" value="Post">
    </form>

    <?php
        $get_comments = mysqli_query($con, "SELECT * FROM comments WHERE post_id='$_post_id' ORDER BY id ASC");
        $count = mysqli_num_rows($get_comments);

        if ($count != 0) {
            while ($comment = mysqli_fetch_array($get_comments)) {
                $comment_body = $comment['post_body'];
                $posted_to = $comment['posted_to'];
                $posted_by = $comment['posted_by'];
                $date_added = $comment['date_added'];
                $removed = $comment['removed'];

                // Time calculation for comments
                $date_time_now = date("Y-m-d H:i:s");
                $start_date = new DateTime($date_added);
                $end_date = new DateTime($date_time_now);
                $interval = $start_date->diff($end_date);

                if ($interval->y >= 1) {
                    $time_message = $interval->y == 1 ? "1 year ago" : $interval->y . " years ago";
                } else if ($interval->m >= 1) {
                    $days = $interval->d == 0 ? "" : ($interval->d == 1 ? " and 1 day" : " and " . $interval->d . " days");
                    $time_message = $interval->m == 1 ? "1 month" . $days . " ago" : $interval->m . " months" . $days . " ago";
                } else if ($interval->d >= 1) {
                    $time_message = $interval->d == 1 ? "Yesterday" : $interval->d . " days ago";
                } else if ($interval->h >= 1) {
                    $time_message = $interval->h == 1 ? "1 hour ago" : $interval->h . " hours ago";
                } else if ($interval->i >= 1) {
                    $time_message = $interval->i == 1 ? "1 minute ago" : $interval->i . " minutes ago";
                } else {
                    $time_message = $interval->s < 30 ? "Just now" : $interval->s . " seconds ago";
                }

                $user_obj = new User($con, $posted_by);
                // Output the comment
                echo "<div class='comment_section'>";
                echo "<img src='" . $user_obj->getProfilePic() . "' alt='Profile Pic' style='float: left; height: 30px; margin-right: 10px;'>"; // Added margin-right
                echo "<a href='" . $posted_by . "' target='_parent' title='" . $posted_by . "' style='color: #f39c12;'>" . $user_obj->getFirstAndLastName() . "</a>";
                echo "<p>" . $time_message . "</p>";
                echo "<p>" . $comment_body . "</p>";
                echo "</div>";
                
            }
        }
        else {
            echo "<center><br><br> No Comments to show! </center>";
        }
    
    }
    ?>
</body>
</html>

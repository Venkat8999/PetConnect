<?php 
class Post {
    private $user_obj;
    private $con;
    public function __construct($con, $user) {
     $this->con = $con;
      $this->user_obj = new User($con, $user);

    }

    public function submitPost($body, $user_to) {
        $body = strip_tags($body);
        $body = mysqli_real_escape_string($this->con, $body);

        $body = str_replace("\r\n", "\n", $body);
        $body = nl2br($body);        
        $check_empty = preg_replace('/\s+/', '', $body);

        if($check_empty != ""){
            $date_added = date("Y-m-d H:i:s");
            $added_by = $this->user_obj->getUsername();
    
            if($user_to == $added_by) {
                $user_to = "none";
            }
            echo $body; // For debugging purposes.
    
            $query = mysqli_query($this->con, "INSERT INTO posts (body, added_by, user_to, date_added, user_closed, deleted, likes) VALUES ('$body', '$added_by', '$user_to', '$date_added', 'no', 'no', '0')");
    
            $returned_id = mysqli_insert_id($this->con);
    
            $num_posts = $this->user_obj->getNumPosts();
            $num_posts++;
            $update_query = mysqli_query($this->con, "UPDATE users SET num_posts='$num_posts' WHERE username='$added_by'");
        }


    
    }



    public function loadPostsFriends($userLoggedIn) {

        $str = ""; //String to return
           $data  = mysqli_query($this->con, "SELECT * FROM posts WHERE deleted='no' ORDER BY id DESC");
       
        while($row = mysqli_fetch_array($data)) {
               $id = $row['id'];
               $body = $row['body'];
               $added_by = $row['added_by'];
               $date_time = $row['date_added'];
               $time_message = "";
       if($row['user_to'] == "none") {
                   $user_to = "";
               } else {
                   $user_to_obj = new User($con, $row['user_to']);
                   $user_to_name = $user_to_obj->getFirstAndLastName();
                   $user_to = "to <a href='" . $row['user_to'] . "'>" . $user_to_name . "</a>";
               }
       
        $added_by_obj = new User($this->con, $added_by);
               if ($added_by_obj->isClosed()) {
                   continue;
               }

               
               
               $user_logged_obj = new User($this-> con, $userLoggedIn);
               if($user_logged_obj-> isFriend($added_by)) {

               
        $user_details_query = mysqli_query($this->con, "SELECT first_name, last_name, profile_pic FROM users WHERE username='$added_by'");
               $user_row = mysqli_fetch_array($user_details_query);
               $first_name = $user_row['first_name'];
               $last_name = $user_row['last_name'];
             $profile_pic =$user_row['profile_pic'];
             ?>
             
             <script>
    function toggle<?php echo $id; ?>(event) {
        var element = document.getElementById('toggleComment<?php echo $id; ?>');
        if (element.style.display === 'block') {
            element.style.display = 'none';
        } else {
            element.style.display = 'block';
        }
    }
</script>



    <?php

    $comments_check = mysqli_query($this->con, "SELECT * FROM comments WHERE post_id='$id'");
    $comments_check_num = mysqli_num_rows($comments_check);
               
        
             $date_time_now = date("Y-m-d H:i:s");
             $start_date = new DateTime($date_time); // Time of post
             $end_date = new DateTime($date_time_now); // Current time
             $interval = $start_date->diff($end_date); // Difference between dates
             
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
             
             $str .= "
             <div class='status_post'>
                 <div class='post_profile_pic'>
                     <img src='$profile_pic' width='50'>
                 </div>
                 <div class='posted_by' style='color:#a38351;'>
                     <a href='$added_by' style='color: #a38351;'>$first_name $last_name</a> $user_to &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$time_message
                 </div>
                 <div id='post_body'>$body<br></div>
                 <div class='newsfeedPostOptions' style='padding: 0px; text-decoration: none; color: #a38351; border: none;' position: absolute; top:0; onClick='toggle$id(event)'>
                     Comments($comments_check_num)&nbsp;&nbsp;&nbsp;&nbsp;
                     <iframe src='like.php?post_id=$id' frameborder= '0' height= 15px; width=122px; scrolling='no'></iframe>
                 </div>
             </div>
             <div class='post_comment' id='toggleComment$id' style='display:none;'>
                 <iframe src='comment_frame.php?post_id=$id' id='comment_iframe'></iframe>
             </div>
             <hr>";
             
            }



            
       }
       echo $str;

       }
       }

       ?>
    

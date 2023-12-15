<?php
include '../../config/config.php';
 
$userLoggedIn = $_POST['user'];
		
		$query = mysqli_query($con, "SELECT * FROM friend_requests WHERE user_to='$userLoggedIn'");
 
		$num =  mysqli_num_rows($query);
 
		if($num > 0)
		   echo $num;

Next we go to the Message.php class and find the getUnreadNumber function. Change it to this:
public function getUnreadNumber() {
 
		$userLoggedIn = $this->user_obj->getUsername();
		$query = mysqli_query($this->con, "SELECT * FROM messages WHERE viewed='no' AND user_to='$userLoggedIn'");
 
		$senders = array();
 
		while($row = mysqli_fetch_array($query)) {
 
			array_push($senders, $row['user_from']);
		}
 
	return count(array_unique($senders));
}
?>
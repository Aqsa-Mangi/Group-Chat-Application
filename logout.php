<?php

	session_start();
	require("require/connection.php");
	$timestamp=time();
	$update_query="UPDATE users SET logout_time='".$timestamp."',is_online=0 WHERE user_id=".$_SESSION['user']['user_id'];
	$update_query=mysqli_query($connection,$update_query);
	if ($update_query) 
	{
		session_destroy();
		header("location:index.php?msg=Logged Out");

	}
	
?>
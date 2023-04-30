<?php
	require("require/connection.php");
	session_start();
	if (isset($_POST['login'])) 
	{

		$select_query="SELECT * FROM users WHERE user_email='".$_POST['email']."' AND password='".$_POST['password']."'";
		$select_result=mysqli_query($connection,$select_query);
		if ($select_result->num_rows > 0) 
		{
			while ($user_info = mysqli_fetch_assoc($select_result)) 
			{
				if ($user_info['user_email']==$_POST['email'] && $user_info['password']==$_POST['password']) 
				{
					$update_query="UPDATE users SET is_online=1 WHERE user_id=".$user_info['user_id'];
					$update_query=mysqli_query($connection,$update_query);
					if ($update_query) 
					{
						$_SESSION['user']=$user_info;
						header("location:chat_messages.php");
					}
				}
			}
		}else
		{
			header("location:index.php?msg=Email/password does not match");
		}
	}else
	{
		header("location:index.php?msg=Please login First");
	}









?>
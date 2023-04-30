<?php
	session_start();
	$user=$_SESSION['user'];
	require("require/connection.php");

	if (isset($_GET['action']) && $_GET['action']=='show_messages') 
	{
		$query="SELECT * FROM chat_messages c,users u WHERE c.user_id=u.user_id";
		$result=mysqli_query($connection,$query);

		if ($result->num_rows > 0) 
		{
			while ($row = mysqli_fetch_assoc($result)) 
			{
				if ($row['user_id']==$user['user_id']) {
?>
					<div id="sender" >
					<img style="width: 25px; height: 25px" src="images/<?php echo $row['user_image'];?>">
						<label style="background-color: beige; padding: 3px"><?php echo $row['first_name']." ".$row['last_name'];?></label>
						<label style="padding: 5px; background-color: lightsteelblue;"><?php echo $row['text_message'];?></label>
						<label style="background-color: beige;"><?php echo $row['send_time'];?></label></div>

<?php
				}else{
?>
					<div id="reciever">
						<img style="width: 25px; height: 25px;" src="images/<?php echo $row['user_image'];?>">
						<label style="background-color: lightgray; padding: 3px;"><?php echo $row['first_name']." ".$row['last_name'];?></label>
						<label style="padding: 5px;"><?php echo $row['text_message'];?></label>
						<label style="background-color: lightgray;"><?php echo $row['send_time'];?></label>
							
					</div>
<?php			
				}		
			}
		}else
		{
			?>
			<h2>CHAT EMPTY</h2>
			<?php
		}
	}elseif (isset($_POST['action']) && $_POST['action']=='send_message') 

	{

		$timestamp= date("h:i A",time());
		$query="INSERT INTO chat_messages (user_id,text_message,send_time) 
		VALUES (".$user['user_id'].",'".$_POST['message']."','".$timestamp."')";
		$result=mysqli_query($connection,$query);

	}elseif(isset($_GET['action']) && $_GET['action']=='show_all_users')
	{
		$query="SELECT * FROM users";
		$result=mysqli_query($connection,$query);

		if ($result->num_rows > 0) 
		{
			while ($row = mysqli_fetch_assoc($result)) 
			{
				if ($row['user_id']!=$user['user_id']) 
				{
					if ($row['is_online']==1) 
					{
?>
					<span id="online-user">
					<img src="images/<?php echo $row['user_image'];?>">
					<p>
						<?php echo $row['first_name']." ".$row['last_name'];?>
						<label style="float: right;">User Online</label>
					</p></span>
<?php
					}else
					{
?>					<span id="offline-user">
					<img src="images/<?php echo $row['user_image'];?>">
					<p>
						<?php echo $row['first_name']." ".$row['last_name'];?>
<?php
						$current_time=time();
						$logout_time=$row['logout_time'];
						$seconds=$current_time-$logout_time;
						if ($seconds>59) {
							$minutes=ceil($seconds/60);

							if ($minutes>59) 
							{
								$hours=ceil($minutes/60);
if ($hours>24) {
									$days=ceil($hours/60);
?>
									<label style="float: right;">User Offline</label>
<?php
								}else
								{
									echo "<label style='float: right;'>Last seen ".$hours." hours Ago</label>";
								}
							}else
							{
								echo "<label style='float: right;'>Last seen ".$minutes." minutes Ago</label>";
							}

						}else
						{
							echo "<label style='float: right;'>Last seen ".$seconds." seconds Ago</label>";
						}


?>
				
					</p></span>
<?php

					}
				}
			}
		}


	}

?>
<?php
	session_start();
	$user=$_SESSION['user'];
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $user['first_name']." ".$user['last_name'];?></title>
</head>
<script type="text/javascript">

	setInterval(
		function()
		{
			showMessages();
			showAllUsers();
		},1000);

	showMessages();
	showAllUsers();

	/*------Show Messages------*/
	function showMessages()
	{
		var obj;
		if (window.XMLHttpRequest) 
		{
			obj = new XMLHttpRequest();
		}else 
		{
			obj= new ActiveXObject("Microsoft.HXMHTTP");

		}

		obj.onreadystatechange= function()
		{
			if (obj.readyState == 4 && obj.status==200) 
			{
				document.getElementById('col-messages').innerHTML=obj.responseText;
			}
		}
		obj.open("GET","ajax_process.php?action=show_messages");
		obj.send();
	}
	/*------Send Message------*/
	function sendMessage()
	{
		var message=document.getElementById('msg').value;
		var obj;
		if (window.XMLHttpRequest) 
		{
			obj = new XMLHttpRequest();
		}else 
		{
			obj= new ActiveXObject("Microsoft.HXMHTTP");

		}

		obj.onreadystatechange= function()
		{
			if (obj.readyState == 4 && obj.status==200) 
			{
				document.getElementById('msg').value="";
				showMessages();
			}
		}
		obj.open("POST","ajax_process.php");
		obj.setRequestHeader("content-type","application/x-www-form-urlencoded")
		obj.send("action=send_message&message="+message);
	}

	/*------Show All Users------*/
	function showAllUsers()
	{
		var obj;
		if (window.XMLHttpRequest) 
		{
			obj = new XMLHttpRequest();
		}else 
		{
			obj= new ActiveXObject("Microsoft.XMLMHTTP");

		}

		obj.onreadystatechange= function()
		{
			if (obj.readyState == 4 && obj.status==200) 
			{
				document.getElementById('col-users').innerHTML=obj.responseText;
			}
		}
		obj.open("GET","ajax_process.php?action=show_all_users");
		obj.send();

	}
	
</script>
<style type="text/css">
	@import url(design.css);
</style>
<body>

	<div class="col-header">
		<img src="images/<?php echo $user['user_image'];?>">
		<h2>
			<?php echo $user['first_name']." ".$user['last_name'];?>
			<button id="logout" onclick="location.href='logout.php'">LOGOUT</button>
		</h2>
			
	</div>
	<div class="row">
		<div id="col-messages">
		</div>
		
		<div id="col-users">
			
		</div>
		<div class="send_msg">
			<input type="text" id="msg" placeholder="Type Message Here ......" />&nbsp;&nbsp;
			<button id="button-send" onclick="sendMessage();">SEND</button>
		</div>
	</div>

</body>
</html>
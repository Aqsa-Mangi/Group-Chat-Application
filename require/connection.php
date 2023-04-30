<?php 

	date_default_timezone_set('asia/karachi');
	mysqli_report(FALSE);

	define("hostname", "localhost");
	define("username", "root");
	define("password", "");
	define("database", "group_chat_application");

	$connection = mysqli_connect(hostname,username,password,database);

	if(mysqli_connect_errno())   
	{
		echo "Error No: ".mysqli_connect_errno();
		echo "<br>";
		echo "Error Msg: ".mysqli_connect_error();
		echo "<br>";
		die("Database Connection Failed !...");	
	}
?>
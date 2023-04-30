<?php
	session_start();
	if (isset($_SESSION['user'])) 
	{
		header("location:chat_messages.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
</head>
<style type="text/css">
	@import url(design.css);
</style>
<body>
	<center>
		<h1 id="header">Group Chat Application</h1>
		
		<fieldset id="FS">
			<?php 
				if (isset($_GET['msg'])) 
				{
					echo "<p style='color:red'>".$_GET['msg']."</p>";
				}
			?>
			<legend>Login here...!</legend>
			<form method="POST" action="login_process.php">
				<table>
					<tr>
						<td>Email : </td>
						<td>
							<input type="text" name="email" placeholder="Enter your email here" required/>
						</td>
					</tr>
					<tr>
						<td>Password : </td>
						<td>
							<input type="password" name="password" placeholder="Enter your password here" required/>
						</td>
					</tr>
					<tr>
						<td colspan="2" align="center">
							<input type="submit" name="login" value="Login" id="button" style="background-color: beige;">&nbsp;
							<input type="submit" name="cancel" value="Cancel" id="button" style="background-color: lightgray;">
						</td>
					</tr>
				</table>
			</form>
		</fieldset>
	</center>
</body>
</html>
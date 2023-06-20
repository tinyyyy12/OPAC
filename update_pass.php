<?php
	include "connect.php";
	include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>
	<style type="text/css">
		body
		{
			height: 600px;
			background-image: url(image/10.jpg);
			background-repeat: no-repeat;
			background-size:100%;

		}
		.wrapper
		{
			width:400px;
			height: 390px;
			margin:80px auto;
			background-color:black;
			opacity: .8;
			padding: 27px 15px;
			color: white;
		}
		.form-control
		{
			width: 300px;
		}
	</style>
</head>
<body>
	<div class="wrapper">
		<div style="text-align:center;">
			<h1 style="text-align:center; font-size: 25px; font-family: Lucida Console; color: white;">Change Your Password</h1>
		</div>
		<div style="padding-left: 30px;">
		<form action="" method="post">
			<label for="username">Username:</label>
			<input type="text" name="username" class="form-control" placeholder="Username" required=""><br>
			<label for="username">Email:</label>
			<input type="text" name="email" class="form-control" placeholder="Email" required=""><br>
			<label for="username">New Password:</label>
			<input type="text" name="password" class="form-control" placeholder="New Password" required=""><br>
			<button class="btn btn-default" type="submit" name="submit">Update</button>
			
		</form>	
	</div>
	</div>

    <?php

	if(isset($_POST['submit']))
	{
		if(mysqli_query($db,"UPDATE admin SET password='$_POST[password]' WHERE username='$_POST[username]'AND email='$_POST[email]';"))
		{
            ?>
            	<script type="text/javascript">
            		alert("The Password update Successfully.")
            	</script>


			<?php

		}
	}
    ?>
</body>
</html>
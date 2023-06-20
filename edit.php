<?php
	include "navbar.php";
	include "connect.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Profile</title>
	<style type="text/css">
		.form-control
		{
			width: 400px;
			height:30px;
		}
		form
		{
			padding-left: 450px;
		}
		label
		{
			color: white;
		}
	</style>
</head>
<body style="background-color:#173b18;">

		<h2 style="text-align:center; color:white;">Edit Information</h2>

		<div class="profile_info" style="text-align:center;">
			<span style="color:white;">Welcome, </span>
			<h4 style="color:white;"><?php echo $_SESSION['login_user']; ?></h4>
		</div> <br> <br>

		<form action="" method="post" enctype="multipart/form-data">
			<label for="lastname">Lastname</label>
			<input class="form-control" type="text" name="Lastname"><br>
			<label for="firstname">Firstname</label>
			<input class="form-control" type="text" name="Firstname"><br>
			<label for="Username">Username</label>
			<input class="form-control" type="text" name="Username"><br>
			<label for="Password">Password</label>
			<input class="form-control" type="text" name="Password"><br>
			<label for="Email">Email</label>
			<input class="form-control" type="text" name="Email"><br>
			<div style="padding-left:180px;">
				<button class="btn btn-default" type="submit" name="submit">Save</button>
			</div>
		</form>
</body>
</html>
<?php
	include "connect.php";
	include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<style type="text/css">
		.wrapper
		{
			width: 250px;
			margin:0 auto;
			color: white;
			background-color: lightblue;
			height: 0px;
		}
	</style>
</head>
<body style="background-color:#173b18;">
	<div class="container">
		<form action="" method="post">
			<button class="btn btn-default" style="float:right; width: 70px;" name= "submit1" type="submit">Edit</button>
		</form>
			<div class="wrapper">
				<?php
					if(isset($_POST['submit1']))
					{
						?>
						 <script type="text/javascript">
						 	window.location="edit.php"
						 </script>
						<?php
					}

       	$q=mysqli_query($db, "SELECT * FROM student where Username='$_SESSION[login_user]' ;" );
			  ?>
			  <h2 style="text-align: center;"> My Profile </h2>
			  <?php
			  	$row=mysqli_fetch_assoc($q);

			  	echo "<div style='text-align: center'><img class='img-circle profile-img' height=100 width=100 src='image/admin.png'".$_SESSION['pic']."'></div>";
			  ?>
			  	<div style="text-align:center;"><b>WELCOME, </b>
			  	<h4>
			  		<?php echo $_SESSION['login_user']; ?>
			  	</h4>
			</div> 	
			<?php

			echo "<b>";
				echo "<table class='table table-bordered'>";
					echo "<tr>";
						echo "<td>";
							echo "<b> First Name:  </b>";
						echo "</td>";

						echo "<td>";
							echo $row['Firstname'];
						echo "</td>";
					echo "</tr>";

					echo "<tr>";
					    echo "<td>";
					    	echo "<b> Last Name:  </b>";
						echo "</td>";

						echo "<td>";
							echo $row['Lastname'];
						echo "</td>";
					echo "</tr>";

					echo "<tr>";
					    echo "<td>";
					    	echo "<b> Username:  </b>";
						echo "</td>";

						echo "<td>";
							echo $row['Username'];
						echo "</td>";
					echo "</tr>";

					echo "<tr>";
					    echo "<td>";
					    	echo "<b> Password:  </b>";
						echo "</td>";

						echo "<td>";
							echo $row['Password'];
						echo "</td>";
					echo "</tr>";

					echo "<tr>";
					    echo "<td>";
					    	echo "<b> Email:  </b>";
						echo "</td>";

						echo "<td>";
							 echo $row['Email'];
						echo "</td>";
					echo "</tr>";
				echo "</table>";
				echo "</b>";
			?>
			</div>
	</div>
</body>
</html>
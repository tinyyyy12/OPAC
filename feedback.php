<?php
	include "navbar.php";
	include "connect.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Feedback</title>
	  <link rel="stylesheet" type="text/css" href="style.css">
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">

	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"   >
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	    <style type="text/css">
	    	body
	    	{
	    		background-image:url(image/11.jpg);
	    	}
	    	.wrapper
	    	{
	    		padding: 10px;
	    		margin: 20px auto;
	    		width: 900px;
	    		height: 600px;
	    		background-color: black;
	    		opacity: .6;
	    		color: white;
	    	}
	    	.form-control
     	    {
	     		height: 100px;
	     		width: 80%;
     	    }
     	    .scroll
     	    {
     	    	width: 100%;
     	    	height: 350px;
     	    	overflow: auto;
     	    }
	    </style>
</head>
<body>
	<div class="wrapper">
			<h4>If you have a suggestion, please leave a comment below</h4>
		<form style="" action="" method="post">
			<input class="form-control" type="text" name="comment" placeholder="Leave a comment..."> <br>
			<input class="btn btn-default" type="submit" name="submit" value="Comment" style="width:100px; height:35px;">
	    </form>
<br><br>
	<div class="scroll">
		<?php
			if(isset($_POST['submit']))
			{
				$sql="INSERT INTO `comments` VALUES('','Admin','$_POST[comment]');";
				If(mysqli_query($db,$sql))
					{
						$q="SELECT * FROM `comments` ORDER BY `comments`.`ID` DESC";
						$res=mysqli_query($db,$q);

						echo "<table class='table table-bordered'>";
						while ($row=mysqli_fetch_assoc($res))
						{
							echo "<tr>";
							    echo "<td>"; echo $row['Username']; echo "</td>";
								echo "<td>"; echo $row['comment']; echo "</td>";
							echo "</tr>";
						}
					}

			}

			else
			{
				$q="SELECT * FROM `comments` ORDER BY `comments`.`ID` DESC";
				$res=mysqli_query($db,$q);
					
						echo "<table class='table table-bordered'>";
						while ($row=mysqli_fetch_assoc($res))
						{
							echo "<tr>";
							    echo "<td>"; echo $row['Username']; echo "</td>";
								echo "<td>"; echo $row['comment']; echo "</td>";
							echo "</tr>";
						}
			}
		?>

	</div>
    </div>
</body>
</html>
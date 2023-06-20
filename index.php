<?php
	session_start()
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Online Library Management System
	</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

<style type="text/css">
    section
    {
      margin-top: -20px;
    }
    .logo
    {
    padding-left: 20px;
		}
		.side
		{
    float:right;
    word-spacing: 10px;
    padding: 10px;
		}
		nav li 
		{
		    display: inline-block;
		    line-height: 50px;
		}
  </style>
  
</head>


<body>

	<div class="wrapper">
		<header style="height: 130px; background-color: black;">
				<div class="logo">
					<img src="image/2.jpg">
					<h1 style="color: white;">ONLINE LIBRARY MANAGEMENT SYSTEM</h1>
				</div>

				<?php
				if(isset($_SESSION['login_user']))
					{?>
								<nav class="side">
									<ul>
										<li><a href="index.php">HOME</a></li>
										<li><a href="books.php">BOOKS</a></li>
										<li><a href="logout.php">LOGOUT</a></li>
										<li><a href="feedback.php">FEEDBACK</a></li>
									</ul>
								</nav>
						<?php
					}
					else
					{
						?>
						<nav class="side">
							<ul>
								<li><a href="index.php">HOME</a></li>
								<li><a href="books.php">BOOKS</a></li>
								<li><a href="admin_login.php">LOGIN</a></li>
							</ul>
						</nav>
					<?php
				  }
				?>
						
		</header>
		<section>
		<div class="sec_img" style="background-image: "image/1.jpg">
			<br><br><br>
			<div class="box" style="background-color: white; opacity: .6;">
				<br><br><br><br>
				<h1 style="text-align: center; font-size: 35px;">Welcome to Guelew Integrated School library</h1><br><br>
				
			</div>
		</div>
		</section>
		
	</div>

	<?php
			include "footer.php";
	?>
</body>
</html>
<?php
  include "connect.php";
  include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>

  <title>Admin Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"   >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <style type="text/css">
    section
    {
      margin-top: -20px;
    }
  </style>   
</head>
<body>

<section>
  <div class="log_img">
    <br> <br><br>
    <div class="box1" style="height: 500px;">
        <h1 style="text-align: center; font-size: 35px;font-family: Lucida Console;"> Online Public Access Catalogue </h1><br>
        <h1 style="text-align: center; font-size: 25px;">User Login Form</h1>
      <form name="login" action="" method="post">
        <div class="login">
          <label for="username"> Username</label>
          <input class="form-control" type="text" name="Username" placeholder="Username" required=""> <br><br>
          <label for="username"> Password</label>
          <input class="form-control" type="password" name="Password" placeholder="Password" required=""> <br>
          <input class="btn btn-default" type="submit" name="submit" value="Login" style="color: black; width: 70px; height: 30px"> 
        </div>
      
      <p style="color: white; padding-left: 15px;">
        <br><br>
        <a style="color:white;" href="update_pass.php">Forgot password?</a> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
        New to this website?<a style="color: white;" href="registration.php">Sign Up</a>
      </p>
    </div>
  </div>
</section>

  <?php

    if(isset($_POST['submit']))
    {
      $count=0;
      $res=mysqli_query($db,"SELECT * FROM `admin`WHERE Username='$_POST[Username]' && Password='$_POST[Password]';");

      $row= mysqli_fetch_assoc($res);
      $count=mysqli_num_rows($res);

      if($count==0)
      {
       ?>         <!--
                  <script type="text/javascript">
                    alert("The Username and Password doesn't match.");
                  </script>-->

         <div class="alert alert-danger" style="width:700px; margin-left: 300px; background-color: #ffffff; color:#ff1915;">
           <strong>The Username and Password doesn't match.</strong>
         </div>
        <?php
      }
      else
      {
        /*-------------if username&password are matches-----*/

        $_SESSION['login_user'] = $_POST['Username'];
        $_SESSION['pic']= $row['pic'];
        
        ?>
          <script type="text/javascript">
            window.location="index.php"
          </script>
        <?php
      }
    }

  ?>

</body>
</html>
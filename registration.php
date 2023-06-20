<?php
  include "connect.php";
  include "navbar.php";
?>


<!DOCTYPE html>
<html>
<head>

  <title>Admin Registration</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"   >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  
</head>
<body>

<style type="text/css">
    section
    {
      margin-top: -20px;
    }
  </style>   
</head>
<body>

<section>
  <div class="reg_img" align="center">

    <div class="box2" align="center" style="height: 650px;">
        <h1 style="text-align: center; font-size: 30px;font-family: Lucida Console;">Library Management System</h1> <br>
        <h5 style="text-align: center; font-size: 25px;">User Registration Form</h5>

      <form name="Registration" action="" method="post">

        <div class="login" style="text-align: left;">
          <label for="firstname">Lastname</label>
          <input class="form-control" type="text" name="Lastname" placeholder="LastName" required=""> 
          <label for="lastname">Firstname</label>
          <input class="form-control" type="text" name="Firstname" placeholder="FirstName" required="">
          <label for="username">Username</label>
          <input class="form-control" type="text" name="Username" placeholder="Username" required="">
          <label for="password"> Password</label>
          <input class="form-control" type="password" name="Password" placeholder="Password" required="">
          <label for="email"> Email</label>
          <input class="form-control" type="text" name="Email" placeholder="Email" required="">
          <input class="btn btn-default" type="submit" name="submit" value="Sign Up" style="color: black; width: 70px; height: 30px"> </div>
      </form>
     
    </div>
  </div>
</section>
    
         <?php

           if(isset($_POST['submit']))
           {

            $count=0;
            $sql="SELECT Username from `admin`";
            $res=mysqli_query($db,$sql);

            while($row=mysqli_fetch_assoc($res))
            {
              if($row['Username']==$_POST['Username'])
              {
                $count=$count+1;
              }

            }
            if($count==0)
            
            { mysqli_query($db,"INSERT INTO `admin` VALUES('$_POST[ID]', '$_POST[Lastname]', '$_POST[Firstname]', '$_POST[Username]', '$_POST[Password]', '$_POST[Email]', 'admin.png');");
         ?>
          <script type="text/javascript">
            alert("Registration successful");
          </script>
         <?php
           }
           else
           {
          ?>
                  <script type="text/javascript">
                   alert("The Username already exist");
                  </script>
         <?php

           }
          }
         ?>

</body>
</html>
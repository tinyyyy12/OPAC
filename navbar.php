<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>
    </title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"   >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>
<nav class="navbar navbar-inverse">
      <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand active" style="position:right;">Online Public Access Catalogue at Guelew Integrated School</a>
          </div>

          <ul class="nav navbar-nav navbar-right">
            <li><a href="index.php"><span class="glyphicon glyphicon-home">HOME</span></a></li>
            <li><a href="books.php"><span class="glyphicon glyphicon-book">BOOKS</span></a></li>

            <?php
                if(isset($_SESSION['login_user']))
            {  ?>

              <ul class="nav navbar-nav navbar-right">
                      <li><a href="student_info.php"><span class="glyphicon glyphicon-user">STUDENT_INFORMATION</span></a></li>
                      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"> LOGOUT</span></a></li>
                      <li><a href="feedback.php"><span class="glyphicon glyphicon-list-alt">FEEDBACK</span></a></li>
                    

               <?php   
            }
            else
            {  ?>
                      <ul class="nav navbar-nav navbar-right">
                      <li><a href="admin_login.php"><span class="glyphicon glyphicon-log-in"> LOGIN</span></a></li>
                    </ul>
               <?php 
            }
               ?>

      </div>
    </nav>
 
</body>
</html>
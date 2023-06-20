<?php
  include "connect.php";
  include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
     <title>Books Content</title>
     <link rel="stylesheet" type="text/css" href="style.css">
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"   >
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <style type="text/css">
       .search
       {
         padding-left:900px;
       }
       .hi
       {
        font-size: 20px;
        font-weight:bold;
       }
       body 
       {
        background-color: #173b18;
        font-family: "Lato", sans-serif;
        transition: background-color .5s;
       }
      .sidenav 
      {
        height: 100%;
        margin-top: 50px;
        width: 0;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #222222;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
      }
      .sidenav a 
      {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 25px;
        color: #818181;
        display: block;
        transition: 0.3s;
      }
      .sidenav a:hover 
      {
        color: #f1f1f1;
      }
      .sidenav .closebtn 
      {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
      }
      #main 
      {
        transition: margin-left .5s;
        padding: 16px;
      }
      @media screen and (max-height: 450px) 
      {
        .sidenav {padding-top: 15px;}
        .sidenav a {font-size: 18px;}
      }
      .img-circle
      {
        margin-left: 20px;
      }
      .h:hover
      {
        color: white;
        width: 300px;
        height:50px;
        background-color: grey;
      }
      .form-control
      {
        height: 300px;
      }
    </style>
</head>
<body>
  <!-------------------Side Navigation-------------->

        <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

        <div style="color:white; margin-left: 60px; font-size:20px;">

        <?php
         if(isset($_SESSION['login_user']))
         {
            echo "<img class='img-circle profile-img' height=130 width=130 src='image/admin.png'".$_SESSION['pic']."'>";
            echo "</br></br>";

            echo "Welcome, ".$_SESSION['login_user'];
        }
        ?> 
      </div>

        <div class="h"> <a href="add.php">Add Books</a></div>
       <div class="h"> <a href="#">Book Request</a> </div>
       <div class="h"> <a href="#">Book Information</a> </div>
      </div>

      <div id="main">
        <span style="font-size:30px;cursor:pointer; color:white;" onclick="openNav()">&#9776; open</span>

      <div class="container" >
          <h2 style="color: white; font-family: Lucida Console; text-align:center;"><b>Enter Content Here</b></h2>
            <form class="book" action="" method="post">
                 <label for="content" style="color: white;">Book Content</label>
                 <input type="text" name="content" class="form-control" placeholder="Book Content" required="">
            <button class="btn btn-default" type="submit" name="submit">ADD</button>
            </form>
      </div>

            <script type="text/javascript">
              alert ("Added Successful.");
            </script>


      <div>
          <?php
            if(isset($_POST['submit']))
      {   
          $sql="INSERT INTO `contents` VALUES('','$_POST[content]');";
          If(mysqli_query($db,$sql))
          {
             $q="SELECT `ID`, `content` FROM `contents` WHERE contents.ID =''";
            $res=mysqli_query($db,$q);
          }
      }
         ?>
      </div>


        <script>
      function openNav() {
        document.getElementById("mySidenav").style.width = "300px";
        document.getElementById("main").style.marginLeft = "300px";
        document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
      }

      function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft= "0";
        document.body.style.backgroundColor = "#173b18";
      }
      </script>


</div>
</body>
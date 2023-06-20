<?php
  include "connect.php";
  include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
     <title>Books</title>
     <meta name="viewport" content="width=device-width, initial-scale=1">
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
      .book
      {
        width: 400px;
        margin: 0px auto;
      }
      .form-control
      {
        background-color: #080707;
        color: white;
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
          <h2 style="color: white; font-family: Lucida Console; text-align:center;"><b>Add New Books</b></h2>
            <form class="book" action="" method="post">
                 <label for="bookId" style="color: white;">Book ID</label>
                 <input type="text" name="bookId" class="form-control" placeholder="Book ID" required="">
                 <label for="title" style="color: white;">Title</label>
                 <input type="text" name="title" class="form-control" placeholder="Book Name">
                 <label for="authorname" style="color: white;">Author's Name</label>
                 <input type="text" name="authorname" class="form-control" placeholder="Author's name"
                  required="">
                 <label for="department" style="color: white;">Department</label>
                 <input type="text" name="department" class="form-control" placeholder="Department" required="">
                 <button class="btn btn-default" type="submit" name="submit">ADD</button>
            </form>
        </div>
                <?php
                  if(isset($_POST['submit']))
                  {
                    if(isset($_SESSION['login_user']))
                    {
                      mysqli_query($db, "INSERT INTO books VALUES ('$_POST[bookId]', '$_POST[title]', '$_POST[authorname]','$_POST[department]');");
                      ?>
                        <script type="text/javascript">
                          window.location="content.php"
                        </script>
                      <?php

                    }
                    else
                    {
                      ?>
                      <script type="text/javascript">
                        alert("You need to login first.");
                      </script>
                    <?php
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

</body>
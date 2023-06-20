<?php
  include "connect.php";
  include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
     <title>Content Information</title>
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <style type="text/css">
       .search
       {
         padding-left:970px;
       }
       .hi
       {
        font-size: 20px;
        font-weight:bold;
       }
       body 
       {
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


  <!--------------------Side Navigation------------------->
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

        <a href="profile.php">Profile</a>
        <a href="books.php">Books</a>
        <a href="#">Book Request</a>
        <a href="#">Book Information</a>
      </div>

      <div id="main">
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
    
  <?php
        if(isset($_POST['submit']))
          {
           $sql="INSERT INTO `contents` VALUES('','$_POST[content]');";
           if(mysqli_query($db,$sql))
           {
            $q="SELECT `ID`, `content` FROM `contents` WHERE contents.ID =''";

            $res=mysqli_query($db,$q);

            while ($row=mysqli_fetch_assoc($res))
            {
              echo "<tr>";
                echo "<td>"; echo $row['content']; echo "</td>";
              echo "</tr>";
            }
           }
          }

          else
          {
            $q="SELECT `ID`, `content` FROM `contents` WHERE contents.ID =''";
            $res=mysqli_query($db,$q);

            while ($row=mysqli_fetch_assoc($res))
            {
              echo "<tr>";
                echo "<td>"; echo $row['content']; echo "</td>";
              echo "</tr>";
            }
          }
          ?>
            

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
</html>
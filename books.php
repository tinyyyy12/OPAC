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
      .pro:hover
      {
        color: white;
        width:500px;
        height:50px;
        background-color:grey;
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

        <div class="pro"><a href="add.php">Add Books</a></div>
        <div class="pro"><a href="request.php">Book Request</a></div>
        <div class="pro"><a href="issue_book.php">Issue Book Information</a></div>
      </div>

      <div id="main">
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
    

      <script>
      function openNav() {
        document.getElementById("mySidenav").style.width = "300px";
        document.getElementById("main").style.marginLeft = "300px";
        document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
      }

      function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft= "0";
        document.body.style.backgroundColor = "white";
      }
      </script>
       <!--------------------Search Bar------------------->

  <?php
           if (isset($_SESSION['login_user']))
        
     ?>
  <div class="search">
      <form class="navbar-form" method="post" name="form1">

          <input class="form-control" type="text" name="search" placeholder="Search books.." required=""> 
          <button style="background-color:#52B2BF ;" type="submit" name="submit" class="btn btn-default">
              <span class="glyphicon glyphicon-search"></span>
          </button>
      </form>
      <form class="navbar-form" method="post" name="form1">
          <input class="form-control" type="text" name="bookId" placeholder="Enter Book ID" required=""> 
          <button style="background-color:#52B2BF ;" type="submit" name="submit1" class="btn btn-default">Delete</button>
      </form>
  </div>

     

  <h2>List Of Books</h2>
  <?php

      if(isset($_POST['submit']))
      {
          $q=mysqli_query($db,"Select * from books where title like '%$_POST[search]%' ");
              if(mysqli_num_rows($q)==0)
              {
                echo "Sorry, No book found. Try searching again.";
              }
              else
              {
                echo "<table class='table table-bordered table-hover' >";
      echo "<tr style='background-color:#52B2BF;'>";
        //Table header
        echo "<th>"; echo "ID"; echo "</th>";
        echo "<th>"; echo "Title";  echo "</th>";
        echo "<th>"; echo "Author's Name";  echo "</th>";
        echo "<th>"; echo "Department";  echo "</th>";
        echo "</tr>"; 

      while($row=mysqli_fetch_assoc($q))
      {
        echo "<tr>";
        echo "<td>"; echo $row['bookId']; echo "</td>";
        echo "<td> Contentinfo.php?id=".$row['bookId']."'>";  echo $row['title']; echo "</td>";
        echo "<td>"; echo $row['authorname']; echo "</td>";
        echo "<td>"; echo $row['department']; echo "</td>";

        echo "</tr>";
      }
    echo "</table>";
              }
      }
          /* if button is not pressed.*/
      else
      {
        $res=mysqli_query($db,"SELECT * FROM `books`;");

    echo "<table class='table table-bordered table-hover' >";
      echo "<tr style='background-color:#52B2BF;'>";
        //Table header
        echo "<th>"; echo "ID"; echo "</th>";
        echo "<th>"; echo "Title";  echo "</th>";
        echo "<th>"; echo "Author's Name";  echo "</th>";
        echo "<th>"; echo "Department";  echo "</th>";
        echo "</tr>"; 

      while($row=mysqli_fetch_assoc($res))
      {
        echo "<tr>";
        echo "<td>"; echo $row['bookId']; echo "</td>";
        echo "<td><a href='Contentinfo.php?id=".$row['bookId']."'>"; echo $row['title']; echo "</td>";
        echo "<td>"; echo $row['authorname']; echo "</td>";
        echo "<td>"; echo $row['department']; echo "</td>";

        echo "</tr>";
      }
    echo "</table>";
      }
      if(isset($_POST['submit1']))
        {
          if(isset($_SESSION['login_user']))
          {
            mysqli_query($db, "DELETE FROM books where bookId='$_POST[bookId]';");
            ?>

            <script type="text/javascript">
              alert ("Delete Successful.");
            </script>

            <?php
          }
          else
        {
          ?>

            <script type="text/javascript">
              alert ("Please login first.");
            </script>

            <?php
        }
      }
        
 ?>
</div>
</body>
</html>
<?php
  include "connect.php";
  include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
  <title>Book Request</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
     <style type="text/css">
       .search
       {
         padding-left:800px;
       }
       .form-control
       {
        width: 300px;
        height: 30px;
       }
       .hi
       {
        font-size: 20px;
        font-weight:bold;
       }
       body 
       {
        background-image: url("image/12.jpg");
        background-repeat: no-repeat;
        background-size: 100%;
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
        color: white;
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
      .container
      {
        height: 500px;
        background-color: black;
        opacity: .7;
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
       <div class="h"> <a href="request.php">Book Request</a> </div>
       <div class="h"> <a href="issue_book.php">Book Information</a> </div>
      </div>

      <div id="main">
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
    

      <script>
      function openNav() {
        document.getElementById("mySidenav").style.width = "300px";
        document.getElementById("main").style.marginLeft = "300px";
        document.body.style.backgroundColor = "white";
      }

      function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft= "0";
        document.body.style.backgroundColor = "white";
      }
      </script>

<div class="container">
  <div class="srch">
    <form method="post" action="" name="form1">
        <label for="username"> Username</label>
        <input type="text" name="Username" class="form-control" placeholder="Username" required="">
        <label for="bookId">Book ID</label>
        <input type="text" name="bookId" class="form-control" placeholder="Book ID" required=""> <br>
        <button class="btn btn-default" name="submit" type="submit">Submit</button>
    </form>
</div>

 <h3 style="text-align:center;">Request of Book</h3>

      <?php
      if(isset($_SESSION['login_user']))
      {
        $sql="SELECT student.Username,SchoolID,books.bookId,title,authorname,department FROM student inner join issue_book ON student.Username=issue_book.Username inner join books ON issue_book.bookId=books.bookId WHERE issue_book.ApproveStatus =''";
        $res=mysqli_query($db,$sql);

         if(mysqli_num_rows($res)==0)
              {
                echo "<h2><b>";
                echo "There's no pending request.";
                echo "</h2></b>";
              }
              else
              {
                  echo "<table class='table table-bordered' >";
                  echo "<tr style='background-color:#52B2BF;'>";
                           //Table header

                  echo "<th>"; echo "Student Username"; echo "</th>";
                  echo "<th>"; echo "School ID";  echo "</th>";
                  echo "<th>"; echo "Book ID";  echo "</th>";
                  echo "<th>"; echo "Author's Name";  echo "</th>";
                  echo "<th>"; echo "Department";  echo "</th>";

                  echo "</tr>"; 

                while($row=mysqli_fetch_assoc($res))
                {
                  echo "<tr>";
                  echo "<td>"; echo $row['Username']; echo "</td>";
                  echo "<td>"; echo $row['SchoolID']; echo "</td>";
                  echo "<td>"; echo $row['bookId']; echo "</td>";
                  echo "<td>"; echo $row['authorname']; echo "</td>";
                  echo "<td>"; echo $row['department']; echo "</td>";
                  echo "</tr>";
              }
            echo "</table>";
      }
    }
    else
      {
        ?>
        <br>
        <h4 style="text-align:center;">You need to login first to see the request</h4>
        <?php
      }

      if(isset($_POST['submit']))
      {
        $_SESSION['Username']=$_POST['Username'];
        $_SESSION['bookId']=$_POST['bookId'];

        ?>
          <script type="text/javascript">
            window.location="approve.php"
          </script>

        <?php
      }
      ?>
    </div>
  </div>
</body>
</html>
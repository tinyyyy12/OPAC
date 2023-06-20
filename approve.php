<?php
  include "connect.php";
  include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
  <title>Approve Request</title>
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
      .Approve
      {
        margin-left: 420px;
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
       <br> <h3 style="text-align: center;">Approve Request</h3><br><br>
          <form class="Approve" action="" method="post">
            <label for="Approve_status">Approve or Not</label>
            <input class="form-control" type="text" name="ApproveStatus" placeholder="Yes or No" required=""> <br>
            <label for="Issue_date">Issue Date</label>
            <input class="form-control" type="text" name="IssueDate" placeholder="yyyy-mm-dd" required=""> <br>
            <button class="btn btn-default" type="submit" name="submit">Submit</button>
          </form>
      </div>
</div>

<?php
  if(isset($_POST['submit']))
  {
     mysqli_query($db,"UPDATE  `issue_book` SET  `ApproveStatus` =  '$_POST[ApproveStatus]', `IssueDate` =  '$_POST[IssueDate]' WHERE Username='$_SESSION[Username]' and bookId='$_SESSION[bookId]';");

  ?>
    <script type="text/javascript">
      alert("Approve Successfully.");
      window.location="request.php"
    </script>
  <?php
}
?>
</body>
</html>
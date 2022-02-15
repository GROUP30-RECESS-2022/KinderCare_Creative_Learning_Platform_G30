<?php
include_once('connectionCode.php');
// if (!isset($_SESSION)) {
//     session_start();
// }
// if(!isset($_SESSION["user_id"])) {
//     header('Location:index.php');
//     exit;
// }
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin Section</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="css/styling.css">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <!-- <!******** CSS Links********* -->  -->
   
    <link rel="stylesheet" href="css/style.css">
         <link rel="" stylesheethref="reg.css">  
 <!----===== Boxicons CSS ===== -->
 <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
      
      <!-- /************************* */ --> 
</head>
    <body>

        <div class="main">
            <?php
          include('adminsidebar.php');
        ?>
        <section class="homesection">
        <nav>
           <div class="sidebarbutton">
              <span class="icons" class="sidebar-btn"><img src="images/home.png" alt="" onclick=slide()></span>
            <span class="dasboard">Dashboard</span>
            <br> 
            <marquee style="color:#66bfbf;"> 
                <h5>Kinder-care Creative Learning Platform </h5>
            </marquee>
          </div>
       </nav><br><br>
<div>
      <table class="table table-striped table-hover table table-bordered table-sm table within">
          <tr>
              <th>User Code</th>
              <th>Teacher's First Name</th>
              <th>Teacher's Last Name</th>
              <th>Teachers' Email</th>
              <th>Teacher's Password</th>
          </tr>
           <?php
           $conn = mysqli_connect('localhost','root','','recess');
            $tt = mysqli_query($conn,"SELECT * FROM teacher");
                while ($td = mysqli_fetch_assoc($tt)) {
                    echo "<tr>";
                    echo "<td>".$td["teacherCode"]."</td>";
                    echo "<td>".$td["firstName"]."</td>";
                    echo "<td>".$td["lastName"]."</td>";
                    echo "<td>".$td["email"]."</td>";
                    echo "<td>".$td["pass"]."</td>";
                    echo "</tr>";
                }
          ?>
      </table>
 </section>
 </div>
       <script src="script.js"></script>
    </body> 
    </html>
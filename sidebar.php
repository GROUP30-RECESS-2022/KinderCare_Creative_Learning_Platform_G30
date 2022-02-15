    <?php
      session_start();
$email =$_SESSION['email'];
//echo $email;
include_once('connectionCode.php');
$teacher = mysqli_query($conn, "SELECT teacherCode, firstName, lastName FROM teacher WHERE email = '$email'");
$details = mysqli_fetch_assoc($teacher);
    ?>


    <div class="sidebar">
      <div class="sidebarhead"><h3>Teacher <?php echo $details['teacherCode']; ?></h3></div>
        <ul class="sidebarlinks">

          <li class="bx box-grid"><a href="teacherDashboard.php"><span class="icons"> <img src="images/home.png" alt="" onclick=slide()></span><span class="linkname"><h6>Dashboard</h6></span></a></li>

          <li><a href="register.php" class="bx box" ><span class="icons"><img src="images/register.png" alt="register"></span><span class="linkname"><h6>Register Pupil</h6></span></a></li>

          <li><a href="activate.php" class="bx box" ><span class="icons"><img src="images/register.png" alt="register"></span><span class="linkname"><h6>Activate/Deactivate</h6></span></a></li>

         <li><a href="assignmentsNew.php" class="bx box" ><span class="icons"><img src="images/barchart.png" alt=""></span><span class="linkname"><h6>Give assignments</h6></span></a></li>

         <li>
          <a href="updateComment.php" class="bx box"><span class="icons"><img src="images/linechart.png" alt=""></span>
            <span class="linkname">
              <h6>
                Grades & Comments
              </h6>
            </span>
          </a>
         </li>

         <li>
          <a href="" class="bx box"><span class="icons"><img src="images/linechart.png" alt=""></span>
            <span class="linkname">
              <h6>
                Report
              </h6>
            </span>
          </a>
         </li>

         <li>
          <a href="logout.php" class="bx box"><span class="icons"><img src="images/bxs-log-out.png" alt=""></span>
            <span class="linkname">
              <h6>Log Out</h6>
            </span>
          </a>
        </li>
       </ul>
         </div>
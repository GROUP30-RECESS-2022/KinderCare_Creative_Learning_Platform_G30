<?php
include_once('connectionCode.php');
// if (!isset($_SESSION)) {
//     session_start();
// }
// if(!isset($_SESSION["email"])){
//     header('Location:logintr.php');
//     exit;
//
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KCLP   |  Activate/Deactivate</title>

    <link rel="stylesheet" type = "text/css" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/styling.css">
</head>
<body>
<?php
  include "sidebar.php";
?> 
<div class="main">
         
    <section class="homesection">
        <nav>
           <div class="sidebarbutton">
              <span class="icons" class="sidebar-btn"><img src="images/home.png" alt="" onclick=slide()></span>
            <span class="dasboard">Dashboard</span>
            <br> <marquee style="color:#66bfbf;"> <h5>Kinder-care Creative Learning Platform </h5> </marquee>
          </div>
       </nav>
       <form  class="formAssignment" action="assignmentsNew.php" method="POST" enctype="multipart/form-data">  
        <table class="table table-striped table-hover table table-bordered table-sm table>  
          <tr>  
            <td colspan="10"> Please Select Letters  for the Assignment  from Here:</td>  
          </tr>  
        <tr>
      <td><input type="checkbox" name="letter[]" value="A"> A</td> 
        
      <td><input type="checkbox" name="letter[]" value="B"> B</td> 
       
      <td><input type="checkbox" name="letter[]" value="C"> C</td> 
        
      <td><input type="checkbox" name="letter[]" value="D"> D</td> 
        
      <td><input type="checkbox" name="letter[]" value="E"> E</td> 
    </tr>  
    <tr>
      <td><input type="checkbox" name="letter[]" value="F"> F</td> 
        
      <td><input type="checkbox" name="letter[]" value="G"> G</td> 
        
      <td><input type="checkbox" name="letter[]" value="H"> H</td> 
        
      <td><input type="checkbox" name="letter[]" value="I"> I</td> 
        
      <td><input type="checkbox" name="letter[]" value="J"> J</td> 
      </tr>  
    </tr>

    <tr>
       
      <td><input type="checkbox" name="letter[]" value="K"> K</td> 
        
      <td><input type="checkbox" name="letter[]" value="L"> L</td> 
        
      <td><input type="checkbox" name="letter[]" value="M"> M</td> 
        
      <td><input type="checkbox" name="letter[]" value="N"> N</td> 
       
      <td><input type="checkbox" name="letter[]" value="O"> O</td> 
      </tr>     
    <tr>
      
      <td><input type="checkbox" name="letter[]" value="P"> P</td> 
        
      <td><input type="checkbox" name="letter[]" value="Q"> Q</td> 
        
      <td><input type="checkbox" name="letter[]" value="R"> R</td> 
        
      <td><input type="checkbox" name="letter[]" value="S"> S</td> 
        
      <td><input type="checkbox" name="letter[]" value="T"> T</td> 
      </tr> 
    <tr>
      <td><input type="checkbox" name="letter[]" value="U"> U</td> 
        
      <td><input type="checkbox" name="letter[]" value="V"> V</td> 
        
      <td><input type="checkbox" name="letter[]" value="W"> W</td> 
        
      <td><input type="checkbox" name="letter[]" value="X"> X</td> 
        
      <td><input type="checkbox" name="letter[]" value="Y"> Y</td> 
    </tr>
    <tr> 
      <td><input type="checkbox" name="letter[]" value="Z"> Z</td>    
    </tr>
    </table> <br><br> 
        <div class="assignment">
                     <?php
                    $previousAssignmentNo = mysqli_query($conn, "SELECT max(assignmentId) AS 'previousAssignmentNo'  FROM assignments");
                    $assignmentNo =mysqli_fetch_assoc($previousAssignmentNo);
                    $add = $assignmentNo['previousAssignmentNo']+1;
                    $assignmentCode = "Assignment".$add;
                    ?> 
                    <label >Enter Assignment Name: <?php echo $assignmentCode ?></label><br><br>
                    <label for="date">Enter Start Date for the set assignment:</label>
                    <input class="assignmentBox"type="date"name="date1" required><br><br>
                    <label for="time">Enter Start time for the set assignment:</label>
                    <input class="assignmentBox"type="time"name="time1" required><br><br>
                    <label for="date">Enter End Date for the set assignment:</label>
                    <input class="assignmentBox"type="date"name="date2" required><br><br>
                    <label for="date">Enter End time for assignment:</label>
                    <input class="assignmentBox"type="time"name="time2" required><br><br>
                    <label for="attemptNo">Choose number of attempts:</label>
                    <select class="assignmentBox" name="attemptNo">
                    <option  value="1" selected>1</option>
                    <option value="2">2</option>
                    <option value="4">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    </select>
                    <input type="submit" name="submit" class="btn btn-secondary btn-sm">
            </div>
   </form>

   <h1 class="assignmentView">View Given Assignments</h1>
   <table class="table table-striped table-bordered table-sm assignView">
     <thead class="assign">
        <th>Assignment code</th>
        <th>Assignment Name</th>
        <th> Start Date</th>
        <th>start time</th>
        <th> End Date</th>
        <th> End time</th>
        <th>Assignment Given</th>
     </thead>
   
  <?php
  $conn = mysqli_connect('localhost','root','','recess');
   $table=mysqli_query($conn, "SELECT*FROM assignments");
   while ($td = mysqli_fetch_assoc($table)) {
                    echo "<tr>";
                    echo "<td>".$td["assignmentId"]."</td>";
                    echo "<td>".$td["assignmentName"]."</td>";
                    echo "<td>".$td["startDate"]."</td>";
                    echo "<td>".$td["startTime"]."</td>";
                    echo "<td>".$td["endDate"]."</td>";
                    echo "<td>".$td["endTime"]."</td>";
                    echo "<td>".$td["assignment"]."</td>";
                    echo "</tr>";
                } 
          ?>
 </table>  
 <?php
  //  include('footer.php');   
?>
   </section>

</div> 
<?php  
if(isset($_POST['submit'])){
$startDate = $_POST['date1'];
$startTime = $_POST['time1'];
$endDate=$_POST['date2'];
$endTime=$_POST['time2'];
$checkbox = $_POST['letter'];
$attemptNo = $_POST['attemptNo'];
if(!empty($_POST['letter'])){
  $char=implode("", $checkbox);
$charNumber = count($checkbox);
   if($charNumber <= 8){
    $query = "INSERT INTO assignments(assignmentName,startDate,startTime,endDate,endTime, assignment,attemptsAllowed) values('$assignmentCode','$startDate','$startTime','$endDate','$endTime','$char','$attemptNo')";        
   $assignQuery = mysqli_query($conn, $query);

    if($assignQuery){
      echo "<h3>".$assignmentCode." has been set successfully </h3>";
    }

   }
   else{
     echo "<h3>You have assigned ".$charNumber." letters <br> You can assign atmost 8 letters </h3>";
   }
      
}
}   
?>
<script src="sidebar.js"></script>
</body>
</html> 





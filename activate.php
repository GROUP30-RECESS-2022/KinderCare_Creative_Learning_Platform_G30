<?php
include_once('connectionCode.php');
// if (!isset($_SESSION)) {
//     session_start();
// }
// if(!isset($_SESSION["email"])) {
//     header('Location:logintr.php');
//     exit;
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KCLP   |  Activate/Deactivate</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="css/styling.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script> -->
    <style type="text/css">
        td{
            color: blue;
        }
        .activateButton{
            height: 45px;
            width:90px;
            border-style:ridge;
            border-radius: 10px;
            font-size: 20px;
        }

    </style>

</head>
<body>
<div class="main">
    <?php
        include "sidebar.php";
    ?>  
    <section class="homesection">
        <nav>
           <div class="sidebarbutton">
              <span class="icons" class="sidebar-btn"><img src="images/home.png" alt="" onclick=slide()></span>
            <span class="dasboard">Dashboard</span>
            <br> <marquee style="color:#66bfbf;"> <h5>Kinder-care Creative Learning Platform </h5> </marquee>
          </div>
       </nav>

<?php
$Activate = "SELECT userCode,firstName,lastName,phoneNumber,Id,activationRequest,activationStatus FROM pupil WHERE activationStatus='activated'OR activationStatus='deactivated'AND activationRequest='sent'";

        $Activate1 = mysqli_query($conn, $Activate);

            ?>
    <form action="activate.php" method="POST" >
    <div class="container">
        
    <table class="table table-striped table-hover table table-bordered table-sm table">
        <tr>
            <b> 
            <th> User Code</th>
            <th> First Name</th>
            <th> Last Name</th> 
            <th>Phone Number </th>
            <th>Activation Status </th>
             <th>Action</th>
            </b> 
        </tr>
            <?php
            while($request= mysqli_fetch_assoc($Activate1)){ 
            ?>
        <tr>
            <td><?php echo $request['userCode']; ?></td>
            <td><?php echo $request['firstName']; ?></td>
            <td><?php echo $request['lastName']; ?></td>
            <td><?php echo $request['phoneNumber']; ?></td>
                    <?php
                    if($request['activationStatus'] == "activated"){
                        echo "<td style = 'color: green'>".$request['activationStatus']."</td>";
                    }
                    else{
                        echo "<td style = 'color: red'>".$request['activationStatus']."</td>";
                    } ?>
                      
            <td> 
                <select name="activationStatus<?php echo $request['Id']; ?>">
                <option selected value= "<?php echo $request['activationStatus'];?>">Choose status</option>
                <option value= "activated">Activate</option>
                <option value = "Deactivated">Deactivate</option>
         
                </select> 
             </td>
         </tr>
                    
         
<?php
}
?>
    </table>
    <center><input type="submit" name = "submit" value = "update" class="activateButton"></center>
    </div>
    </form>

    <?php
         

           $codeMinimum = mysqli_fetch_assoc( mysqli_query($conn, "SELECT min(Id) AS 'IdMin' FROM pupil") );
           $codeMaximum = mysqli_fetch_assoc( mysqli_query($conn, "SELECT max(Id) AS 'IdMax' FROM pupil") );

           if(isset($_POST["submit"])){

            for($i = $codeMinimum['IdMin']; $i <= $codeMaximum['IdMax']; $i++ ){
            if(!empty($_POST['activationStatus'.$i])){
              $activationStatus = $_POST['activationStatus'.$i];
                // echo $activationStatus."<br>";
        
                    $activationChange = mysqli_query($conn, "UPDATE pupil SET activationStatus = '$activationStatus' WHERE Id = $i AND activationRequest = 'sent' ");
                
            }
        }
  
     }
  
        //  header("location:activateStudent.php");        
          
      ?>
   </section>
</div> 
       
<script src="sidebar.js"></script>
</body>
</html> 
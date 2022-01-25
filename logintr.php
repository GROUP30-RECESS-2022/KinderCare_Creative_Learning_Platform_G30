<?php
        session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>teacher's log in</title>
</head>
<body>
    <h1>Login page</h1>
    <div class="logintr">
  20.      <form class="forms" action="logintr.php" method="post">
            <b>
            <div class="container">
            <label>email:</label> <br> <br>
            <input type="text" class="login" placeholder="input your email" name="email" required autofocus> <br> <br> <br> 

            <label>Password:</label> <br> <br>
            <input type="password" class="login" placeholder="input password" name="password" required autofocus> <br> <br>
            <i>Forgot Password? <a href="forgotPassword.php">Reset Pasword </a> </i>  <br> <br> <br>

            <center>
                <input type="submit" class="buttons" value="Log in" name="submit"> <input type="reset" class="buttons" value="Clear"> <br> <br> 
            </center>  
            <i>Are you a new user? <a href="reg.php">Create Account </a> </i>
            </div>
            </div>
            </b>
        </form>

            
        <?php
            if(isset($_POST['submit'])){
                $conn = mysqli_connect('localhost','root','','recess');
                $email =mysqli_real_escape_string($conn, $_POST['email']); 
                $password = mysqli_real_escape_string($conn, $_POST['password']);
                $query1 = "SELECT *
                 FROM teacher WHERE email = '$email' AND pass = '$password' limit 1";

                 //$userType = "SELECT userType
                 //FROM teacher WHERE email = '$email' AND Pass = '$password' limit 1";

                $result= mysqli_query($conn, $query1);
            
                $_SESSION['Password'] = $password;
                $_SESSION['email'] = $email;

                if(mysqli_num_rows($result)==1){
                $userType = mysqli_fetch_assoc($result);
                    if($userType["userType"]==='teacher'){
                 		header('location:dashboards\teacherDashboard.php');
                    }

                //  	elseif ($userType["userType"]==='lecturer') {
                //  		header('location:dashboards\lecturerDashboard.php');
                //  	}

                //  	elseif ($userType["userType"]==='HoD') {
                //  		header('location:dashboards\hoDDashboard.php');
                //  	}

                //   elseif ($userType["userType"]==='AR') {
                //  		header('location:dashboards\ARDashboard.php');
                // 	}
                    
                //  }

                else{
                	echo("Enter correct credentials");
                }
           
            }

        ?>
</body>

</html>




</body>
</html>
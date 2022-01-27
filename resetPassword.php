<html>
    <head>
        <title> KCLP  |  Forgot Password</title>
        
        <link rel="stylesheet" href="resetpass.css">
        
            <style>
                img{
                display: block;
                margin left: auto;
                margin right: auto;
            }
            </style>
        
    </head>
<body>
    <H1> <center>RESET PASSWORD</center></H1>
         <div  class="logo">
              <img src= "logo2.png" alt="Reset Password Logo" class="center">
         </div>
       <div class="login2">
        <form class="forms" action="resetPassword.php" method="post">
           <div class="email">
	            <label>Input e-mail:</label> <br>
	            <input type="text" class="login" placeholder="enter your email" name="email" autofocus > <br> <br>
          </div>

         <div class="pass">
	            <label>Input New password:</label> <br>
	            <input type="password" class="login" placeholder="enter a new password" name="password1"> <br> <br> <br>
        </div>
                

        <div class="comfirm">
	            <label>Confirm password:</label> <br>
	            <input type="password" class="login" placeholder="re-enter your password" name="password2"> <br> <br> <br>
        <!-- </div> -->
         <div class="buttons">
                <input type="submit" class="btn" value="Submit" name="submit"> <input type="reset" class="btn" value="Clear"> <br> <br>
        <!-- </div> -->
                
             <i>Return to login? <a href="logintr.php">Login</a></i>
            
            </b>
        </form>
        </div>
            
        <?php
            
            if(isset($_POST['submit'])){
            $conn = mysqli_connect('localhost','root','','recess');
            $email =mysqli_real_escape_string($conn, $_POST['email']);
            $password1 = mysqli_real_escape_string($conn, $_POST['password1']);
            $password2 = mysqli_real_escape_string($conn, $_POST['password2']);
            $query = "SELECT email FROM teacher WHERE email = '$email'LIMIT 1";
            $result = mysqli_query($conn, $query);
            $userEmail = mysqli_fetch_assoc($result);
            if($userEmail['email']=== "$email" AND "$password1" === "$password2"){
              $query2 = "UPDATE teacher SET Pass = '$password1' WHERE email = '$email'";
              mysqli_query($conn,$query2);          
              header('location:logintr.php');
            
            }
            else{
                echo("Please Enter matching passwords");    
            }
            }           
          ?> 
</body>
</html>
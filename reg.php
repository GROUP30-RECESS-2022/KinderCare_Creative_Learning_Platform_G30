<html>
    <head>
        <title>Registration Page</title>
        
        <link rel="stylesheet" href="styles.css">
    <body>
    <?php
        $emailError = $nameError = $passwordError="";
        //$email=$firstName=$lastName =$password1=password2="";
            
            //if(isset($_POST['submit']))
           if ($_SERVER["REQUEST_METHOD"]=="POST") {
           $conn = mysqli_connect('localhost','root','','recess');
            $email =mysqli_real_escape_string($conn, $_POST['email']);
            if(empty($_POST["email"])){
                $emailError="email is required";
            }
             else{
                 $email=$_POST['email'];
                 // check for format in the email
               if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
                    $emailError="invalid email format";
                 }

                } 
                 $firstName =mysqli_real_escape_string($conn, $_POST['firstName']);
                   if(empty($_POST["firstName"])){
                    $nameError="Ooops Please Enter your first Name";
            }
            else{
                $firstName=$_POST['firstName'];

            }
            $lastName=mysqli_real_escape_string($conn, $_POST['lastName']);

              if(empty($_POST['lastName'])){
                $passwordError="please enter your last Name";
            }

            else {
                $lastName=$_POST['lastName'];
            } 
             $password1 = mysqli_real_escape_string($conn, $_POST['password1']);
            if(empty($_POST['password1'])){
                $passwordError="please enter your Password and confirm it to proceed";
            }
            else {
                $password1=$_POST[password1];  
            }
            $password2 = mysqli_real_escape_string($conn, $_POST['password2']); 

             if(empty($_POST['password2'])){
                $passwordError="please confirm your Password";
            }
            else {$password2=$_POST['password2'];
            } 
            
    
            if(("$password1" === "$password2") && !empty(lastName) && !empty(firstName) &&!empty(lastName)){
              $query = "INSERT INTO teacher(email, firstName,lastName, Pass) VALUES ('$email', '$firstName', 'lastName','$password1')";
              mysqli_query($conn,$query);
            
            header('location:logintr.php');
            
            }
            //else{
              
           // }
        }
          ?> 



        <form class="forms" action="reg.php" method="post">
                <label>Enter your e-mail:</label> <br>
            <input type="text" class="login" placeholder="Enter correct e-mail" name="email" ><span class="errormessage">* <?php echo $emailError;?></span> <br> <br>

            <label> Your First Name:</label> <br>
            <input type="text" class="login" placeholder="enter your First Name" name="firstName" > <span class="errormessage">*<?php echo $nameError;?></span><br> <br>
            <label>Enter your Last Name:</label> <br>
            <input type="text" class="login" placeholder="enter your last Name" name="lastName" ><span class="errormessage">* <?php echo $nameError;?></span><br><br>
           <label> your Desired password:</label> <br>
            <input type="password" class="login" placeholder="enter a desired password" name="password1"> <span class="errormessage">* <?php echo $passwordError;?></span><br> <br>

            <label>Confirm password:</label> <br>
            <input type="password" class="login" placeholder="re-enter your password" name="password2"> <span class="errormessage">*<?php echo $passwordError;?></span><br> <br>
            <center>
                <input type="submit" class="btn" value="Submit" name="submit">
                
                <input type="reset" class="btn" value="Clear"> <br> <br> 
            </center>  

             <i>Already have an account? <a href="login.php">Login</a></i>
        </form>
<!-- testing a change done by someone else             -->
        
        <script src="formjava.js"></script>
</body>

</html> 
    
 

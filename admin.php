<?php
  session_start();
?>
<!DOCTYPE html>
  <head>
    <title>Admin Login</title>
    <link rel="icon" type="image/x-icon" href="./assets/favicon.ico" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    <link rel="stylesheet" href="admin style.css">
<style>
   body{
        padding: 20px !important;
        display:flex;
        flex-direction:column;
        justify-content: center;
        align-items:center;
        background color:red;
      }   
 </style>
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
       <link rel="stylesheet" type = "text/css" href="css/styling.css">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</head>
  <body>
    <div class="hello">
  <br/>
    <br/>
    <br/>
      <h4 id="adminPage" > <b>Admin login</b></h4>
    
    <br>
      <form class="adminForm"action="admin.php" method="post">
          <label for="">Username</label>
          <input type="text" name="username" required>
<br/>
          <label for="">Password</label>
          <input type="password" name="passcode" required>
<br/>
          <input type="submit" class="adminBtn"  btn btn-info btn-sm name="submit" value="Login">
      </form>
      </div>
  </body>
  <br>
  <br>
</html>        
<?php
  # here we check if our data is submited via the post
if (isset($_POST["submit"])){
  # here we are adding the connection functionality to this page
  $conn = mysqli_connect('localhost','root','','recess');
   $userName =mysqli_real_escape_string($conn, $_POST['username']); 
    $adminPassword = mysqli_real_escape_string($conn,$_POST['passcode']);
# this code below selects all the data in a table called admin
 if(!empty($userName)&&!empty($adminPassword)){
    $sql =  "SELECT * FROM admin WHERE username='$userName' AND Password='$adminPassword'";
    $query = mysqli_query($conn,$sql);
    if($query){
         if(mysqli_num_rows($query)==1){
        # here we are setting the session variable named username and password
        $_SESSION["username"] = $userName;
        $_SESSION['passcode'] = $adminPassword;
         # here the user is redirected to the home.php on login successfull
         header('location:home.php');
    }

    else{
      echo "Please Enter correct Credentials";
       header('location:index.php');
}

 }

 }

}
?>
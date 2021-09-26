<?php

	include_once("db_con/database_con.php");   

    if(isset($_POST['reset'])){

      $user = $_POST["user_name"];
      $password = $_POST['newpassword'];
      $hash = password_hash($password,PASSWORD_DEFAULT);
      $c_hash = password_hash($password,PASSWORD_DEFAULT);

      $query1 = "SELECT username FROM users WHERE username = '$user' limit 1 ";
  
      $result1 = mysqli_query($conn, $query1);

      if($result1 && mysqli_num_rows($result1) > 0){

        $setpass = "UPDATE users SET password ='$hash', confirm_password='$c_hash' WHERE username = '$user'";
        $set_result= mysqli_query($conn, $setpass);
  
        if($set_result){
          $wrng_pass= " Password Updated.";
        }
        else {
          $wrng_pass = "Password Not Updated.";
        }
      }
      else {
        $wrng_pass = "Enter Valied Username.";
      }
      
    } 


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Inventory Management System</title>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js" ></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>

    <link rel="stylesheet" href="css/all.min.css" >
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <link rel="stylesheet" href="css/style.css">
 </head>
<body>
	<!-- Navbar -->
	<?php //include_once("./templates/header.php"); ?>
	<br/><br/>
  <div class="container">
    <form  method="POST" class="text-center">
          <h2 class=" mb-3 mt-3">Reset Your Password</h2>
          <?php 
                    if(isset($wrng_pass))
                    {
                        echo '<h4 class= "wrng_pass" style="Color: red" >' .$wrng_pass. '</h4>' ;
                    }
                ?>
          <div class="form-group">
              <h4>Username: </h4>
              <input type="text" name="user_name" placeholder="Username" required>
          </div>
          <div class="form-group">
          <h4>New password: </h4>
              <input type="password" name="newpassword" placeholder="New Password" required>
          </div>
          <div class="form-group">
              <input type="submit" name="reset" class="btn btn-primary " value="change password">
          </div>
    </form>
        <div class="new_user">
            <a href="login.php" class="btn btn-success">Login Here!</a>
        </div>
	</div>

  <script src="script.js"></script>
	
</body>
</html>
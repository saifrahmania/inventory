<?php
		session_start();

		include_once("db_con/database_con.php");

    if(isset($_SESSION["username"]) == true){

      $user = $_SESSION["username"];
      $query1 = "SELECT * FROM users WHERE username = '$user' limit 1 ";
  
      $result1 = mysqli_query($conn, $query1);
  
      $user_data = mysqli_fetch_array($result1);
      $username = $user;
      $full_name = $user_data['fullname'];
      $email = $user_data['email'];
    }
      if(isset($_POST['submit'])){
        
        $filename = $_FILES['image']['name'];
        $temp = $_FILES['image']['tmp_name'];
        $folder = "image/".$filename;
        move_uploaded_file($temp,$folder);
  
        if(!empty($filename)){
  
          $query = "INSERT INTO userimg(img, user) VALUES ('$folder','$username')";
          $result = mysqli_query($conn, $query);
        }
        else {
          $wrng_pass = "No image.";
        }
        $user_name = $_POST['user_name'];
        $fullname =$_POST['full_name'];
        $email = $_POST['email'];

        $up_query = "UPDATE users SET username = '$user_name', fullname = '$fullname', email = '$email' WHERE username = '$username' limit 1 ";
        $up_result= mysqli_query($conn, $up_query);

        if($result && $up_result){
          $wrng_pass= " Successfully Updated.";
          header("Location: dashboard.php");
          die;
        }
        else {
          $wrng_pass = "Not Updated.";
        }
      }

    // if(isset($_POST['reset'])){

    //   $password = $_POST['newpassword'];
    //   $hash = password_hash($password,PASSWORD_DEFAULT);
    //   $c_hash = password_hash($password,PASSWORD_DEFAULT);

    //   $setpass = "UPDATE users SET password ='$hash', confirm_password='$c_hash' WHERE username = '$user'";
    //   $set_result= mysqli_query($conn, $setpass);

    //   if($set_result){
    //     $wrng_pass= " Password Updated.";
    //   }
    //   else {
    //     $wrng_pass = "Password Not Updated.";
    //   }
    // } 


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
	<?php include_once("./templates/header.php"); ?>
	<br/><br/>
  <div class="container">
  <form  method="post" enctype="multipart/form-data">
          <h2 class=" mb-3 mt-3">Update profile</h2>
          <?php 
                    if(isset($wrng_pass))
                    {
                        echo '<h4 class= "wrng_pass" >' .$wrng_pass. '</h4>' ;
                    }
                ?>
          <div class="form-group " >
          <input type="file" name="image" />
          </div>
          <div class="form-group">
              <h4>Username: </h4>
              <input type="text" name="user_name" value="<?php echo $user ;?>" >
          </div>
          <div class="form-group">
              <h4>Full Name: </h4>
              <input type="text" name="full_name" value="<?php echo $full_name ;?>">
          </div>
          <div class="form-group">
              <h4>Email: </h4>
              <input type="email" name="email" value="<?php echo $email ;?>">
          </div>
          <div class="form-group">
            <input type="submit" name="submit" class="btn btn-primary " value="Save User">
          </div> 
          <!-- <div class="form-group">
          <h4>New password: </h4>
              <input type="password" name="newpassword">
              <input type="submit" name="reset" class="btn btn-primary " value="change password">
          </div> -->
        </form>
	</div>

  <script src="script.js"></script>
	
</body>
</html>
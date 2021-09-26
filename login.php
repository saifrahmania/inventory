<?php
session_start();
    include("db_con/database_con.php");
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //somthing read
        $user_name = $_POST['user_name'];
		$password = $_POST['password'];
        
        if(!empty($user_name) && !empty($password))
        {
            //fetch from database
            $query = "SELECT username, password FROM users WHERE username = '$user_name' limit 1 ";
            $result = mysqli_query($conn, $query);

            if($result){
                if($result && mysqli_num_rows($result) > 0)
				{
					$user_data = mysqli_fetch_assoc($result);
					if(password_verify($password, $user_data['password']))
					{
                        $_SESSION['username'] = $user_data['username'];
                        $logintime = "UPDATE users SET added_date = now() where username = '$user_name'";
                        mysqli_query($conn, $logintime);
						header("Location: dashboard.php");
						die;
					}
                    else
                    $wrng_pass = "Wrong username or password!";
				}
                else
                $wrng_pass = "User does not exist!!";
            }
        }
        else
        $wrng_pass = "Wrong inputs!";
    }
?>

<html lang="en">
<head>
   
    <title>Login</title>
    <script src="js/jquery.min.js"></script>
	<script src="js/popper.min.js" ></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>

	<link rel="stylesheet" href="css/all.min.css" >
	<link rel="stylesheet" href="css/bootstrap.min.css" >
 	<link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="login_home">
        <div class="bg_img">
        <img src="image/Inventory-Control.jpg" alt="bookwithgreen">
        </div>
        <div class="overlay">
            <div id="login_window" class="login_window">
                <h2>Welcome to</h2>
                <h4> Inventory Management System</h4>
               <?php 
                    if(isset($wrng_pass))
                    {
                        echo '<h4 class= "wrng_pass" >' .$wrng_pass. '</h4>' ;
                    }
                ?>
                <form method="POST">
                    <div class="fill_box">
                        <h4>Username: </h4>
                        <input type="text" name="user_name" placeholder="Username">
                    </div>
                    <div class="fill_box">
                    <h4>Password: </h4>
                        <input type="password" name="password" id="" placeholder="Password">
                    </div>
                    <div class="submit">
                        <input type="submit" value="Login">
                    </div>
                </form>
                <div class="new_user">
                    <a href="resetpassword.php">Forget Password? </a>
                </div>
        </div>
        
    </div>
    
    
</body>
</html>
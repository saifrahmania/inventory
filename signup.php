<?php
session_start();

    include("db_con/database_con.php");

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        //somthing was posted
        $user_name = $_POST['user_name'];
        $fullname =$_POST['full_name'];
        $email = $_POST['email'];
		$password = $_POST['password'];
        $c_password = $_POST['c_password'];
        $operator = $_POST['operator'];

        $hash = password_hash($password,PASSWORD_DEFAULT);
        $c_hash = password_hash($password,PASSWORD_DEFAULT);
        
        if(!empty($user_name) && !empty($password))
        {
            if( strlen($user_name) >= 4 && strlen($user_name <= 15))
            {
                if($password == $c_password)
                {
                    //save to database
                    $query = "INSERT INTO users(username, fullname, email, password, confirm_password, operator) VALUES ('$user_name','$fullname','$email','$hash','$c_hash','$operator')";
                    //mysqli_query($conn, $query);
                    if ($conn->query($query) === TRUE) {
                        header("Location: login.php");
                        die;
                      } 
                      else {
                        $wrng_pass = "User already Registered.";
                      }
                }
                else
                    $wrng_pass = "Password Doesn't match.";
            } 
            else
                $wrng_pass = "Username cannot taken, Username Should be 4-15 .!.";
        }
        else
            $wrng_pass = "Please enter valid information.";
    }

?>

<html lang="en">
<head>
   
    <title>SignUp</title>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <div class="login_home">
        <div class="bg_img">
        <img src="image/Inventory-Control.jpg" alt="bookwithgreen">
        </div>
        <div class="overlay">
            <div id="signup_window" class="login_window">
                <h2>Welcome To</h2>
                <h4> Inventory Management System</h4>
                <?php 
                    if(isset($wrng_pass))
                    {
                        echo '<h4 class= "wrng_pass" >' .$wrng_pass. '</h4>' ;
                    }
                ?>
                <form  method="POST">
                    <div class="fill_box">
                        <h4>Username: </h4>
                        <input type="text" name="user_name" placeholder="Username" required>
                    </div>
                    <div class="fill_box">
                        <h4>Full Name: </h4>
                        <input type="text" name="full_name" placeholder="Full Name" required>
                    </div>
                    <div class="fill_box">
                        <h4>Email: </h4>
                        <input type="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="fill_box">
                        <h4>Password: </h4>
                        <input type="password" name="password" id="" placeholder="Password" required>
                    </div>
                    <div class="fill_box">
                        <h4>Confirm Password: </h4>
                        <input type="password" name="c_password" placeholder="Confirm Password" required>
                    </div>
                    <div class="fill_box">
                        <h4>Operator: </h4>
                        <select name="operator" id="operator" required>
                            <option value="">Select</option>
                            <option value="Admin">Admin</option>
                            <option value="Manager">Manager</option>
                            <option value="User">User</option>
                        </select>
                    </div>
                    <div class="submit">
                        <input type="submit" value="Sign Up">
                    </div>
                </form>
                <div class="new_user">
                    <p>Already users? <span><a href="login.php">Login Here!</a></span></p>
                </div>
                
            </div>
        </div>
        
    </div>
    
    
</body>
</html>
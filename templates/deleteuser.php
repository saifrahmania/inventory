<?php

  include("../db_con/database_con.php");

  if (isset($_POST['delete_name']))
    {
      $username = $_POST['delete_name'];
      $query="DELETE FROM users WHERE username='$username'";
      $result= mysqli_query($conn,$query);
      if($result){
        echo "<script> alert('User Deleted.')</script>";
      }
      else {
        echo "<script> alert('User cannot be Deleted.')</script>";
      }
    } 
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inventory Management System</title>
	<script src="../js/jquery.min.js"></script>
	<script src="../js/popper.min.js" ></script>
  <script src="../js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../js/main.js"></script>

	<link rel="stylesheet" href="../css/all.min.css" >
	<link rel="stylesheet" href="../css/bootstrap.min.css" >
 	<link rel="stylesheet" href="../css/style.css">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">Inventory System</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="../dashboard.php"><i class="fa fa-home">&nbsp;</i>Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="../logout.php"><i class="fa fa-user"></i>Logout</a>
      </li>
    </ul>
  </div>
</nav>
  <div class="container">
    <br/><br/>
    <div id="form_delete" >
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
          </div>
          <div class="modal-body">
            <form id="delete_form" method="POST">
              <div class="form-group">
                <label>Enter Username</label>
                <select class="form-control" id="delete_name" name="delete_name" required>
                <?php
                    $query = "SELECT * FROM users where operator IN ('Manager', 'User')";
                    $data = mysqli_query($conn, $query);
                    
                    while( $user = mysqli_fetch_array($data))
                    {
                      echo "<option value=".$user['username'].">".$user['username']."</option>";
                    }
                    
                  ?>
              </select>
                <!-- <input type="text" class="form-control" name="delete_name" id="delete_name" placeholder="User Name"> -->
              </div>
              <input type="submit" class="btn btn-primary" value="Delete">
            </form>
          </div>
        </div>
    </div>
  </div>
  

</body>
</html>



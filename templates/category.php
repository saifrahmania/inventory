<?php
  include("../db_con/database_con.php");
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_POST['categoryname']) && !empty($_POST['categoryname']))
    {
      $c_name = $_POST['categoryname'];
      $query2 = "INSERT INTO categories ( category_name) VALUES ('$c_name')";
      $result2 = mysqli_query($conn,$query2);

      if ($result2 === TRUE) {
        $wrng_pass = "Category Added.";
      } 
      else {
        $wrng_pass = "Category Name exsist.";
      }
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
<br><br>
<div class="container">
  <div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
        <div id="form_category">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
          </div>
          <?php 
              if(isset($wrng_pass))
              {
                  echo '<h5 class= "wrng_pass" >' .$wrng_pass. '</h5>' ;
              }
          ?>
          <div class="modal-body">
            <form id="category_form" method="POST">
              <div class="form-group">
                <label>Category Name</label>
                <input type="text" class="form-control" name="categoryname" id="categoryname" placeholder="Enter Category Name">
              
              </div>
              <input type="submit" class="btn btn-primary" value="Add">
            </form>
          </div>
        </div>
    </div>
    <div class="col-lg-3"></div>
  </div>
</div>
  
</body>
</html>



<?php
  include("../db_con/database_con.php");

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //somthing was posted
    if(isset($_POST['select_cat']) && isset($_POST['select_brand']) && isset($_POST['product_name']) &&isset($_POST['product_price']) &&isset($_POST['product_qty']) &&isset($_POST['added_date']))
    {
      $cid = $_POST['select_cat'];
      $bid = $_POST['select_brand'];
      $p_name = $_POST['product_name'];
      $p_price = $_POST['product_price'];
      $p_quantity = $_POST['product_qty'];
      $date = $_POST['added_date'];

      //save to database

      $query = "INSERT INTO products(cid, bid, product_name, product_price, product_stock, added_date)
      VALUES ('$cid','$bid','$p_name','$p_price','$p_quantity','$date')";
      $result = mysqli_query($conn, $query);
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
  <div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
      <div id="form_products">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add new products</h5>
        </div>
        <div class="modal-body">
          <form id="product_form" method="POST">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Date</label>
                <input type="text" class="form-control" name="added_date" id="added_date" value="<?php echo date("Y-m-d"); ?>" readonly/>
              </div>
              <div class="form-group col-md-6">
                <label>Product Name</label>
                <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Enter Product Name" required>
              </div>
            </div>
            <div class="form-group">
              <label>Category</label>
              <select class="form-control" id="select_cat" name="select_cat" required>
                <?php
                    $query = "SELECT * FROM categories ";
                    $data = mysqli_query($conn, $query);
                    
                    while( $category = mysqli_fetch_array($data))
                    {
                      echo "<option value=".$category['cid'].">".$category['category_name']."</option>";
                    }
                    
                  ?>
              </select>
            </div>
            <div class="form-group">
              <label>Brand</label>
              <select class="form-control" id="select_brand" name="select_brand" required >
                <?php
                      $query = "SELECT  *  FROM brands ";
                      $data = mysqli_query($conn, $query);

                      while($brand= mysqli_fetch_array($data))
                      {
                        echo "<option value=".$brand['bid'].">".$brand['brand_name']."</option>";
                      }
                      
                    ?>
              </select>
            </div>
            <div class="form-group">
              <label>Product Price</label>
              <input type="text" class="form-control" id="product_price" name="product_price" placeholder="Enter Price of Product" required/>
            </div>
            <div class="form-group">
              <label>Quantity</label>
              <input type="text" class="form-control" id="product_qty" name="product_qty" placeholder="Enter Quantity" required/>
              </div>
            <input type="submit" class="btn btn-success" value="Add Product" >
          </form>
        </div>
      </div>
    </div>
    <div class="col-lg-2"></div>
  </div>
</div>
  
</body>
</html>

<?php
  include("../db_con/database_con.php");

  if(isset($_GET['pid'])){
    $id = $_GET['pid'];
    $v_query = "SELECT * FROM products WHERE pid ='$id'";
    $result = mysqli_query($conn,$v_query);
    $data= mysqli_fetch_assoc($result);

    $product_name = $data['product_name'];
    $price = $data["product_price"];
		$stock =  $data["product_stock"];

						$cid_val = $data["cid"];
				    	$cat_res = mysqli_query($conn,"SELECT category_name FROM categories where cid = '$cid_val' ");
						$cat_row = mysqli_fetch_array($cat_res);
		$category = $cat_row["category_name"];

            $bid_val = $data["bid"];
				    	$bat_res = mysqli_query($conn,"SELECT brand_name FROM brands where bid = '$bid_val' ");
						$bat_row = mysqli_fetch_array($bat_res);
		$brands = $bat_row["brand_name"];
}

  
    if (isset($_POST['submit']))
    {
      
      // $cid = $_POST['select_cat'];
      // $bid = $_POST['select_brand'];
      $p_name = $_POST['product_name'];
      $p_price = $_POST['product_price'];
      $p_quantity = $_POST['product_qty'];
      $update = $_POST['added_date'];

      $query = "UPDATE products SET product_name='$p_name',product_price='$p_price',
      product_stock='$p_quantity',added_date='$update' WHERE pid ='$id'";
      $result= mysqli_query($conn, $query);

      if($result){
        $wrng_pass= " Successfully Updated.";
        header("Location: ../manage_product.php");
        die;
      }
      else {
        $wrng_pass = "Not Updated.";
      }
    } 
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inventory System</title>
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
      <div class="col-lg-3"></div>
      <div class="col-lg-6">
        <div  id="form_brand" >
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Products</h5>
          </div>
          <?php 
              if(isset($wrng_pass))
              {
                  echo '<h5 class= "wrng_pass text-center" >' .$wrng_pass. '</h5>' ;
              }
          ?>
          <div class="modal-body">
            <form  method="POST">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Date</label>
                  <input type="text" class="form-control" name="added_date" value="<?php echo date("Y-m-d"); ?>" readonly/>
                </div>
                <div class="form-group col-md-6">
                  <label>Product Name</label>
                  <input type="text" class="form-control" name="product_name" value= "<?php echo $product_name;?>">
                </div>
              </div>
              <!-- <div class="form-group">
                <label>Category</label>
                <select class="form-control" name="select_cat" value= "<?php echo $category;?>">
                <option value="<?php echo $category;?>"><?php echo $category;?></option>
                <?php
                    $query = "SELECT * FROM categories ";
                    $data = mysqli_query($conn, $query);
                    
                    while( $category = mysqli_fetch_array($data))
                    {
                      echo "<option value=".$category['cid'].">".$category['category_name']."</option>";
                    }
                  ?>
                </select>
              </div> -->
              <!-- <div class="form-group">
                <label>Brand</label>
                <select class="form-control" name="select_brand" value= "<?php echo $brands;?>">
                <option value="<?php echo $brands;?>"><?php echo $brands;?></option>
                <?php
                      $query = "SELECT  *  FROM brands ";
                      $data = mysqli_query($conn, $query);

                      while($brand= mysqli_fetch_array($data))
                      {
                        echo "<option value=".$brand['bid'].">".$brand['brand_name']."</option>";
                      }
                      
                    ?>
                </select>
              </div> -->
              <div class="form-group">
                <label>Product Price</label>
                <input type="text" class="form-control" name="product_price" value= "<?php echo $price;?>">
              </div>
              <div class="form-group">
                <label>Quantity</label>
                <input type="text" class="form-control" name="product_qty" value= "<?php echo $stock;?>" >
              </div>
              <input type="submit" class="btn btn-success" name="submit" value="Update Product">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>
</html>




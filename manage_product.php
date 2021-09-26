<?php
	session_start();

	include("db_con/database_con.php");
	$result = mysqli_query($conn,"SELECT * FROM products");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Inventory Management System</title>
	<script src="js/jquery.min.js"></script>
	<script src="js/popper.min.js" ></script>
    <script src="js/bootstrap.min.js" ></script>
    <link rel="stylesheet" href="css/bootstrap.min.css" >
 	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 	<script type="text/javascript" src="js/main.js"></script>
 	<link rel="stylesheet" href="css/style.css">
 </head>
<body>
	<!-- Navbar -->
	<?php include_once("./templates/header.php"); ?>
	<br/><br/>
	<div class="container">
		<table class="table table-hover table-bordered">
		    <thead>
		      <tr>
		        <th>#</th>
		        <th>Product</th>
		        <th>Category</th>
		        <th>Brand</th>
		        <th>Price</th>
		        <th>Stock</th>
		        <th>Added Date</th>
		        <th>Status</th>
		        <th>Action</th>
		      </tr>
		    </thead>
		    <tbody id="get_product">
					<?php
						$i=0;
						while($row = mysqli_fetch_array($result)) {
					?>  
		      <tr>
		        <td><?php echo $row["pid"]; ?></td>
		        <td><?php echo $row["product_name"]; ?></td>
		        <td>
					<?php  
						$cid_val = $row["cid"];
				    	$cat_res = mysqli_query($conn,"SELECT category_name FROM categories where cid = '$cid_val' ");
						$cat_row = mysqli_fetch_array($cat_res);
						echo $cat_row["category_name"];
					?>
				</td>
				<td>
					<?php  
						$bid_val = $row["bid"];
				    	$bat_res = mysqli_query($conn,"SELECT brand_name FROM brands where bid = '$bid_val' ");
						$bat_row = mysqli_fetch_array($bat_res);
						echo $bat_row["brand_name"];
					?>
				</td>
		        <td><?php echo $row["product_price"]; ?></td>
				<td><?php echo $row["product_stock"]; ?></td>
				<td><?php echo $row["added_date"]; ?></td>
		        <td><a href="#" class="btn btn-success btn-sm">Active</a></td>
		        <td>
		        	<a href="./templates/update_products.php?pid=<?php echo $row["pid"]; ?>" class="btn btn-info btn-sm">Update</a>
		        </td>
		      </tr>
					<?php
						$i++;
						}
					?>
			</tbody>
		</table>
	</div>
	
	
</body>
</html>
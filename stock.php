<?php
	session_start();

	include("db_con/database_con.php");

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
    <script type="text/javascript" src="js/script.js"></script>

	<link rel="stylesheet" href="css/all.min.css" >
	<link rel="stylesheet" href="css/bootstrap.min.css" >
 	<link rel="stylesheet" href="css/style.css">
 </head>
<body>
	<!-- Navbar -->
	<?php include_once("./templates/header.php"); ?>
	<br/><br/>
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<div class="card" style="width: 18rem;">
				<h2 class="card-header text-center">Catagory</h2>
					<div class="card-body text-center">
						<h3 class="card-text">
							<?php
								$cat_query="SELECT * FROM categories WHERE 1 ";
								$cat_result = mysqli_query($conn, $cat_query);
								$i=0;
								while($category_data= mysqli_fetch_array($cat_result))
								{
									$i++;
								}
								echo $i;
						 
						 	?>
						 </h3>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="card" style="width: 18rem;">
				<h2 class="card-header text-center">Brands</h2>
					<div class="card-body text-center">
						<h3 class="card-text">
						<?php
								$brand_query="SELECT * FROM brands WHERE 1 ";
								$brand_result = mysqli_query($conn, $brand_query);
								$i=0;
								while($brand_data= mysqli_fetch_array($brand_result))
								{
									$i++;
								}
								echo $i;
						 
						 	?>
						</h3>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="card" style="width: 18rem;">
				<h2 class="card-header text-center">Products</h2>
					<div class="card-body text-center">
						<h3 class="card-text">
						<?php
								$query="SELECT product_stock FROM products WHERE 1 ";
								$result = mysqli_query($conn, $query);
								$i=0;
								while($data= mysqli_fetch_array($result))
								{
									$i = $i + $data['product_stock'];
								}
								echo $i;
						 
						 	?>
						</h3>
					</div>
				</div>
			</div>
		</div>
		<br><br>
		<div class="row">
			<div class="col-lg-4">
				<div class="card" style="width: 18rem;">
				<h2 class="card-header text-center">Invoices</h2>
					<div class="card-body text-center">
						<h3 class="card-text">
							<?php
								$cat_query="SELECT * FROM invoice WHERE 1 ";
								$cat_result = mysqli_query($conn, $cat_query);
								$i=0;
								while($category_data= mysqli_fetch_array($cat_result))
								{
									$i++;
								}
								echo $i;
						 
						 	?>
						 </h3>
					</div>
				</div>
			</div>
		</div>
		<br><br>
		<div class="row">
			<div class="col-lg-12">
				<!-- <div class="search">
					<form method="post">
						Customer Wise search:
						<input type="text" class="form-control" name="search" id="search" placeholder="Customer Name"><br>
					</form>
				
				</div> -->
			<table class="table table-hover table-bordered">
		    <thead>
		      <tr>
		        <th>#SI</th>
		        <th>Customer Name</th>
		        <th>Total</th>
		      </tr>
		    </thead>
		    <tbody id="get_product">
					<?php
						$result = mysqli_query($conn,"SELECT * FROM invoice");
						$i=1;
						while($row = mysqli_fetch_array($result)) {
					?>  
		      <tr>
		        <td><?php echo $i;?> </td>
				<td><?php echo $row['customer_name'];?></td>
				<td><?php echo $row['sub_total'];?></td>
		      </tr>
			  <?php
						$i++;
						}
					?>
					
			</tbody>
		</table>
			</div>
		</div>
	</div>
	
	<!-- <script>
		  $("#search").on("keyup",function(){
			var search_term = $(this).val();

			$.ajax({
			url: "live-search.php",
			type: "POST",
			data : {search:search_term },
			success: function(data) {
				$("#table-data").html(data);
			}
			});
		});
	</script> -->
</body>
</html>
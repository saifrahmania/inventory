<?php
	session_start();
	include("db_con/database_con.php");
	if(isset($_SESSION["username"]) == true){

		$user = $_SESSION["username"];
		$query = "SELECT * FROM users WHERE username = '$user' limit 1 ";
		$result = mysqli_query($conn, $query);
		$user_data = mysqli_fetch_array($result);

		$full_name = $user_data['fullname'];
		$operator = $user_data['operator'];
		$login_time = $user_data['added_date'];


		$img_query = "SELECT * FROM userimg WHERE user = '$user'";
		$img_res = mysqli_query($conn, $img_query);
		$img_data = mysqli_fetch_array($img_res);
	}	 
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Inventory System</title>
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
		<div class="row">
			<div class="col-md-4">
				<div class="card mx-auto">
				  <img class="card-img-top mx-auto" style="width:50%;" src="<?php echo $img_data['img'];?>" alt="Insert Your Image Here.">
				  <div class="card-body">
				    <h4 class="card-title">Profile Info</h4>
				    <p class="card-text"><i class="fa fa-user">&nbsp;</i>
						<?php
							echo $full_name;
						?>
					</p>
				    <p class="card-text"><i class="fa fa-user">&nbsp;</i>
						<?php
							echo $operator;
						?>
					</p>
				    <p class="card-text">Last Login : 
						<?php
							echo $login_time;
						?>
					</p>
				    <a href="editprofile.php" class="btn btn-primary" ><i class="fa fa-edit">&nbsp;</i>Edit Profile</a>
					
				  </div>
				</div>
			</div>
			<div class="col-md-8">
				<div class="jumbotron" style="width:100%;height:100%;">
					<h1>Welcome 
							<?php
								echo $operator;	 
							?>,
						</h1>
					<div class="row">
						<div class="col-sm-6">
						<iframe src="https://free.timeanddate.com/clock/i7w2rqrg/n73/szw110/szh110/hoc222/hbw6/cf100/hnce1ead6/hcw2/hcd88/fan2/fas20/fdi70/mqc000/mqs3/mql13/mqw4/mqd94/mhc000/mhs3/mhl13/mhw4/mhd94/mmc000/mml5/mmw1/mmd94/hwm2/hhs2/hhb18/hms2/hml80/hmb18/hmr7/hscf09/hss1/hsl90/hsr5" frameborder="0" width="110" height="110"></iframe>
						</div>
						<div class="col-sm-6">
							<div class="card">
						      <div class="card-body">
						        <h4 class="card-title">New Orders</h4>
						        <p class="card-text">Here you can make invoices and create new orders</p>
						        <a href="new_order.php" class="btn btn-primary">New Orders</a>
								
						      </div>
						    </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<p></p>
	<p></p>
	<div class="container">
		<?php 
			if($operator == 'Admin'){
				include_once("./templates/usercreate.php");
			}
		?>
		<p></p>
		<div class="row">
			<div class="col-md-3">
				<div class="card">
						<div class="card-body">
						<h4 class="card-title">Categories</h4>
						<p class="card-text">Here you can manage your categories and you add new parent and sub categories</p>
						<a href="./templates/category.php" class="btn btn-primary">Add</a>
						<a href="manage_categories.php" class="btn btn-primary">Manage</a>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="card">
						<div class="card-body">
						<h4 class="card-title">Brands</h4>
						<p class="card-text">Here you can manage your brand and you add new brand</p>
						<a href="./templates/brand.php" class="btn btn-primary">Add</a>
						<a href="manage_brand.php" class="btn btn-primary">Manage</a>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="card">
						<div class="card-body">
						<h4 class="card-title">Products</h4>
						<p class="card-text">Here you can manage your products and you add new products</p>
						<a href="./templates/products.php" class="btn btn-primary">Add</a>
						<a href="manage_product.php" class="btn btn-primary">Manage</a>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<?php 
					if($operator == 'Admin' || $operator == 'Manager'){
						include_once("templates/viewstock.php");
					}
				?>
			</div>
		</div>
	</div>
	
</body>
</html>
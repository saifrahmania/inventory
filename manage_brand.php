<?php
	session_start();

	include("db_con/database_con.php");
	$query="SELECT * FROM brands WHERE 1 ";
	$result = mysqli_query($conn, $query);
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
		        <th>Brand</th>
		        <th>Status</th>
		        <th>Action</th>
		      </tr>
		    </thead>
		    <tbody id="get_brand">
				
				<?php
				$i=0;
					while($brand_data= mysqli_fetch_array($result))
                  {
				?>
			<tr>
				<td><?php echo $brand_data['bid'];?></td>
				<td><?php echo $brand_data['brand_name'];?> </td>
				<td> <a href="#" class="btn btn-success btn-sm">Active</a></td>
				<!-- <td> <a href="#" class="btn btn-danger btn-sm">Offline</a> </td> -->
				<td> 
					<a href="./templates/delete-process.php?bid=<?php echo $brand_data['bid']; ?>" onclick="return checkdelete()" class="btn btn-danger btn-sm">Delete</a>
					<a href="./templates/update_brand.php?bid=<?php echo $brand_data['bid']; ?>" class="btn btn-info btn-sm">Edit</a>
				</td>
					  
			</tr>
				<?php
					$i++;
					}
				?>
		    </tbody>
		  </table>
	</div>


	<script>
		function checkdelete() {
			return confirm("Do you want to delete this item?");
		}
	</script>
	
	
</body>
</html>
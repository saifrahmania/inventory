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
    <script src="js/bootstrap.min.js" ></script>
    <link rel="stylesheet" href="css/bootstrap.min.css" >
 	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 	
 	<link rel="stylesheet" href="css/style.css">
 </head>
<body>
	<!-- Navbar -->
	<?php 
		include_once("./templates/header.php"); 
	?>
	<br/><br/>
	<div class="container">
		<?php 
		// if(isset($_SESSION['msg']))
			// echo $msg =$_SESSION['msg']; 
		?>
		<table class="table table-hover table-bordered">
		    <thead>
		      <tr>
		        <th>#</th>
		        <th>Category</th>
		        <th>Status</th>
		        <th>Action</th>
		      </tr>
		    </thead>
		    <tbody id="get_category">
				<?php
					$query="SELECT * FROM categories WHERE 1 ";
					$result = mysqli_query($conn, $query);
					$i=0;
					while($category_data= mysqli_fetch_array($result))
					{
				?>
			<tr>
				<td><?php echo $category_data['cid']; ?></td>
				<td> <?php echo $category_data['category_name']; ?></td>
				<td> <a href="#" class="btn btn-success btn-sm">Active</a></td>
				<td> 
					<a href="./templates/delete-process.php?cid=<?php echo $category_data["cid"]; ?>" onclick="return checkdelete()" class="btn btn-danger btn-sm">Delete</a>
					<a href="./templates/update_category.php?cid=<?php echo $category_data["cid"]; ?>" class="btn btn-info btn-sm">Edit</a>
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
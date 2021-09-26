<?php

$search_value = $_POST["search"];

$sql = "SELECT * FROM invoice WHERE customer_name LIKE '%{$search_value}%'";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
$output = "";
if(mysqli_num_rows($result) > 0 ){

      while($row = mysqli_fetch_assoc($result)){
        $output .= "<tr><td align='center'>{$row["id"]}</td><td>{$row["first_name"]} {$row["last_name"]}</td><td align='center'><button class='edit-btn' data-eid='{$row["id"]}'>Edit</button></td><td align='center'><button Class='delete-btn' data-id='{$row["id"]}'>Delete</button></td></tr>";
      }

  mysqli_close($conn);

  echo $output;
}else{
  echo "<h2>No Record Found.</h2>";
}

?>

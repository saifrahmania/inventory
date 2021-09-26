<?php
session_start();
    include("../db_con/database_con.php");

    if(isset($_GET["cid"])){
        $cid = $_GET["cid"];
        $sql = "DELETE FROM categories WHERE cid='$cid'";
        if (mysqli_query($conn, $sql)) {
            echo "<script> alert('Record Deleted.')</script>";
            ?>
            <meta http-equiv="refresh" content="0; url=http://localhost/inventory/manage_categories.php">
            <?php
        } 
        else {
            echo "<script> alert('You have product of this category.')</script>";
            ?>
            <meta http-equiv="refresh" content="0; url=http://localhost/inventory/manage_categories.php">
            <?php
        }
    }


    if(isset($_GET["bid"])){
        $bid = $_GET["bid"];
        $sql = "DELETE FROM brands WHERE bid='$bid'";
        if (mysqli_query($conn, $sql)) {
            echo "<script> alert('Record Deleted.')</script>";
            ?>
            <meta http-equiv="refresh" content="0; url=http://localhost/inventory/manage_brand.php">
            <?php
        } 
        else {
            echo "<script> alert('You have product of this brand.')</script>";
            ?>
            <meta http-equiv="refresh" content="0; url=http://localhost/inventory/manage_brand.php">
            <?php
        }
    }
    
    mysqli_close($conn);
?>
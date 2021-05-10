<?php
include("config.php");

$id=$_GET['id'];

$result=mysqli_query($db,"DELETE FROM product WHERE id='$id'");

header("Location:admin_index.php");
?>
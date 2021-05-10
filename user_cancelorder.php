<?php
session_start();
include("config.php");

$id=$_GET['id'];
$status="Cancelled";

$result=mysqli_query($db,"UPDATE reservation SET status='$status' WHERE id='$id'");

echo "<script>alert('Cancelled');window.location.href='user_myorder.php';</script>";
?>
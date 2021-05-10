<?php
include("config.php");

$id=$_GET['id'];

$result=mysqli_query($db,"DELETE FROM reservation WHERE id='$id'");

header("Location:admin_reservation.php");
?>
<?php
session_start();
include("config.php");

$id=$_GET['id'];
$status="Confirmed";

$query=mysqli_query($db,"SELECT * FROM reservation WHERE id='$id'");
while ($res=mysqli_fetch_array($query)){
	$quantity=$res['quantity'];
	$product_name=$res['product_name'];
}
	$query2=mysqli_query($db,"SELECT * FROM product WHERE product_name='$product_name'");
	while($res2=mysqli_fetch_array($query2))
	{
		$quantity2=$res2['quantity'];
	}
	if($quantity2==0)
	{
		echo "<script>alert('Out of Stock');window.location.href='admin_reservation.php';</script>";
	}
	else
	{
		$result=mysqli_query($db,"UPDATE reservation SET status='$status' WHERE id='$id'");
		$result2=mysqli_query($db,"UPDATE product SET quantity=quantity-$quantity WHERE product_name='$product_name'");

		echo "<script>alert('Confirmed');window.location.href='admin_reservation.php';</script>";
	}
?>
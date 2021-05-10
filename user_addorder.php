<?php
session_start();
include_once('config.php');

if(isset($_POST['submit']))
{
	$_SESSION['quantity'];
	$userid=$_SESSION['id'];
	$fname=mysqli_real_escape_string($db,$_POST['fname']);
	$lname=mysqli_real_escape_string($db,$_POST['lname']);
	$contact_no=mysqli_real_escape_string($db,$_POST['contact_no']);
	$product_name=mysqli_real_escape_string($db,$_POST['product_name']);
	$price=mysqli_real_escape_string($db,$_POST['price']);
	$quantity=mysqli_real_escape_string($db,$_POST['quantity']);
	$dates=mysqli_real_escape_string($db,$_POST['dates']);
	$total=$price*$quantity;
	$status="Pending";
	
	$query=mysqli_query($db,"SELECT * FROM reservation WHERE product_name='$product_name'");
	{
		if($quantity<0)
		{
			echo "<script>alert('Invalid Quantity');window.location.href='user_index.php'</script>";
		}
		else if($quantity>$_SESSION['quantity'])
		{
			echo "<script>alert('Invalid Quantity');window.location.href='user_index.php'</script>";
		}
		else if(mysqli_num_rows($query)==1)
		{
			$result=mysqli_query($db,"UPDATE reservation SET quantity=quantity+'$quantity',total=total+'$total' WHERE product_name='$product_name'");

			echo "<script>alert('Reserved Successfully');window.location.href='user_myorder.php'</script>";
		}
		else
		{
			$result2=mysqli_query($db,"INSERT INTO reservation(userid,fname,lname,contact_no,product_name,price,quantity,total,dates,status) VALUES('$userid','$fname','$lname','$contact_no','$product_name','$price','$quantity','$total','$dates','$status')");

			echo "<script>alert('Reserved Successfully');window.location.href='user_myorder.php'</script>";
		}
	}
}
?>
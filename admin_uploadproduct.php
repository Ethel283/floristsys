<?php
session_start();
?><!DOCTYPE html>
<html>
<head>
	<title>Upload Product</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style type="text/css">
	*{
		box-sizing: border-box;
	}
	body{
		background: #f2f2f2;
	}
	.navbar-inverse{
		background: rgba(5,15,30,1);
		padding: 8px;
		font-size: 17px;
	}
	.navbar-nav{
		padding: 0 0 0 20px;
	}
	.navbar-right{
		margin-right: 50px;
	}
	.navbar-brand{
		font-size: 20px;
	}
	#form-box{
  		top: 55%;
  		left: 50%;
 	 	position: absolute;
  		transform: translate(-50%,-50%);
  		width: 400px;
  		font-family: Arial;
  		background: rgba(5,15,30,1);
  		border-radius: 2px;
  		box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
  		border-radius: 20px;
  		padding: 40px;
	}
	h1{
  		margin: 0 0 20px 0;
  		font-weight: 300;
  		font-size: 30px;
 		text-align: center;
  		color: #fff;
	}
	input[type="file"]{
		border: 0;
  		display: block;
  		margin: 20px auto;
  		margin-left: -3%;
  		text-align: center;
  		padding: 10px 10px;
  		width: 100%;
  		font-size: 16px;
  		border-radius: 5px;
  		outline: none;
  		transition: 0.25s;
	}
	textarea,
	input[type="text"],
	input[type="number"]{
  		border: 0;
  		display: block;
  		margin: 20px auto;
  		text-align: left;
  		border-bottom: 2px solid #2fff;
  		padding: 10px 10px;
  		width: 100%;
  		font-size: 16px;
  		border-radius: 5px;
  		outline: none;
  		transition: 0.25s;
	}
	input[type="submit"]{
  		margin-top: 28px;
  		margin-left: 30%;
  		width: 130px;
  		height: 35px;
  		background: orange;
  		border: none;
  		border-radius: 5px;
  		color: #FFF;
  		font-size: 18px;
  		font-family: 'Roboto', sans-serif;
  		font-weight: 500;
  		text-transform: uppercase;
  		transition: 0.1s ease;
  		cursor: pointer;
	}
	</style>
</head>
<body>
<form action="admin_uploadproduct.php" method="post" enctype="multipart/form-data">
<nav class="navbar navbar-inverse">
	<div class="container-fluid"></div>
	<div class="navbar-header">
		<a style="font-weight: bold;" class="navbar-brand" href="admin_index.php">Kalidades</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="admin_uploadproduct.php">Upload Product</a></li>
		<li><a href="admin_userlist.php">User List</a></li>
		<li><a href="admin_reservation.php">Reservation</a></li>
	</ul>
	<ul class="nav navbar-nav navbar-right">
		<li><a href="#"><span class="glyphicon glyphicon-user"></span> Welcome, <?php echo $_SESSION['fname'];?></a></li>
		<li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Sign Out</a></li>
	</ul>
</nav>
	<div id="form-box">
  	<div class="left">
    <h1>Upload Product</h1>
    <input type="text" name="product_name" placeholder="Product Name" required="required" />
    <input type="file" name="image" required="required" />
    <input type="text" name="type" placeholder="Type" required="required" />
    <input type="text" name="price" placeholder="Price" required="required" />
    <input type="number" name="quantity" placeholder="Quantity" required="required" />
    <textarea name="description" rows="4" placeholder="Description..." required="required" /></textarea>
    <input type="submit" name="submit" value="UPLOAD" />
  	</div>
  	</div>
</form>
</body>
</html>
<?php
include_once('config.php');

if(isset($_POST['submit']))
{
	$filename=addslashes($_FILES['image']['name']);
	$tmpname=addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$product_name=mysqli_real_escape_string($db,$_POST['product_name']);
	$type=mysqli_real_escape_string($db,$_POST['type']);
	$price=mysqli_real_escape_string($db,$_POST['price']);
	$quantity=mysqli_real_escape_string($db,$_POST['quantity']);
	$description=mysqli_real_escape_string($db,$_POST['description']);
	$array=array('jpg','jpeg');
	$ext=pathinfo($filename,PATHINFO_EXTENSION);
	if(!empty($filename))
	{
		if(in_array($ext,$array))
		{
			$query=mysqli_query($db,"SELECT * FROM product WHERE image='$tmpname'");			
			if(mysqli_num_rows($query)==1)
			{
				echo "<script>alert('Item already inserted');</script>";
			}
			else
			{
				$result=mysqli_query($db,"INSERT INTO product(name,image,product_name,type,price,quantity,description) VALUES('$filename','$tmpname','$product_name','$type','$price','$quantity','$description')");
				echo "<script>alert('Item inserted');window.location.href='admin_index.php'</script>";
			}
		}
	}
}
?>
<?php
session_start();
include_once('config.php');

$id=$_SESSION['id'];

$result=mysqli_query($db,"SELECT * FROM users WHERE id='$id'");
while($res=mysqli_fetch_array($result))
{
    $fname=$res['fname'];
    $lname=$res['lname'];
    $contact_no=$res['contact_no'];
}

$id2=$_GET['id'];

$result2=mysqli_query($db,"SELECT * FROM product WHERE id='$id2'");
while($res2=mysqli_fetch_array($result2))
{
    $product_name=$res2['product_name'];
    $image=$res2['image'];
    $price=$res2['price'];
    $quantity=$res2['quantity'];
    $_SESSION['quantity']=$res2['quantity'];
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Order Form</title>
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
	p{
      margin: 0 0 20px 0;
  		font-weight: 300;
  		font-size: 17px;
      text-align: left;
  		color: #fff;
	}
	input[type="text"],
	input[type="number"],
	input[type="date"]{
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
<form action="user_addorder.php" method="post">
<nav class="navbar navbar-inverse">
	<div class="container-fluid"></div>
	<div class="navbar-header">
		<a style="font-weight: bold;" class="navbar-brand" href="user_index.php">Kalidades</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="user_myorder.php">My Order</a></li>
		<li><a href="user_profile.php">Profile</a></li>
	</ul>
	<ul class="nav navbar-nav navbar-right">
    <li><a href="#"><span class="glyphicon glyphicon-user"></span> Welcome, <?php echo $_SESSION['fname'];?></a></li>
		<li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Sign Out</a></li>
	</ul>
</nav>
	<div id="form-box">
  	<div class="left">
    <h1>Order Form</h1>
    <p>Order Information:</p>
    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
    <input type="hidden" name="product_name" placeholder="Product Name" value="<?php echo $product_name; ?>" />
    <input type="hidden" name="price" placeholder="Price" required="required" value="<?php echo $price; ?>" />
    <input type="number" name="quantity" placeholder="Quantity" required="required" />
    <p>Personal Information:</p>
    <input type="text" name="fname" placeholder="First Name" required="required" value="<?php echo $fname; ?>" />
    <input type="text" name="lname" placeholder="Last Name" required="required" value="<?php echo $lname; ?>" />
    <input type="text" name="contact_no" placeholder="Contact No." required="required" value="<?php echo $contact_no; ?>" />
    <p>Pick-up Date:</p>
    <input type="date" name="dates" required="required">
    <input type="submit" name="submit" value="ORDER">
  	</div>
  	</div>
</form>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<title>Kalidades</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style type="text/css">
	body{
		background: #f2f2f2;
	}
	.navbar-inverse{
		background: rgba(5,15,30,1);
		padding: 8px;
		font-size: 17px;
	}
	.navbar-right{
		margin-right: 50px;
	}
	.navbar-brand{
		font-size: 20px;
	}
	#display{border-radius: 50px}
	</style>
</head>
<body>
<nav class="navbar navbar-inverse">
	<div class="container-fluid"></div>
	<div class="navbar-header">
		<a style="font-weight: bold;" class="navbar-brand" href="index.php">Kalidades</a>
	</div>
	<ul class="nav navbar-nav navbar-right">
		<li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
		<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Sign In</a></li>
	</ul>
</nav>
	<table>
	<div id="display" style="display: flex; padding: 10px; margin: 10px; flex-wrap: wrap; justify-content: space-between;">
	<?php
	include_once('config.php');

	$result=mysqli_query($db,"SELECT * FROM product");

	while($res=mysqli_fetch_array($result))
	{
		echo '<div><img src="data:image/jpeg;base64,'.base64_encode($res['image']).'"width="280" height="300"><br/>';
		echo "<center>".$res['product_name']."<br/>";
		echo "Type: ".$res['type']."<br/>";
		echo "Price: ₱".$res['price']."<br/>";
		echo "Quantity: ".$res['quantity']."</br/>";
		echo "Description: ".$res['description']."</center><br/></div>";
	}
	?>
	</div>
	</table>
</body>
</html>
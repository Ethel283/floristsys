<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
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
	.navbar-right{
		margin-right: 50px;
	}
	.navbar-brand{
		font-size: 20px;
	}
	#register-box{
  		top: 620%;
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
	input[type="text"],
	input[type="password"]{
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
<form action="register.php" method="post">
	<nav class="navbar navbar-inverse">
	<div class="container-fluid"></div>
	<div class="navbar-header">
		<a style="font-weight: bold;" class="navbar-brand" href="index.php">Kalidades</a>
	</div>
	<ul class="nav navbar-nav navbar-right">
		<li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
		<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Sign In</a></li>
	</ul>
	<div id="register-box">
  	<div class="left">
    <h1>Sign Up</h1>
    <input type="text" name="fname" placeholder="First Name" required="required" />
    <input type="text" name="lname" placeholder="Last Name" required="required" />
    <input type="text" name="contact_no" placeholder="Contact No." required="required" />
    <input type="text" name="username" placeholder="Username" required="required" />
    <input type="password" name="password" placeholder="Password" required="required" />
    <input type="password" name="password" placeholder="Retype password" required="required" />
    <input type="submit" name="submit" value="Sign Up" />
  	</div>
	</div>
</form>
</body>
</html>
<?php
include_once('config.php');

if(isset($_POST['submit']))
{
	$fname=mysqli_real_escape_string($db,$_POST['fname']);
	$lname=mysqli_real_escape_string($db,$_POST['lname']);
	$contact_no=mysqli_real_escape_string($db,$_POST['contact_no']);
	$username=mysqli_real_escape_string($db,$_POST['username']);
	$password=mysqli_real_escape_string($db,$_POST['password']);
	$user_type="user";

	$result=mysqli_query($db,"INSERT INTO users(fname,lname,contact_no,username,password,created_on,user_type) VALUES('$fname','$lname','$contact_no','$username','$password',NOW(),'$user_type')");

	echo "<script>alert('Registered Successfully');window.location.href='login.php'</script>";
}
?>
<?php
session_start();
include_once('config.php');

if(isset($_POST['search']))
{
	$id=$_POST['search'];

	$result=mysqli_query($db,"SELECT * FROM users WHERE fname like '%$id%' OR lname like '%$id%'");

	$rows=mysqli_num_rows($result);
	if($rows==0)
	{
		echo "<script>alert('Nothing Found');window.location.href='admin_userlist.php'</script>";
	}
}
else
{
	$result=mysqli_query($db,"SELECT * FROM users WHERE user_type='user' ORDER BY id DESC");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>User List</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/scroller/2.0.1/css/scroller.bootstrap.min.css">
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
	.navbar-nav{
		padding: 0 0 0 20px;
	}
	.navbar-right{
		margin-right: 50px;
	}
	.navbar-brand{
		font-size: 20px;
	}
	input[type="text"]{
  		border: none;
  		text-align: left;
  		padding: 10px 10px;
  		width: 12%;
  		font-size: 14px;
  		transition: 0.25s;
  		height: 30px;
	}
	input[type="submit"]{
  		width: 80px;
  		height: 30px;
  		background: orange;
  		border: none;
  		color: #FFF;
  		font-size: 14px;
  		font-family: 'Roboto', sans-serif;
  		text-transform: uppercase;
  		transition: 0.1s ease;
  		cursor: pointer;
  		margin-bottom: 5px;
	}
	</style>
</head>
<body>
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
<form action="admin_userlist.php" method="post">
	<input type="text" name="search" placeholder="Search...">
	<input type="submit" name="submit" value="SEARCH">
</form>
	<table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
		<thead>
		<tr>
			<th>ID</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Contact No.</th>
			<th>Username</th>
			<th>Password</th>
			<th>Created On</th>
			<th>Action</th>
		</tr>
		</thead>
		<?php
		while($res=mysqli_fetch_array($result))
		{
			echo "<tr>";
			echo "<td>".$res['id']."</td>";
			echo "<td>".$res['fname']."</td>";
			echo "<td>".$res['lname']."</td>";
			echo "<td>".$res['contact_no']."</td>";
			echo "<td>".$res['username']."</td>";
			echo "<td>".$res['password']."</td>";
			echo "<td>".$res['created_on']."</td>";
			echo "<td><button><a href=\"admin_deleteuser.php?id=$res[id]\"onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></button></td>";
			echo "</tr>";
		}
		?>
	</table>
</body>
</html>
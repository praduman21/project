<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<style type="text/css">
		*{
			margin: 0px;
			padding: 0px;
			box-sizing: border-box;
		}
		.main{
			height: 240px;
			width: 240px;
			padding: 20px;
			background: #34495E;
			border-radius: 50px 5px 80px 5px;
			border: 1px solid black;
			margin: 20px auto;
			color: #EEE3E1;
		}
		#btn
		{
			margin:60px auto ;
			color: black;
			width: 240px;
		}

	</style>
</head>
<body>
<div class="main">
	<h2>Login Account</h2><br>
	<form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<p>Email</p><input type="email" name="email" required><br><br>
		<p>Password</p><input type="password" name="password" required><br><br>
		<input type="submit" name="submit"  style="background: aqua; padding: 2px;">

	</form>
	<div id='btn'><a href='caccount.php' ><button style=' background:red; padding:2px; cursor: pointer;'>Sign in</button></a> 👈 Go to Create Account.</div>
</div>

<?php 
session_start();
$con=mysqli_connect("localhost","root","","tik");
if($con){
	if(isset($_GET['submit'])){
	$email=$_GET['email'];
	$_SESSION['email']=$_GET['email'];
	$password=$_GET['password'];
	$q="SELECT * FROM `tok` where `email`='".$email."' AND `password`='".$password."' ";
	$run=mysqli_query($con,$q);
	$fetch=mysqli_fetch_assoc($run);
	if(mysqli_num_rows($run)>0){
	$_SESSION['name']=$fetch['name'];
	$_SESSION['login_id']=$fetch['id'];
		header('location:profile1.php');
	}else{
		echo "<script>
		alert('Invalid Data');
		</script>";
	}
}
}
 ?>

</body>
</html>
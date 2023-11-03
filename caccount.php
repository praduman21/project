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
			height: 280px;
			width: 245px;
			padding: 20px;
			background: #900C3F;
			border-radius: 5px 80px 15px 45px;
			border: 1px solid black;
			margin: 20px auto;
			/*position: absolute;*/
			left: 320px;
			color: #EEE3E1;
		}
		#btn
		{
			margin:50px auto ;
			color: black;

		}
	</style>
</head>
<body>
<div class="main">
	<h2>Create Account</h2><br>
	<form method="post" <?php $_SERVER['PHP_SELF']; ?>>
		<p>Name</p><input type="text" name="name" required><br><br>
		<p>Email</p><input type="email" name="email" required><br><br>
		<p>Password</p><input type="password" name="password" required><br><br>
		<input type="submit" name="submit"  style="background: aqua; padding: 2px;">

	</form>
		<div id='btn'><a href='sin.php' ><button style=' background:red; padding:2px; cursor: pointer;'>Login in</button></a> 👈 Go to Login page.</div>
</div>

<?php 
$conn=mysqli_connect("localhost","root","");
mysqli_query($conn,'create database if not exists tik');
mysqli_close($conn);

$con=mysqli_connect("localhost","root","","tik");
	$ctable="create table if not exists tok(id int not null auto_increment primary key, name varchar(50) not null, email varchar(50) not null,password varchar(25) not null)";
	mysqli_query($con, $ctable);

$comment="create table if not exists comment(id int not null auto_increment primary key, image varchar(50), image_id int, comment_name varchar(50), comment_email varchar(50), comments varchar(500), date datetime not null default current_timestamp())";
	mysqli_query($con, $comment);

$likes="create table if not exists likes(id int not null auto_increment primary key, image varchar(50), image_id int, liker_name varchar(50), liker_email varchar(50))";
	mysqli_query($con, $likes);

$pchat="create table if not exists pchat(id int not null auto_increment primary key, vname varchar(50), vemail varchar(50), vcomment varchar(50), pemail varchar(50), profile_id int, login_id int, vdate datetime not null default current_timestamp() )";
	mysqli_query($con, $pchat);

if($con){
	if(isset($_POST['submit'])){
	$name=$_POST['name'];
	$password=$_POST['password'];
	$email=$_POST['email'];

	$q="SELECT * FROM `tok` where `name`='".$name."' AND `email`='".$email."' AND `password`='".$password."' ";
	$run=mysqli_query($con,$q);
	if(mysqli_num_rows($run)>0){
		
		echo "<script>
		alert('This Account is already Registered');
		window.open('caccount.php','_self');
		</script>";

	}else{
	$qu="insert into `tok`(`name`,`email`,`password`) values('".$name."','".$email."','".$password."')";
	$run=mysqli_query($con,$qu);
	echo "<script>
		alert('Created Account successfull');
		window.open('caccount.php','_self');
		</script>";	
		
	}
  }
}
		mysqli_close($con);
		
 ?>
</body>
</html>
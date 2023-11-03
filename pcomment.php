<?php 
session_start();
$con=mysqli_connect("localhost","root","","tik");
if($con){
if(isset($_GET['submit'])){
		$vname=$_GET['vname'];
		echo $pid=$_GET['pid'];
		$vemail=$_GET['vemail'];
		echo $pemail=$_GET['pemail'];
		$vcomment=$_GET['vcomment'];
		echo $login_id=$_SESSION['login_id'];

	$data="insert into `pchat`(`vname`,`vemail`,`vcomment`,`pemail`,`profile_id`,`login_id`) values('".$vname."','".$vemail."','".$vcomment."','".$pemail."','".$pid."','".$login_id."')";
	$q=mysqli_query($con,$data);
	header("location:comment1.php?comment=💬+Comment&id=".$image_id."&image=".$image);
}
}
 ?>
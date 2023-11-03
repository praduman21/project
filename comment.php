<?php 
session_start();
$con=mysqli_connect("localhost","root","","tik");
if($con){
if(isset($_GET['submit'])){
		$name=$_SESSION['name'];
	 	$email=$_SESSION['email'];
	 	$comment=$_GET['com'];
	 	$image_id=$_GET['nid'];
		$image=$_GET['mname'];

	 $_SESSION['nid']=$_GET['nid'];
	 $_SESSION['image']=$_GET['mname'];
	$data="insert into `comment`(`image`,`image_id`,`comment_name`,`comment_email`,`comments`) values('".$image."','".$image_id."','".$name."','".$email."','".$comment."')";
	$q=mysqli_query($con,$data);
	header("location:comment1.php?comment=💬+Comment&id=".$image_id."&image=".$image);
}
}
 ?>
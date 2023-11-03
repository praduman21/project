<?php 
session_start();
if(isset($_GET['like'])){
	$con=mysqli_connect("localhost","root","","tik");
	if($con){
		if($_GET['like']){
		  	$image=$_GET['image'];
		  	$image_id=$_GET['id'];
		  	$liker_name=$_SESSION['name'];
		  	$liker_email=$_SESSION['email'];
		    $q="SELECT * FROM `likes` where `image`='".$image."' AND  `liker_email`='".$liker_email."' ";
	$run=mysqli_query($con,$q);
	if(mysqli_num_rows($run)>0){
	$qu="DELETE FROM `likes` WHERE `image`='".$image."' AND `liker_email`='".$liker_email."'";
	$run=mysqli_query($con,$qu);
	header('location:profile1.php');
}
else{
	$quu="insert into `likes`(`image`,`image_id`,`liker_name`,`liker_email`) values('".$image."','".$image_id."','".$liker_name."','".$liker_email."')";
	$run=mysqli_query($con,$quu);
	header('location:profile1.php');
	
}		  	
}
}
}
 ?>

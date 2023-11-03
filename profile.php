 <!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		*{
			margin: 0px;
			padding: 0px;
			box-sizing: border-box;
		}
		.main{
			height: 555px;
			width: 450px;
			padding: 20px;
			border: 1px solid black;
			margin: 20px auto;
		}
		 #im{
		 	height: 100%;
		 	width: 110%;
		 	position:relative;
		 	right:20px;
		 	/*border: 1px solid yellow;*/
		 	top: -18px;
		 }
		 .camera{
		 	position: relative;
		 	right: 12%;
		 	border: 1px solid black;
		 	top: 460px;
		 	padding: 5px;
		 	border-radius: 50%;
		 	font-size: 30px;
		 	z-index: 1;
		 	background: red;
		 }
		  #up{
		 	outline: none;
		 	border-radius: 50%;
		 	width: 10%;
		 	border: 1px solid black;
		 	background:red;
		 	position: relative;
		 	top: -20%;
		 	left: 20%;
		 	color: white;
		 	display: none;
		 }
		 #sub{
		 	/*display: none;*/
		 	position: relative;
		 	float: left;
		 	padding: 5px;
			border-radius: 10%;
			background: aqua;
			top: -10px;
		 }
		 #text{
		 	width: 170px;
		 	position: relative;
		 	top: -50px;
		 	display: block;
		 	float: right;
		 }
		 #title{
		 	position: relative;
		 	float: left;
		 	display: block;
		 	left: 10px;
		 }
		#arrow{
			position: relative;
			display:inline-block;
			font-size: 22px;
			float: left;
			font-weight: bolder;
			left: -10px;
			top: -12px;
			background: none;
			outline: none;
			border: none;
			cursor: pointer;
			text-decoration: none;
		}
	</style>
</head>
<body>
<div class="main">
<form method="post" enctype="multipart/form-data">
	<label class="camera" for="up">&#128247;</label>
	<input type="file" name='image' required="" id="up" onchange="p(this)">
		<a href='profile1.php' id='arrow'>&#8678;</a>

	<input type="submit" value="Post" id="sub" name="submit">
	<input type="text"  id="title" name="title" placeholder="title" required="">
</form>
<img id="im" >
</div>

<?php 
session_start();
if(isset($_SESSION['name'])){
	echo "<a href='sin.php'> ".$_SESSION['name']." Logout your Account</a>";
}else{
	header('location:caccount.php');
}

$con=mysqli_connect("localhost","root","","tik") or die("connect error");
if($con){
if(isset($_FILES['image'])){
	$name=$_SESSION['name'];
	// $text=$_POST['text'];
	$title=$_POST['title'];
	$tname=$_FILES['image']['tmp_name'];
	$ex=$_FILES['image']['type'];
	$upload_id=$_SESSION['login_id'];
	 $email=$_SESSION['email'];
	echo $ex;
	
	$fname=$_FILES['image']['name'];
    $q="insert into `upload` (`name`,`image`,`title`,`email`,`upload_id`) values('".$name."','".$fname."','".$title."','".$email."','".$upload_id."')";
    $run=mysqli_query($con,$q);

		$a="uploads";
	if(is_dir($a)){
		move_uploaded_file($tname, $a."/".$fname);
	}else{
			mkdir($a);
			move_uploaded_file($tname, $a."/".$fname);
			
		}
		if($run){
			echo "<script>
			alert('Uploaded Success fully');
			</script>";

		}	
    }
    if(isset($_POST['submit'])){
    	header('location:profile1.php');
    }
}	

 ?>
 <script type="text/javascript">
 	function p(){
 	var	a=document.getElementById('up');
 	document.getElementById('sub').style.display="block";
 	im.src=URL.createObjectURL(a.files[0]);

}
 </script>
</body>
</html>
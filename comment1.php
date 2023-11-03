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
			position: relative;
			height: 550px;
			width: 450px;
			padding: 20px 15px;
			border: 1px solid black;
			background: #E4F5F2  ;
			margin: 20px auto;
			overflow: auto;
			border-radius: 5px;

		}
		.main::-webkit-scrollbar{
			display:none;
			apearence:none;
		}
		#cin{
			position: relative;
			left: 60px;
		 	border: none;
		 	border-radius: 20px;
		 	padding: 5px;
		 	width: 240px;
		 	z-index: 1;
			background: aqua;
			outline: none;
			display: inline-block;

		}
		#sub{
			position: relative;
		 	border-radius: 10%;
			left: 75px;
		 	padding: 5px;
		 	z-index: 1;
			background:red;
			display: inline-block;
			cursor: pointer;
		}
	
		#mid,#mn{
			display: none;
		}
		#img{
			font-size: 25px;
			height: 37px;
			width:37px;
			float: left;
			padding: 1px;
			position: relative;
			display:block;
			border: 1px solid black;
			border-radius: 50%;
		}
		#name{
			font-size: 18px;
			font-weight: bold;
			position: relative;
		}
		#com{
			border: 1px solid black;
			display: inline-block;
			position: relative;
			left: 5px;
			padding: 5px;
			max-width: 350px;
			border-radius: 10px;
			background: orange;
		}
		#date{
			position: relative;
			left: 50px;
			font-size: 12px;
			display: inline-block;
			padding-top:0px;
			padding-bottom: 10px;

		}

		
		#down{
			border: 1px solid black;
			height: 35px;
			width: 450px;
			z-index: 1;
			position:fixed;
			top: 534px;
			display: inline-block;
			border-bottom-left-radius: 5px;
			border-bottom-right-radius: 5px;
			padding: 2px;
			margin-left:-16px ;
			border-bottom: none;
			border-top: none;
			background: #C6E7E2 ;
		}
		#arrow{
			position: relative;
			display:inline-block;
			font-size: 20px;
			float: left;
			font-weight: bolder;
			left: 8px;
			background: none;
			outline: none;
			border: none;
			cursor: pointer;
			text-decoration: none;

		}
 	</style>
 </head>
 <body>
	<div class='main'>
		<?php 
		session_start();
 		if(isset($_GET['comment'])){
		$image_id=$_GET['id'];
		$image_name=$_GET['image'];
		$name=$_SESSION['name'];
		$email=$_SESSION['email'];

		$_SESSION['nid']=$_GET['id'];
		$_SESSION['image']=$_GET['image'];

	$con=mysqli_connect("localhost","root","","tik");
	if($con){
	$data="SELECT * FROM `comment` where `image`='".$image_name."' and `image_id`='".$image_id."' ";
	$q1=mysqli_query($con,$data);

	while($fetch=mysqli_fetch_assoc($q1)){
	echo "<form method='get' action='pchat.php' >
	<input type='number' id='mn' name='pid' value='".$_GET['id']."'>
	<input type='text' id='img' value='&#129333;' name='chart' disabled>
	<input type='text' name='cname' id='mn' value=".$fetch['comment_name'].">
	<div id='com'>
	 <p id='name'> ".$fetch['comment_name']."</p>
	 <input type='email' name='cemail' value=".$fetch['comment_email']." id='mn'>

	".$fetch['comments']." </div><br>
	<p id='date'>".$fetch['date']."</p><br></form>";
	}
	
		echo "<div id down1>";
		echo "<div id='down'>
		<a href='profile1.php' id='arrow'>&#8678;</a>
		<form method='get' action='comment.php'>";
			echo "<input type='text' name='com' id='cin' autofill='off' placeholder='   Write a comment...' required>
			<input type='number' name='nid' value='".$image_id."' id='mid'>
			<input type='text' name='mname' value='".$image_name."' id='mn'>
			<input type='submit' name='submit' id='sub' value='Post'>
			</form></div></div>";
}
}
 ?>
 </div>
 </body>
 </html>
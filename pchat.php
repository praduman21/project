<?php session_start(); ?>

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
			height: 550px;
			width: 450px;
			padding: 20px 15px;
			border: 1px solid black;
			background: #E4F5F2  ;
			margin: 20px auto;
			overflow: auto;
			border-radius: 5px;
			position: relative;
		}
		.main::-webkit-scrollbar{
			display:none;
			apearence:none;
		}
		.reban{
			height: 50px;
			width: 450px;
			background: gray;
			position: relative;
			display: inline-block;
			top: -20px;
			left: -16px;
			border-top-right-radius: 5px;
			border-top-left-radius:5px ;
		}
		#profile{
			font-size: 25px;
			height: 37px;
			width:37px;
			padding: 1px;
			position: relative;
			left: 20px;
			top: 5px;
			display:inline-block;
			border: 1px solid whitesmoke;
			border-radius: 50%;
		}
		#arrow{
			position: relative;
			display:inline-block;
			color: whitesmoke;
			font-size: 20px;
			float: left;
			font-weight: bolder;
			left: 8px;
			top: 8px;
			background: none;
			outline: none;
			border: none;
			cursor: pointer;
		}
		#name{
			display: inline-block;
			position: relative;
			font-size: 20px;
			font-weight:bolder;
			left: 24px;
			color: whitesmoke;

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
		}
		#hid{
			display: none;
		}
		.no
		{
			width: 40px;
		}
		#vdate{
			position: relative;
			left: 50px;
			font-size: 12px;
			display: inline-block;

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
		#vname{
			font-size: 18px;
			font-weight: bold;
			position: relative;
			display: inline-block;
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

	</style>
</head>
<body>
<div class="main">
	<div class="reban">
		<form >
		<input type="submit" id="arrow" value='&#129136;' name='arrow'>
		</form>
		<p id='profile'>&#129489;</p>
		<?php 
		echo "<p id='name'>".$_GET['cname']."</p>";
			if(isset($_GET['arrow'])){
				echo $image_id=$_SESSION['nid'];
				echo $image=$_SESSION['image'];
				header("location:comment1.php?comment=💬+Comment&id=".$image_id."&image=".$image);
			}

			echo "</div>";
				$name=$_SESSION['name'];
				$vemail=$_SESSION['email'];
				$pemail=$_GET['cemail'];
				$pid=$_GET['pid'];
		$con=mysqli_connect("localhost","root","","tik");
		if($con){
		$data="SELECT * FROM `pchat` where `vemail`='".$vemail."' AND `pemail`='".$pemail."' ";
		$q1=mysqli_query($con,$data);
		
		while($fetch=mysqli_fetch_assoc($q1)){
		echo "<p id='img'>&#129489;</p>
		<div id='com'>
		 <p id='vname'> ".$fetch['vname']."</p><br>
		".$fetch['vcomment']." </div><br>
		<p id='vdate'>".$fetch['vdate']."</p><br><br></form>";
		}
	}
	?>
	<div id="down">
		<form method="get" action="pcomment.php">
			<?php 
			echo "<input type='text' name='vname' id='hid' value=".$name.">
			<input type='number' name='pid' value=".$pid." id='hid' class='no'>
			<input type='email' name='vemail' id='hid' value=".$vemail.">
			<input type='email' name='pemail' id='hid' value=".$pemail.">
		<input type='text' name='vcomment' id='cin' autofill='off' placeholder='   Write a comment...' required>
			<input type='submit' name='submit' id='sub' value='Post'>";
			 ?>
		</form>
		</div>
	
	</div>
</div>
	
</body>
</html>
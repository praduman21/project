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
		#arrow{
			position: relative;
			display:inline-block;
			color: whitesmoke;
			font-size: 22px;
			float: left;
			font-weight: bolder;
			left: 8px;
			top: 8px;
			background: none;
			outline: none;
			border: none;
			cursor: pointer;
			text-decoration: none;

		}
		#profile{
			font-size: 85px;
			height: 127px;
			width:127px;
			padding:0px 13px;
			position: relative;
			left: 140px;
			top: 5px;
			display:inline-block;
			border: 1px solid black;
			border-radius: 50%;
		}
		#pname{
			font-size: 40px;
			position: relative;
			left: 160px;
			font-weight: bolder;
			display:inline-block;


		}
		#camera{
			position: relative;
			display:inline-block;
			font-size: 25px;
			float: right;
			right: 18px;
			top: 8px;
			background: none;
			outline: none;
			border: none;
			cursor: pointer;
			text-decoration: none;
		}


		#name{
			font-size: 25px;
			font-weight: bold;
		}
		#img{
			font-size: 27px;
			height: 50px;
			width: 45px;
			float: left;
			padding: 4px;
			position: relative;
			display:block;
			border: 2px solid black;
			border-radius: 50%;
			/*appearance: none;*/

		}
		#date{
			font-size: 12px;
		}
		#title{
			font-weight: bold;
			font-size: 18px;
		}
		
		#like{
			border:none;
			font-size: 22px;
			cursor: pointer;
			display: inline-block;
		}
		#uid{
			display: none;
		}
		#mg{
			display: none;	
		}
		#comm{
			display:  inline-block;
			border: none;
			outline: none;
			position: relative;
			left: 28%;
			bottom: 27px;
			font-size:20px ;
			cursor: pointer;
		}
	</style>

</head>
<body>
<div class="main">
	<div class="reban">
		<a href='profile1.php' id='arrow'>&#8678;</a>
		<a href="profile.php" id='camera'><label class="camera">&#128247;</label> </a>
		
	</div>
	<?php 
		echo "<p id='profile'>&#129333;</p><br>
		<p id='pname'>".$_GET['pname']."</p>";

	$con=mysqli_connect("localhost","root","","tik");
	if($con){
	$data="SELECT * FROM `upload` where `upload_id`=".$_GET['logid']." order by `date` DESC";
	$q1=mysqli_query($con,$data);
	$a="uploads";
	$count=1;
	while($fetch=mysqli_fetch_assoc($q1)){
		$q="select * from `likes` where `image`='".$fetch['image']."' and `image_id`='".$fetch['id']."' ";
		$q2="select * from `comment` where `image`='".$fetch['image']."' and `image_id`='".$fetch['id']."' ";

		echo "<form method='get' action='profile2.php'  id='f".$count."'></form>";

		echo " <form method='get' action='personal.php'>
		<input type='text' id='img' value='&#129333;' name='pimg' disabled>
		<input type='number' id='mg' value=".$fetch['upload_id']." name='logid'>
		<input type='text' id='mg' value=".$fetch['name']." name='pname'>
		</form>
		
		 <p id='name'> ".$fetch['name']."</p>";
		echo "<p id='date'>".$fetch['date']."</p><br>";
		echo "<p id='title'>".$fetch['title']."</p>";
		echo "<img src=$a/".$fetch['image']." height='400' width='100%' margin='0' padding='0'><br>";
		 "<input type='text' form='f".$count."' value='".$fetch['image']."' name='image'>";
		
		$run=mysqli_query($con,$q);
		if($run){
			$like=mysqli_num_rows($run);
		}
		echo "<input type='submit' id='like' value='&#128077;".$like."' form='f".$count."' name='like' >";
		echo "<form method='get'>
			<input type='number' name='id' form='f".$count."' value='".$fetch['id']."' id='uid'>
			<input type='text' form='f".$count."' value='".$fetch['image']."' name='image' id='mg'>
			
		</form>";
		if($q2){
		$run2=mysqli_query($con,$q2);
		$comment=mysqli_num_rows($run2);

		echo "<form method='get' action='comment1.php' id='ff".$count."'>
		<input type='number' name='id' form='ff".$count."' value='".$fetch['id']."' id='uid'>
			<input type='text' form='ff".$count."' value='".$fetch['image']."' name='image' id='mg'>
			
		<input type='submit' id='comm' value='&#128172; Comment ".$comment."' form='ff".$count."' name='comment' >
		</form>
		";
		
}

		$count++;
}
}




 	?>
</div>
</body>
</html>
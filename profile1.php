
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
		}
		.main::-webkit-scrollbar{
			display:none;
			apearence:none;
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
			cursor: pointer;
		}
		#date{
			font-size: 12px;
		}
		#title{
			font-weight: bold;
			font-size: 18px;
		}
		.cam{
			 position: absolute;
			z-index: 1;
			top: 510px;


		}
		.camera{
			/*position: fixed;*/
		 	border: 1px solid black;
		 	/*top: 460px;*/
		 	padding: 5px;
		 	border-radius: 50%;
		 	font-size: 30px;
		 	z-index: 1;
		 	margin:450px 190px;
			background: red;
		 	list-style-type: none;
		 	cursor: pointer;

		 	/*width: 15px;*/
		}
		#like{
			border:none;
			font-size: 22px;
			cursor: pointer;
			display: inline-block;
		}
		#lik{
			border:none;
			display: block;

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
	<div class="sess">
<?php 
session_start();
if(isset($_SESSION['name'])){
	echo "<a href='sin.php'> ".$_SESSION['name']." Logout your Account</a>";
}else{
	header('location:caccount.php');
}
 ?>
	</div>
<div class="main">
	<div class="cam">
<a href="profile.php" style="display: block; width: 0px; height:0px; "><label class="camera">&#128247;</label> </a>
</div>
<?php 
$con=mysqli_connect("localhost","root","","tik");
	$ctable="create table if not exists upload(id int not null auto_increment primary key, name varchar(50) not null, image varchar(50) not null, title varchar(50), email varchar(50),upload_id int, date datetime not null default current_timestamp())";
	mysqli_query($con, $ctable);
if($con){


	$data="SELECT * FROM `upload` order by `date` DESC";
	$q1=mysqli_query($con,$data);
	$a="uploads";
	$count=1;
	while($fetch=mysqli_fetch_assoc($q1)){
		$q="select * from `likes` where `image`='".$fetch['image']."' and `image_id`='".$fetch['id']."' ";
		$q2="select * from `comment` where `image`='".$fetch['image']."' and `image_id`='".$fetch['id']."' ";

		echo "<form method='get' action='profile2.php'  id='f".$count."'></form>";

		echo " <form method='get' action='personal.php'>
		<input type='submit' id='img' value='&#129333;' name='pimg'>
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
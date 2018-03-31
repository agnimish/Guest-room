<?php
	@ob_start();
	session_start();
  if(!isset($_POST['key'])){
    $_SESSION['key']=mt_rand(10000,1000000);
  }
?>
	<!doctype html>
	<html lang="en">

	<head>
		<title>Guest room</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="Hall 12,guest room" />
		<script type="application/x-javascript">
			addEventListener("load", function() {
				setTimeout(hideURLbar, 0);
			}, false);

			function hideURLbar() {
				window.scrollTo(0, 1);
			}
		</script>
		<!-- font files -->
		<link href="//fonts.googleapis.com/css?family=Spectral" rel="stylesheet">
		<!-- /font files -->
		<!-- css files -->
		<link href="css/style.css" rel='stylesheet' type='text/css' media="all" />
		<!-- /css files -->
		<link href="css/font-awesome.css" rel="stylesheet">
		<!-- font-awesome icons-css-file -->
		<link href="css/wickedpicker.css" rel="stylesheet" type='text/css' media="all" />

		<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	</head>

	<body>
		<div class="w3-banner-main">
			<div class="center-container">
				<h1 class="header-w3ls">Guest room booking</h1>
				<div class="content-top">
					<div class="content-w3ls">
						<div class="form-w3ls">
							<form action="#" method="post">
								<div class="content-wthree1">
									<div class="grid-agileits1">
										<div class="form-control">
											<label class="header">Conformation key <span>*</span></label>
											<input type="text" id="name" name="na" placeholder="Key" title="Please enter Conformation key" required="">
										</div>
									</div>
								</div>
						</div>

						<div class="form-w3ls-1">
						</div>
						<input type="submit" name="key" value="Next">

						</form>
						<div class="clear"></div>
					</div>

				</div>

			</div>
		</div>
		<?php
  require '../db.php';
  if(isset($_POST['submit'])){
    mail($_SESSION['email'],'Conformation Key',$_SESSION['key']);
  	$i=1;
  	while($i<=5){
  	$_SESSION['name'.$i]=empty($_POST['name'.$i])?NULL:$_POST['name'.$i];
  	$_SESSION['age'.$i]=empty($_POST['age'.$i])?0:(int)$_POST['age'.$i];
  	$_SESSION['sex'.$i]=empty($_POST['selector'.$i])?'NP':$_POST['selector'.$i];
  	$i++;
  }
} elseif(isset($_POST['key'])){
    if($_SESSION['key']==(int)($_POST['na'])){
  	$query="INSERT INTO details
  	 VALUES (NULL,'".$_SESSION['name']."',".$_SESSION['roll_number'].",'".$_SESSION['email']."','".$_SESSION['from']."','".$_SESSION['to']."',".$_SESSION['no_guest'].",".$_SESSION['room'].",'".$_SESSION['name1']."',".$_SESSION['age1'].",'".$_SESSION['sex1']."','".$_SESSION['name2']."',".$_SESSION['age2'].",'".$_SESSION['sex2']."','".$_SESSION['name3']."',".$_SESSION['age3'].",'".$_SESSION['sex3']."','".$_SESSION['name4']."',".$_SESSION['age4'].",'".$_SESSION['sex4']."','".$_SESSION['name5']."',".$_SESSION['age5'].",'".$_SESSION['sex5']."',0)";
  	 if($db->query($query)==TRUE){
       mail($_SESSION['email'],'Room booked','Congrats,your room is booked');
  	 echo "<script>alert('Request submitted!');</script>";
   }else{
  	 echo "error". mysqli_error($db);
   }
   session_destroy();
   mysqli_close($db);
 }
  }else {
    header('Location:http://iitkhall12.tk/Guest-room/Guest-room/');
  }
   ?>
			<!-- Calendar -->
			<link rel="stylesheet" href="css/jquery-ui.css" />
			<script src="js/jquery-ui.js"></script>
			<script>
				$(function() {
					$("#datepicker,#datepicker1,#datepicker2,#datepicker3").datepicker();
				});
			</script>
			<!-- //Calendar -->
			<script type="text/javascript" src="js/wickedpicker.js"></script>
			<script type="text/javascript">
				$('.timepicker').wickedpicker({
					twentyFour: false
				});
			</script>
			<?php

			 ?>

	</body>

	</html>

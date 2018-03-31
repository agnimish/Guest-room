<?php
	@ob_start();
	session_start();
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

			<?php
				require '../db.php';
				if(isset($_POST['smit'])){
					$_SESSION['name']=$_POST['name'];
					$_SESSION['roll_number']=(int)$_POST['roll_number'];
					/*$day1 = strtotime($_POST["from"]);
					$_SESSION['from']= date('Y-m-d', $day1);
					$day2 = strtotime($_POST["to"]);
					$_SESSION['to']=date('Y-m-d', $day2);*/
					$_SESSION['no_guest']=(int)$_POST['no_guest'];
					$_SESSION['email']=$_POST['email'];
			 ?>
				<div class="content-top">
					<div class="content-w3ls">
						<div class="form-w3ls">
							<form action="4.php" method="post">
								<div class="content-wthree1">
									<div class="grid-agileits1">

										<?php
										$i=1;
										while($i<=$_SESSION['no_guest']){
										echo"<div class=\"form-control\">
										<br>
										<div style='color:white;'>
											<h1>Guest ".$i."</h1>
										<label class=\"header\">Name <span>*</span></label>
										<input type=\"text\" id=\"name\" name=\"name".$i."\" placeholder=\"Name\" title=\"Please enter Full Name\" required=\"\">
									</div></div>
									<div class=\"form-control\">
									<label class=\"header\">Age <span>*</span></label>
									<input type=\"text\" id=\"name\" name=\"age".$i."\" placeholder=\"Age\" title=\"Please enter Age\" required=\"\">
									</div>
									<div class=\"grid-w3layouts1\">
									<div class=\"w3-agile1\">
										<label class=\"rating\">Gender<span>*</span></label>
										<ul>
											<li>
												<input type=\"radio\" id=\"a-option".$i."\" value=\"M\" name=\"selector".$i."\">
												<label for=\"a-option".$i."\">Male</label>
												<div class=\"check\"></div>
											</li>
											<li>
												<input type=\"radio\" id=\"b-option".$i."\" value=\"F\"name=\"selector".$i."\">
												<label for=\"b-option".$i."\">Female</label>
												<div class=\"check\"><div class=\"inside\"></div></div>
											</li>

										</ul>
									</div>
								</div>

									";
									$i++;
								}
									?>


									</div>
								</div>
						</div>
						<div class="form-w3ls-1">
						</div>
						<input type="submit" value="Book" name="submit">
						</form>
						<div class="clear"></div>
					</div>

				</div>

		</div>
	</div>
	<link rel="stylesheet" href="css/jquery-ui.css" />
	<script src="js/jquery-ui.js"></script>
	<script>
		$(function() {
			$("#datepicker,#datepicker1,#datepicker2,#datepicker3").datepicker();
		});
	</script>
	<script type="text/javascript" src="js/wickedpicker.js"></script>
	<script type="text/javascript">
		$('.timepicker').wickedpicker({
			twentyFour: false
		});
	</script>
	<?php
}else{
	header('Location:http://iitkhall12.tk/Guest-room/Guest-room/');
}
 ?>

</body>

</html>

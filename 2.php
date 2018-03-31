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
	<?php
	$n=1;
	if(isset($_POST['smt'])){
	if(!empty($_POST['room'])){
		foreach($_POST['room'] as $selected){
			$n+=pow(2,(int)$selected);
		}
	}
	echo $n;
	$_SESSION['room']=$n;
	?>
		<div class="w3-banner-main">
			<div class="center-container">
				<h1 class="header-w3ls">Guest room booking</h1>

				<div class="content-top">
					<div class="content-w3ls">
						<div class="form-w3ls">
							<form action="3.php" method="post">
								<div class="content-wthree1">
									<div class="grid-agileits1">
										<div class="form-control">
											<label class="header">Name <span>*</span></label>
											<input type="text" id="name" name="name" placeholder="Name" title="Please enter your Full Name" required="">
										</div>
										<div class="form-control">
											<label class="header">Roll Number <span>*</span></label>
											<input type="text" id="name" name="roll_number" placeholder="Roll Number" title="Please enter your Roll Number" required="">
										</div>
										<div class="form-control">
											<label class="header">Number of guest<span>*</span></label>
											<select name="no_guest" class="form-control">
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
										</select>
										</div>
									</div>
								</div>
						</div>
						<div class="form-w3ls-1">
							<div class="form-control">
								<label class="header">IITK Email <span>*</span></label>
								<input type="email" id="email" name="email" placeholder="Mail@iitk.ac.in" title="Please enter a Valid IITK Email Address" required="">
							</div>
						</div>
						<input type="submit" name="smit" value="Next">
						</form>
						<div class="clear"></div>
					</div>
				</div>
			</div>
		</div>
		<?php
		}else{
			header('Location:http://iitkhall12.tk/Guest-room/Guest-room/');
		}
			 ?>

</body>

</html>

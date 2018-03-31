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
	<link href="//fonts.googleapis.com/css?family=Spectral" rel="stylesheet">
	<link href="css/style.css" rel='stylesheet' type='text/css' media="all" />
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
										<label class="header">From<span>*</span></label>
										<input id="datepicker1" name="from" type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" required="">
									</div>
								</div>
							</div>
					</div>
					<div class="form-w3ls-1">
						<div class="form-control">
							<label class="header">To<span>*</span></label>
							<input id="datepicker" name="to" type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" required="">
						</div>
					</div>
					<input type="submit" name="submit" value="Check">

					</form>
					<div class="clear"></div>
					<form action="2.php" method="post">
						<div style="min-height:0px;margin-top:50px;">
							<?php
						if(isset($_POST['submit'])){
						 ?>
								<div style="height:500pxpx;width:100%;overflow-x:scroll;display:flex;align-items:center;">
									<div style="width:100px;float:left;">
										<div style="height:60px;width:100px;border:solid;margin:2px;background-color:rgba(255,255,255,0.3);border-radius:10px;">
										</div>
										<label for="1">
					       <div style="height:60px;width:100px;border:solid;margin:2px;background-color:rgba(255,255,255,0.3);border-radius:10px;">
									 Guest room 1
 								 <input  name="room[]" type="checkbox" id="1" value="1">
								 </div></label>
										<label for="2">
					       <div style="height:60px;width:100px;border:solid;margin:2px;background-color:rgba(255,255,255,0.3);border-radius:10px;">
									 Guest room 2
									 <input  name="room[]" type="checkbox" id="2" value="2">
								 </div>
							 </label>
										<label for="3">
					       <div style="height:60px;width:100px;border:solid;margin:2px;background-color:rgba(255,255,255,0.3);border-radius:10px;">
									 Guest room 3
									 <input  name="room[]" type="checkbox" id="3" value="3">
								 </div>
							 </label>
										<label for="4">
					       <div style="height:60px;width:100px;border:solid;margin:2px;background-color:rgba(255,255,255,0.3);border-radius:10px;">
									 Guest room 4
									 <input  name="room[]" type="checkbox" id="4" value="4">
								 </div>
							 </label>
									</div>
									<?php
		}
		require '../db.php';
		class gurm{
			public $dte;
			public $index;
			public $room;
			public $pending;
		}
		if(isset($_POST['submit'])){
			$day1 = strtotime($_POST["from"]);
			$_SESSION['from']= date('Y-m-d', $day1);
			$day2 = strtotime($_POST["to"]);
			$_SESSION['to']=date('Y-m-d', $day2);
			$i=0;
			$stdt=strtotime($_POST["from"]);
			$eddt=strtotime($_POST["to"]);
			$diff=(int)(($eddt-$stdt)/86400);
			$dte=$stdt;
			for($i=0;$i<=$diff;$i++){
				$d[$i]=new gurm();
				$d[$i]->dte=$dte;
				$d[$i]->index=$i;
				$d[$i]->room=0;
				$d[$i]->pending=0;
				$dte=strtotime(date('Y-m-d',strtotime('+1 day',$dte)));
			}
			$dte=date('Y-m-d',$stdt);
			$dt=date('Y-m-d',$eddt);
			$query="SELECT * FROM details";
			$res = mysqli_query($db, $query);
			if($res){
				while($row=mysqli_fetch_array($res)){

					$i=0;
					if(strtotime($row['from'])>strtotime($dte)){
						$aa = new DateTime($dte);
						$bb = new DateTime($row['from']);
						$i=(int)$aa->diff($bb)->format("%d");
					}
					while($i<=$diff&&$d[$i]->dte<=strtotime($row['to'])){
						$d[$i]->room=$d[$i]->room|$row['guest_room'];
						$d[$i]->pending=$d[$i]->pending|((int)$row['Approval']?$row['guest_room']:0);
						$i++;
					}
				}
			}
			for($i=0;$i<=$diff;$i++){
				echo '<div style="width:100px;float:left;">
		      			<div style="height:60px;width:100px;border:solid;margin:2px;background-color:;background-color:rgba(255,255,255,0.3);border-radius:10px;">
									'.date('d-m-Y',$d[$i]->dte).'
								</div>
		      			<label for="1"><div style="height:60px;width:100px;border:solid;margin:2px;background-color:'.(floor($d[$i]->room%4/2)?((floor($d[$i]->pending%4/2))?'rgba(255,0,0,0.2)':'rgba(255,255,0,0.2)'):'rgba(17,255,0,0.2)').';"></div></label>
								<label for="2"><div style="height:60px;width:100px;border:solid;margin:2px;background-color:'.(floor($d[$i]->room%8/4)?((floor($d[$i]->pending%8/4))?'rgba(255,0,0,0.2)':'rgba(255,255,0,0.2)'):'rgba(17,255,0,0.2)').';"></div></label>
								<label for="3"><div style="height:60px;width:100px;border:solid;margin:2px;background-color:'.(floor($d[$i]->room%16/8)?((floor($d[$i]->pending%16/8))?'rgba(255,0,0,0.2)':'rgba(255,255,0,0.2)'):'rgba(17,255,0,0.2)').';"></div></label>
								<label for="4"><div style="height:60px;width:100px;border:solid;margin:2px;background-color:'.(floor($d[$i]->room%32/16)?((floor($d[$i]->pending%32/16))?'rgba(255,0,0,0.2)':'rgba(255,255,0,0.2)'):'rgba(17,255,0,0.2)').';"></div></label>
							</div>';
			}
	}
		 ?>
								</div>
						</div>

						<input name="smt" type="submit" style="width:300px;" value="Next">
					</form>
				</div>
			</div>
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
</body>

</html>

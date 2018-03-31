<?php
	@ob_start();
	session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="shortcut icon" href="images/other/hall12.png" type="image/x-icon" />
	<title>Guest room</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Hall of Residence 12 guest room." />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="HTML,CSS,JavaScript">
	<meta name="author" content="Akash kumar singh">
</head>

<body>
	<?php
  require '../db.php';
    if($_SESSION['user']=='hall12manager'&&$_SESSION['pass']=='hall12rocks'){
      ?>
		<?php
        $query="SELECT * FROM details WHERE Approval=".$_SESSION['selector1'];
        $response = mysqli_query($db, $query);
// If the query executed properly proceed
if($response){
echo '
<form method="post"action="#">
<table align="left" style="overflow-x:scroll;">
<tr><td align="left"><b>Name</b></td>
<td align="left"><b>Roll number</b></td>
<td align="left"><b>Email</b></td>
<td align="left"><b>From</b></td>
<td align="left"><b>To</b></td>
<td align="left"><b>Number of guest</b></td>
<td align="left"><b>Guest room</b></td>
<td align="left"><b>Guest 1 name</b></td>
<td align="left"><b>Guest 1 age</b></td>
<td align="left"><b>Guest 1 sex</b></td>
<td align="left"><b>Guest 2 name</b></td>
<td align="left"><b>Guest 2 age</b></td>
<td align="left"><b>Guest 2 sex</b></td>
<td align="left"><b>Guest 3 name</b></td>
<td align="left"><b>Guest 3 age</b></td>
<td align="left"><b>Guest 3 sex</b></td>
<td align="left"><b>Guest 4 name</b></td>
<td align="left"><b>Guest 4 age</b></td>
<td align="left"><b>Guest 4 sex</b></td>
<td align="left"><b>Guest 5 name</b></td>
<td align="left"><b>Guest 5 age</b></td>
<td align="left"><b>Guest 5 sex</b></td>
<td align="left"><b>Approval</b></td></tr>';
$arr=array();
while($row = mysqli_fetch_array($response)){
array_push($arr,(int)$row['id']);
echo '<tr><td align="left">' .
$row['Name_student'] . '</td><td align="left">' .
$row['Roll_Student'] . '</td><td align="left">' .
$row['IITK_email'] . '</td><td align="left">' .
$row['from'] . '</td><td align="left">' .
$row['to'] . '</td><td align="left">' .
$row['number_of_guest'] . '</td><td align="left">
'.(string)floor($row['guest_room']%4/2).'<input type="checkbox" name="room[]" value="'.(string)(4*(int)$row['id']).'">G1<br>
'.(string)floor($row['guest_room']%8/4).'  <input type="checkbox" name="room[]" value="'.(string)(4*(int)$row['id']+1).'">G2<br>
'.(string)floor($row['guest_room']%16/8).'  <input type="checkbox" name="room[]" value="'.(string)(4*(int)$row['id']+2).'">G3<br>
'.(string)floor($row['guest_room']/16).'<input type="checkbox" name="room[]" value="'.(string)(4*(int)$row['id']+3).'">G4<br>' . '</td><td align="left">' .

$row['guest_1_name'] . '</td><td align="left">' .
$row['guest_1_age'] . '</td><td align="left">' .
$row['guest_1_sex'] . '</td><td align="left">' .

$row['guest_2_name'] . '</td><td align="left">' .
$row['guest_2_age'] . '</td><td align="left">' .
$row['guest_2_sex'] . '</td><td align="left">' .

$row['guest_3_name'] . '</td><td align="left">' .
$row['guest_3_age'] . '</td><td align="left">' .
$row['guest_3_sex'] . '</td><td align="left">' .

$row['guest_4_name'] . '</td><td align="left">' .
$row['guest_4_age'] . '</td><td align="left">' .
$row['guest_4_sex'] . '</td><td align="left">' .

$row['guest_5_name'] . '</td><td align="left">' .
$row['guest_5_age'] . '</td><td align="left">' .
$row['guest_5_sex'] . '</td><td align="left">
<input name="rom[]" value="'.$row["id"].'" type="checkbox"></td></tr>';
}
echo '</table><input name="submit" type="submit" value="Submit"></form>';
}
       ?>
			<?php
}if(isset($_POST['submit'])){
  if(!empty($_POST['rom'])){
    foreach($_POST['rom'] as $selected){
      $query="UPDATE details SET Approval='".$_SESSION['selector']."'WHERE id=".$selected.";";
      if($db->query($query)==TRUE){
        echo "request submitted";
      }else{
     	 echo "error". mysqli_error($db);
      }
    }
  }
  if(!empty($_POST['room'])){
    $n=$arr[0];
    $k=1;
    foreach($_POST['room'] as $selected){
      echo $selected;
      if((floor((int)$selected/4)!=$n)){
        $n=floor((int)$selected/4);
        $k=1;
      }
      if(floor((int)$selected/4)==$n){
        $k+=pow(2,((int)$selected)%4+1);
        echo 'hi'. $k;
				$query="SELECT * FROM details WHERE id=".$n;
				$response = mysqli_query($db, $query);
				$row = mysqli_fetch_array($response);
				mail($row['IITK_email'],'Guest room','You are allotted'.$k.'guest room');
        $query="UPDATE details SET guest_room=".$k." WHERE id=".$n;
        if($db->query($query)==TRUE){
          echo "request submitted";
        }else{
       	 echo "error". mysqli_error($db);
        }
      }
    }
  }
}
   ?>
</body>

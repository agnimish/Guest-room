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
    if(isset($_POST['submit'])){
      if ($_POST['user']=='hall12manager'&&$_POST['pass']=='hall12rocks') {
        $_SESSION['user']=$_POST['user'];
        $_SESSION['pass']=$_POST['pass'];
        $_SESSION['selector']=(int)$_POST['selector'];
        $_SESSION['selector1']=(int)$_POST['selector1'];
        header("Location: logged.php"); /* Redirect browser */
exit();
      }
    }
   ?>
   <form action="#" method="post">
     <input type="text" name="user">
     <br>
     <input type="password" name="pass">
     <br>
     <label>Opration on request</label>
     <ul>
       <li>
         <input type="radio" id="a-option" value="0" name="selector">
         <label for="a-option">Delete</label>
         <div class="check"></div>
       </li>
       <li>
         <input type="radio" id="b-option" value="1" name="selector">
         <label for="b-option">Approve</label>
       </li><li>
       <input type="radio" id="c-option" value="2" name="selector">
       <label for="c-option">Accept</label>
     </li>
   </ul>
   <br>
   <label>Which request you want to see</label>
   <ul>
     <li>
       <input type="radio" id="a-option1" value="0" name="selector1">
       <label for="a-option1">Pending</label>
       <div class="check"></div>
     </li>
     <li>
       <input type="radio" id="b-option1" value="1" name="selector1">
       <label for="b-option1">Approved</label>
     </li><li>
     <input type="radio" id="c-option1" value="2" name="selector1">
     <label for="c-option1">Accepted</label>
   </li>
 </ul>
     <input type="submit" name="submit">

   </form>

</body>

<html>
<?php
session_start();
if(!(isset($_SESSION['id']))){
    header('Location: index.php');
}
	$sid = $_SESSION['id'];
	require_once('conn.php');
	if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $pravda = false;
    $sql = "SELECT id_user,card_number,card_expiration,card_last_numbers FROM card_data WHERE id_user = '$sid'";

    $result = mysqli_query($conn,$sql);

    
/*
    while($row = mysqli_fetch_assoc($result)){
        $var = utf8_encode($row['nazov']);
        $products[$i] = $var;
        $moneymP[$i] = $row['cena'];
        $idProductmP[$i] =  $row['id'];
        $i++;
        //#ffc24f;
    }

*/


    while($row = mysqli_fetch_assoc($result)){
    if($row["id_user"]==$_SESSION['id']){
    global $cn ;
    global $cex;
    global $cln;
    $cn  = $row["card_number"];
    $cex  = $row["card_expiration"];
    $cln  = $row["card_last_numbers"];
    }
    
    }
require_once('myProfileMenu.php');
?>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="styleRegistration.css">
</head>
<div class="boxRegister">
	<form  method="POST" action = "updateCard.php">
	<div class="register">
    <label style="font-weight:bold;font-size: 35px;margin-bottom:40px">My Card</label>
  
	<label style="font-size: 20px;">credit card number</label>
	<input type = "text" value = "<?php if(isset($cn)){echo $cn;}else echo ""; ?>" name = "numbercard"style="width:250px; height:30px; margin-bottom: 20px;">

	<label style="font-size: 20px;">card expiration date</label>
	<input type = "text" value = "<?php if(isset($cex)){echo $cex;}else echo ""; ?>" name = "expiration" style="width:250px; height:30px; margin-bottom: 10px;">

    <label style="font-size: 20px;">card last 3 digits</label>
	<input type = "text" value = "<?php if(isset($cln)){echo $cln;}else echo ""; ?>" name = "tridig" style="width:250px; height:30px; margin-bottom: 10px;">

	<input type="submit" name="LoginButton" value = "Update" style="margin-top:20px;font-weight:bold;font-size: 20px;margin-bottom: 30px; ">
	<a style="font-weight:bold;font-size: 25px;color:green;"><?php if(isset($_SESSION["card"])){
	if($_SESSION["card"]=="zmenena"){echo"Card number updated";$_SESSION["card"] = "0";}
	if($_SESSION["card"]=="nova"){echo"Card number inserted";$_SESSION["card"] = "0";}
	if($_SESSION["card"]=="existuje"){echo"This card is already in system";$_SESSION["card"] = "0";}
    }
	?></a>
    </div>
	
</div>
</html>
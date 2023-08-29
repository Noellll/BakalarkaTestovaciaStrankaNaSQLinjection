<?php
session_start();
$_SESSION['searchedItemId'] = $_GET['id'];
//$sqlll = "'UNION SELECT id,username,password_hashed FROM user#";
//echo $_SESSION['searchedItemId'];
header("location:myProfileIndex.php");
?>
<?php
session_start();

//$sqlll = "'UNION SELECT id,username,password_hashed FROM user#";
//echo $_SESSION['searchedItemId'];

$_SESSION['searchProduct'] = $_POST['searchProduct'];
//header("location:myProfileIndex.php");
//echo $_SESSION['searchProduct'];

header("location:myProfileIndex.php");
?>
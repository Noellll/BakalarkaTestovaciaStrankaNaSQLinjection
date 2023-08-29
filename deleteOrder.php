<?php 
session_start();
$index = $_GET['index'];
$_SESSION['objednavkaList'][$index]=-1;
$i = $_SESSION['orderAllNumber'] -= 1;
header('Location: myOrder.php');
?>
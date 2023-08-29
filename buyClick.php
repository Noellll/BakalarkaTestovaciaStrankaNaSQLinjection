<?php
session_start();
if(!(isset($_SESSION['id']))){
      header('Location: index.php');
  }
require_once('conn.php');
if(isset($_SESSION['orderAllNumber'])){
      $i = $_SESSION['orderAllNumber'] += 1;
}
else{
      $i = $_SESSION['orderAllNumber'] = 1;    
}
if(!isset($_SESSION['objednavkaList'])){
      $_SESSION['objednavkaList'] = array();
}
$id_user = $_SESSION['id'];
$id_product = $_GET['id'];
$_SESSION['objednavkaList'][$i-1] = $id_product;
// potialto to fici

$postup = '%Y/%m/%d %H:%M:%S';
$cas = strftime($postup);
/*
$sql="INSERT INTO objednavky(id_user,datum_objednavky) 
      VALUES(?,?);";
$stmt = mysqli_prepare($conn,$sql);
mysqli_stmt_bind_param($stmt,"ss",$id_user,$cas);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
mysqli_stmt_close($stmt);

$sql2="INSERT INTO objednavka_list(id_objednavky,id_produkt,mnozstvo) 
      SELECT 1,'$id_product',1";//FROM objednavky AS o, produkty AS p
     // WHERE o.id = 1 AND p.id = '$id_product'";
$stmt = mysqli_prepare($conn,$sql2);
mysqli_stmt_execute($stmt);
$result2 = mysqli_stmt_get_result($stmt);
mysqli_stmt_close($stmt);

mysqli_close($conn);
header("location:myProfileIndex.php");
*/
header("location:myProfileIndex.php");
?>
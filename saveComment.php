<?php
session_start();
if(!(isset($_SESSION['id']))){
    header('Location: index.php');
}
require_once('conn.php');
if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
$komentar = $_POST['komentar'];
$idUser = $_SESSION['id'];
$sql="INSERT INTO komentare(id_user,komentar) 
VALUES('$idUser','$komentar');";

$result = mysqli_query($conn,$sql);
header('Location: contact.php');
?>
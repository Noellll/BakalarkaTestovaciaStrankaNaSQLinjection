<?php
session_start();
require_once('conn.php');
$id = $_SESSION['id'];
$i =0 ; 
$datum = date("Y-m-d H:i:s");
            if ($conn->connect_error) {
                die('Connection failed: ' . $conn->connect_error);
            }
            $sql = "INSERT INTO objednavky(id_user,datum_objednavky) 
            VALUES('$id','$datum');";
            $result=mysqli_query($conn,$sql);

            $sql2 = "SELECT id FROM objednavky WHERE id = (SELECT MAX(id) FROM objednavky) ";
            $result2=mysqli_query($conn,$sql2);
            $check_row = mysqli_fetch_assoc($result2);
            $idobj = $check_row['id'];
foreach($_SESSION['objednavkaList'] as $content ){
    $sql = "INSERT INTO objednavka_list(id_objednavky,id_produkt) 
            VALUES('$idobj','$content');";
            mysqli_query($conn,$sql);
            $_SESSION['objednavkaList'][$i]=-1;
            $i++;
            
}
$_SESSION['orderAllNumber'] = 0;
header('Location:myProfileIndex.php');
?>
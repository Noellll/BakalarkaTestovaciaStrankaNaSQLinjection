<?php session_start();


$id = $_SESSION['id'];
$numberc = $_POST['numbercard'];
$expiration = $_POST['expiration'];
$lastnumbers = $_POST['tridig'];

require_once('conn.php');
if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $pravda = false;
    $sql = "SELECT id_user,card_number FROM card_data WHERE id_user = '$id'";
    $result = mysqli_query($conn,$sql);
    
    
    $row = mysqli_fetch_assoc($result);
    if($row["id_user"] != $id){
      $pravda = true;
      $_SESSION["card"] = "nova";
    }
   
    if($row["id_user"]==$id && $row["card_number"]!=$numberc){
      $pravda = true;
      $sql = "DELETE FROM card_data WHERE id_user = ?";
      $stmt = mysqli_prepare($conn,$sql);
      mysqli_stmt_bind_param($stmt,"s",$id);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_close($stmt);
      $_SESSION["card"] = "zmenena";
      
    }

if($pravda){
$sql="INSERT INTO card_data(id_user,card_number,card_expiration,card_last_numbers) 
      VALUES(?,?,?,?);";
      $stmt = mysqli_prepare($conn,$sql);
      mysqli_stmt_bind_param($stmt,"isss",$id,$numberc,$expiration,$lastnumbers);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      mysqli_stmt_close($stmt);
      
}
else{
$_SESSION["card"] = "existuje";
}
header('Location: personalData.php');
?>
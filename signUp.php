<?php
session_start();
require_once('conn.php');
if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
$match = false;
if(isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password'])&& isset($_POST['password2']) ){
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
if($password == $password2){

    $sqlcheck = "SELECT id FROM user
    Where username = '$username' OR email = '$email'";
    $result=mysqli_query($conn,$sqlcheck);
    
    while($check_row = mysqli_fetch_assoc($result)){
      if($check_row['id']>0){$match=true;break;}
    }
    $password = hash('ripemd160', $password);
    if($match==false){
      
      $sql="INSERT INTO user(username,email,password_hashed) 
      VALUES('$username','$email','$password');";
      $result=mysqli_query($conn,$sql);
      
      //echo "<center><a style='color:green;font-weight:bold;font-size:20px;'> Account has been created</a></center>";
      $_SESSION['registration'] = 'true';
      $_SESSION['registrationTime'] = time();
      //echo "<script> location.href = 'http://localhost/bakalarka/index.php'</script>";
      echo "<script> location.href = 'http://pach1.borec.cz/index.php'</script>";
      
      
        
      
      
    }
    else{
      echo "<center><a style='color:red;font-weight:bold;font-size:20px;'>Email or username is already taken</a></center>";
    }
    mysqli_close($conn);
 }
else{
    echo "<center><a style='color:red;font-weight:bold;font-size:20px;'>Your passwords don't match</a></center>";
 }
}

 ?>
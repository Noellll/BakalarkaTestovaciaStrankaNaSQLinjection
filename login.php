<html>
<?php
session_start();

$currentCookieParams = session_get_cookie_params();  
$sidvalue = session_id();  
setcookie(  
    'PHPSESSID',//name  
    $sidvalue,//value  
    0,//expires at end of session  
    $currentCookieParams['path'],//path  
    $currentCookieParams['domain'],//domain  
    true, //secure  
    true //HttpOnly 
);  

$match = false;
require_once('conn.php');
if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    
  $email = $_POST['email'];
  $password = hash('ripemd160', $_POST['password']);
  $sqlcheck = "SELECT id,username,email,password_hashed FROM user
  Where username = '$email' AND password_hashed = '$password'";    //prepisal som email na username

 $result=mysqli_query($conn,$sqlcheck);
  
  
    
  while($check_row = mysqli_fetch_assoc($result)){
        $match=true; //if($check_row['email']==$email && $check_row['password_hashed']==$password)
        $_SESSION['id']=$check_row['id'];
        $_SESSION['email']=$email;
        $_SESSION['password']=$password;
        $_SESSION['username']=$check_row['username'];
                 
    }
  mysqli_close($conn);
  if($match==true){
    header("Location:myProfileIndex.php");
  }
  else{
    $_SESSION["login"] = false;
    $_SESSION["loginFalseTime"] = time();
    header("Location:index.php");
  }

 ?>
 </html>
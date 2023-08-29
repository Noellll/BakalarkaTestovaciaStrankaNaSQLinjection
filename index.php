<?php session_start();
if (isset($_SESSION['registrationTime']) && (time() - $_SESSION['registrationTime'] > 10)) {
	session_unset();
	session_destroy();
}
?>
<html>
<title>
Home
</title>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="styleLogin.css">
</head>
<body style="background-color: white;">

<?php require_once('indexMenu.php'); //tuto sa nachadza horne menu?> 

<div class="boxLogin">

	<form  action="login.php" method="post">
	<div class="login">
    <label style="font-weight:bold;font-size: 35px;margin-bottom:40px">Login</label>
  
	<label style="font-size: 20px;">Username</label>
	<input type = "text" name = "email" style="margin-bottom: 20px; width:250px;height:30px;">
  
	<label style="font-size: 20px;">Password</label>
	<input type = "text" name = "password" style="width:250px; height:30px;">

	<input type="Submit" name="LoginButton" value = "Submit" style="margin-top:20px;font-weight:bold;font-size: 20px; ">
    </div>
	<?php  if(isset($_SESSION['registration']) && $_SESSION['registration']=='true' && isset($_SESSION['registrationTime'])):?>
		<label><a style='color:green;font-weight:bold;font-size:20px;'> Account has been created</a></label>
	<?php endif;?>

	<?php  if(isset($_SESSION['login']) && $_SESSION['login']==false && isset($_SESSION['loginFalseTime']) && (time()-$_SESSION['loginFalseTime'])<3):?>
		<br>
		<center><label><a style='color:red;font-weight:bold;font-size:20px;'> Wrong password or username</a></label><center>
	<?php endif;?>

    </form>
</div>

<div class="boxRegister">
	<label>Don't have an account? <a href="registrationForm.php"> Sign up</a></label>
</div>
</body>
</html>

<html>
<title>
Home
</title>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="styleRegistration.css">
</head>
<body style="background-color: #f8f8ff;">

<div class = "menubox">

	<div class = "menuLabel">SHOP</div>
    <div class = "menuButton" style="width:20%;background-color:transparent;"></div>
	<a href = "myProfileIndex.php" class = "menuButton" style="text-decoration:none;">Products</a>
	<a href = "aboutUs.php"  class = "menuButton" style="text-decoration:none;">About us</a>
	<a href = "contact.php" style="text-decoration:none;" class = "menuButton">Contact</a>
	<div class = "menuButton" style="width:15%;background-color:transparent;"></div>
	<a href='index.php' class = "menuButton" style="text-decoration:none;">Log in</a>
</div>

<div class="boxRegister">
	<form action = "registrationForm.php" method="post">
	<div class="register">
    <label style="font-weight:bold;font-size: 35px;margin-bottom:40px">Register</label>

	<label style="font-size: 20px;">Email</label>
	<input type = "text" name = "email" style="margin-bottom: 20px; width:250px;height:30px;">

	<label style="font-size: 20px;">Username</label>
	<input type = "text" name = "username" style="margin-bottom: 20px; width:250px;height:30px;">
  
	<label style="font-size: 20px;">Password</label>
	<input type = "text" name = "password" style="width:250px; height:30px; margin-bottom: 20px;">

	<label style="font-size: 20px;">Confirm Password</label>
	<input type = "text" name = "password2" style="width:250px; height:30px; margin-bottom: 10px;">

	<input type="submit" name="LoginButton" value = "Register" style="margin-top:20px;font-weight:bold;font-size: 20px;margin-bottom: 30px; ">
    </div>
</div>
    <div class="messageBox">
    	<label style="height:30px;">
			<?php include_once('signUp.php');ob_end_flush();?>
			
    	</label>
    </div>
</body>
</html>
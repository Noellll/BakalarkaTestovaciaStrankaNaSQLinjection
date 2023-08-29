<html>
<title>
Home
</title>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="styleMyProfileMenu.css">
</head>
<body style="background-color: #f8f8ff;">

<div class = "menubox">
    <div class = "menuLabel">SHOP</div>
    <div class = "menuButton" style="width:20%;background-color:transparent;"></div>
	<a href = 'myProfileIndex.php' class = "menuButton" style="text-decoration:none;">Products</a>
	<a href = 'aboutUs.php' class = "menuButton" style="text-decoration:none;">About us</a>
	<a href = 'contact.php' class = "menuButton" style="text-decoration:none;">Contact</a>
    <a href = 'myOrder.php' style="text-decoration:none;" class = "menuButton">My orders<div  style="color:red;width:30px;text-decoration:none;"><?php if(isset($_SESSION['orderAllNumber']) && $_SESSION['orderAllNumber']!=0){echo $_SESSION['orderAllNumber'];}?></div></a>
    <a href = 'personalData.php' class = "menuButton" style = "margin-left:10%;width:12%;text-decoration:none;">My account: <?php echo htmlspecialchars($_SESSION['username']);?></a>
	<a href= 'logOut.php' class = "menuButton" style="text-decoration:none;">Log out</a>
</div>

</body>
</html>

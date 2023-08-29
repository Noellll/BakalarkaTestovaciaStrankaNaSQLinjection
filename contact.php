<?php
session_start();
if(isset($_SESSION['id'])){
require_once('myProfileMenu.php');
}
else{
    require_once('indexMenu.php');  //ked niekto nie je prihlaseny
}
?>
<body style="background-color:#e0dede;">
<div style="width:100%;height:90%;;display:flex;justify-content:center;flex-direction:column;align-items:center;">
<div style="position:absolute;top:15%;font-weight:bold;"><p>Telefónne číslo: 0917483912<br> Email : noelpach@gmail.com</p></div>
    <div style="border:2px solid black;width:60%;display:flex;justify-content:start;margin-top:10%;">
        <?php 
        echo "Vaše Komentáre<br><br>";
        require_once('conn.php');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }
        $sql = "SELECT * FROM komentare";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($result)){
            $idUser = $row['id_user'];

            $sql2 = "SELECT username FROM user where id = '$idUser'";
            $result2=mysqli_query($conn,$sql2);
            $row2 = mysqli_fetch_assoc($result2);
            echo $row2['username'].":"."<br>";
            echo $row['komentar'];
            echo "<br><br>";
        }
        ?>
    <?php if(isset($_SESSION['id'])):?>
    </div>
<label><bold>Leave comment<bold></label>
        <form style="height:40%;width:50%;display:flex;flex-direction:column;align-items:center;margin-top:10px;"method="post" action="saveComment.php">
        <input type="text" style="height:70%;width:80%;" method="post" name = "komentar">
        <input class="submitButton" type="submit" value="Submit"></form>
</div>
<?php endif;?>
</body>
<style>
.submitButton{
    display:flex;
    justify-content:center;
    align-items:center;
    width:25%;
    background-color:green;
    height:15%;
    border-radius:10%;
    margin-top:5px;
}
</style>
<?php
session_start();
if(!(isset($_SESSION['id']))){
    header('Location: index.php');
}
require_once('myProfileMenu.php');
global $cena,$index,$sucetSuma,$size,$prazdne;
$cena = array();
$index = 0;
$sucetSuma = 0;
$prazdne = false;
?>
<?php if(isset($_SESSION['objednavkaList']) && $_SESSION['objednavkaList']!=""):?>
<?php foreach($_SESSION['objednavkaList'] as $content ):?>
    <?php if($content!=-1):?>
    <br>
<div style="width:50%;display:flex;flex-direction:row;">
    <div style="display:flex;background-color:white;width:100%;height:70px;border:2px solid orange;align-items:center;margin-bottom:10px;">
        <div style="font-size:18px;width:40%;background-color:red;
            height:70px;display:flex;align-items:center;">&nbsp&nbsp<?php 
            require_once('conn.php');
            if ($conn->connect_error) {
                die('Connection failed: ' . $conn->connect_error);
            }
            $sql = "SELECT nazov,cena FROM produkty WHERE id='$content'";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($result);
        
            echo "Produkt: ".$row["nazov"];
        $cena[$index] = $row["cena"];   
        $sucetSuma += $cena[$index];  
        ?>
        
        
        </div>
            <div style="width:40%;"></div>
            <div style="width:15%;"><?php echo "Cena: ".$cena[$index]." eur";?></div>
            <div><a href="deleteOrder.php?index=<?php echo $index;$index++; ?>" style="width:5%;color:red;font-weight:bold;text-decoration:none;">X</a></div>
    </div>
    
</div>
    <?php else:?>
        <?php $index++;?>
    <?php endif;?>
<?php endforeach;?>
<?php $pocet = count($_SESSION['objednavkaList']);
$i = 0;
foreach($_SESSION['objednavkaList'] as $content ){
    if($content=="-1")
    $i++;
    if($i==$pocet) $prazdne = true;
}?>
<?php if($prazdne==false):?>
<label style="position:absolute;left:75%;top:25%;">Celková suma: <?php echo $sucetSuma?></label>
<a href="finishOrder.php" class="payButton">Finish Order</a>
<?php else:?>
    <label><br><bold>Nemáte pridaný žiadny tovar<bold></label>
<?php endif;?>
<?php else:?>
    <label><br><bold>Nemáte pridaný žiadny tovar<bold></label>
<?php endif;?>

<style>
    .payButton{
        position:absolute;
        left:72%;
        top:35%;
        font-weight:bold;
        background-color:white;
        font-size:25;
        width:15%;
        height:5%;
        text-align:center;
        display:flex;
        justify-content:center;
        border:1px solid black;
    }
    .payButton:hover{
        background-color:#e0dede;
    }
</style>


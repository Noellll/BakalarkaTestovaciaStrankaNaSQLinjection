<?php session_start();
if(isset($_SESSION['id'])){
require_once('myProfileMenu.php');
}
else{
    require_once('indexMenu.php'); 
}
global $classContentmP,$moneyCountmP,$countmP,$classOfProduct,$moneymP,$idmP,$indexmP,$idProductmP;
$countmP = 0;
$idProductmP = array();
$products = array();
$classOfProduct = array();
$idmP = array();
$indexmP = 0;
?>
<html style='overflow-y: hidden;'>
<head>
<meta charset='utf-8'>
</head>
<body style="background-color:#f8f8ff;">
<div class="productBox">
        <div class="productBoxClass">
        
            <?php require_once('conn.php'); 

            if ($conn->connect_error) {
                die('Connection failed: ' . $conn->connect_error);
            }
            $sql = "SELECT id,nazov FROM skupina_produkty";
            $result=mysqli_query($conn,$sql);
            $i = 0;
            while($row = mysqli_fetch_assoc($result)){
                $var = '';
                $var .= utf8_encode($row['nazov']);
                $classOfProduct[$i] = $var;
                $idmP[$i] = $row['id'];
                $i++;
            }
            
             ?>
             
             <?php foreach($classOfProduct as $content):?>
                <a   href="pickClassSearch.php?id=<?php echo $idmP[$indexmP];$indexmP++?>" class="menuLeftButton" style="text-decoration:none;">
                <?php echo $content;?></a>
             <?php endforeach;?>
             <a href="pickClassSearch.php?id=all" class="menuLeftButton" style="text-decoration:none;">All</a>
             </div>
        
        <div class="productBoxClass" style='width:70% !important;justify-content:start !important'>
                <div style="margin-bottom: 60px; width:80%;height:30px;margin-left:15%;margin-top:5%;margin-right:15%;">
                    <form action = "pickOneProduct.php" method = "POST" >
                        <input type="text" name="searchProduct" style="width:60%;height:30px;">
                        <input type="submit" class="searchButton" value="Search">
                        
                    </form>
                </div>
                <script> function addToCard(){var number = document.getElementById("count").innerHTML;
                console.log(number);
                }</script>
                <div class="showContent">
                    <?php require_once('conn.php'); 
                        if ($conn->connect_error) {
                            die('Connection failed: ' . $conn->connect_error);
                        }
                        if(isset($_SESSION['searchedItemId'])){
                            $i = 0;
                            $moneyCountmP = 0;
                            $moneymP = array();
                            unset($moneymP);
                            unset($products);
                            $search = $_SESSION['searchedItemId'];
                            if($search != "all"){
                            $sql = "SELECT id,nazov,cena FROM produkty WHERE id_skupina= '$search'  ;
                            ";
                            }
                            else{$sql = "SELECT id,nazov,cena FROM produkty";}
                            $result = mysqli_query($conn,$sql);
                        }
                        elseif(!(isset($_SESSION['searchedItemId']))){
                            $i = 0;
                            unset($moneymP);
                            unset($products);
                            $moneyCountmP = 0;
                            $moneymP = array();
                            $sql = "SELECT id,nazov,cena FROM produkty ";
                            $result = mysqli_query($conn,$sql);
                        }
                    
                        if(isset($_SESSION['searchProduct'])){
                            $produktHladany = $_SESSION['searchProduct'];
                            $i = 0;
                            unset($moneymP);
                            unset($products);
                            $moneyCountmP = 0;
                            $moneymP = array();
                            $sql = "SELECT id,nazov,cena FROM produkty WHERE nazov = '$produktHladany'";
                            unset($_SESSION['searchProduct']);
                            $result = mysqli_query($conn,$sql);
                        }

                        while($row = mysqli_fetch_assoc($result)){
                            $var = utf8_encode($row['nazov']);
                            $products[$i] = $var;
                            $moneymP[$i] = $row['cena'];
                            $idProductmP[$i] =  $row['id'];
                            $i++;
                            //#ffc24f;
                        }
                    
                        ?>
                        
                        <?php foreach($products as $content ):?>
                            <div style="background-color:white;width:70%;display:flex;height:100px;border:2px solid orange;align-items:center;margin-bottom:20px;">
                            <div style="font-size:18px;width:65%;background-color:white;
                            height:80px;display:flex;align-items:center;">&nbsp&nbsp<?php echo $content;?>
                            </div>
                            <div style="font-size:18px;width:20%;background-color:white;
                            height:80px;display:flex;align-items:center;">cena: <?php echo $moneymP[$moneyCountmP];$moneyCountmP++;?>
                            </div>
                            <a class="buyButton" href="buyClick.php?id=<?php echo $idProductmP[$countmP];$countmP++;?>" style="text-decoration:none;">Buy</a>
                            </div>
                        <?php endforeach;?>
                </div>
        </div>
    </div>
</body>
</html>


<style>
.showContent{
    width:100%;
	height:100%;
	display:flex;
	justify-content:start;
	flex-direction: column;
	align-items:start;
	background-color:#f8f8ff;
    margin-left:15%;

    
}
.buyButton{
    font-size:20px;
    width:12%;
    background-color:orange !important;
    height:80px;display:flex;
    align-items:center;
    justify-content:end;
    font-weight:bold;
    background:url(addKosik.png);
    background-position:left;
    background-size:50% 50%;
    background-repeat:no-repeat;
    padding: 2% 2% 1% 1%;
    
}
.buyButton:hover{
    background-color:#e0dede !important;
}
.searchButton{
    height:30px;
    weight:15%;
    background-color:black;
    color:white;
    margin-left:-4px;
}
.menuLeftButton{
    width:70%;
    margin-left:12%;
    height:10%;
    font-size:18px;
    background-image: linear-gradient(to right,orange,#e67300);
    text-align:center;
    display:flex;
    align-items:center;
    margin-bottom:5%;
    border-radius:25px;
    justify-content:center;
}
.menuLeftButton:hover{
    background-color:#e0dede;
    transform: scaleY(1.1);
}
.productBox{
    position: stickey;
	width:100%;
	height:90%;
	display:flex;
	justify-content:start;
	align-items:start;
	gap: 15px;
	background-color:#f8f8ff;
}
.productBoxClass{
	width:20%;
    position: stickey;
	height:100%;
	display:flex;
	justify-content:center;
	flex-direction: column;
	align-items:start;
	background-color:#f8f8ff;
    overflow-y: auto;
    overflow-x: hidden;
    
}
</style>
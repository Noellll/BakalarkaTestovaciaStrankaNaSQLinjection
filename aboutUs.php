<?php
session_start();
if(isset($_SESSION['id'])){
require_once('myProfileMenu.php');
}
else{
    require_once('indexMenu.php');
}
?>
<div style="width:100%;height:90%;display:flex;justify-content:center;">
<p style="position:absolute;top:20%;">Nasa firma je záruka kvality a profesionality od roku 2019<br> Predávame kvalitné stavebnice určené pre všetky ročníky</p>
</div>
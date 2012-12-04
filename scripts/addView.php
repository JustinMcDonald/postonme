<?php
$id = $_GET["id"];

include('/home/postonme/hidden_scripts/db.php');

$sql = "UPDATE advertisement SET views=views+1 WHERE adid=" . $id;

if (!mysql_query($sql)) return false;
else return true;
?>
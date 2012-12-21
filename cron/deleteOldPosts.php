<?php
include('/home/postonme/hidden_scripts/db.php');
$currentTime = time();
$maxLifetime = 2592000;

$query = "DELETE FROM advertisement WHERE date + $maxLifetime < $currentTime;";

if(!mysql_query($query)) echo "uhoh";
else echo "deleted";
?>

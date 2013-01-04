<?php
$mysql_hostname = "localhost";
$mysql_user = "postonme_client";
$mysql_password = "p0720nm3";
$mysql_database = "postonme_publicDB";
$prefix = "";
$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Opps some thing went wrong");
mysql_select_db($mysql_database, $bd) or die("Opps some thing went wrong");
?>
<?php
$mysql_hostname = "localhost";
$mysql_user = "postonme_admin";
$mysql_password = "emnotsop2012";
$mysql_database = "postonme_publicDB";
$prefix = "";
$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Opps some thing went wrong");
mysql_select_db($mysql_database, $bd) or die("Opps some thing went wrong");
?>
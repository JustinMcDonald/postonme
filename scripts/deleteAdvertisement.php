<?php
include('/home/postonme/hidden_scripts/db.php');
$adid = $_GET['adid'];

if (isset($_SESSION['online']))
{
	if ($_SESSION['online'])
	{
		$validation = include('/home/postonme/hidden_scripts/validate.php');
		if ($validation != 1) exit();
	}
}

if (!mysql_query("UPDATE advertisement SET visible=0 WHERE adid='".mysql_real_escape_string($adid)."';")) return false;
else return true;
?>
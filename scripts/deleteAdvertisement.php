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

if (!mysql_query("DELETE FROM advertisement WHERE adid='$adid';")) return false;
else return true;
?>
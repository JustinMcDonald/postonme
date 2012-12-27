<?php
include('/home/postonme/hidden_scripts/session.php');
$cid = $_POST['cid'];

if (isset($_SESSION['online']))
{
	if ($_SESSION['online'])
	{
		$validation = include('/home/postonme/hidden_scripts/validate.php');
		if ($validation != 1) exit();
	}
}

(isset($_SESSION['username'])) ? $user = $_SESSION['username'] : exit();
if (!mysql_query("UPDATE conversation SET active_inquirer=1 WHERE id='".mysql_real_escape_string($cid)."' AND inquirer='$user';")) return false;
if (!mysql_query("UPDATE conversation SET active_poster=1 WHERE id='".mysql_real_escape_string($cid)."' AND poster='$user';")) return false;
?>
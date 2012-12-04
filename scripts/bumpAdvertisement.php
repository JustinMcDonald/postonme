<?php
include('/home/postonme/hidden_scripts/definitions.php');
include('/home/postonme/hidden_scripts/session.php');
$adid = $_POST['adid'];
$currentTime = time();

if (isset($_SESSION['online']))
{
	if ($_SESSION['online'])
	{
		$validation = include('/home/postonme/hidden_scripts/validate.php');
		if ($validation != 1) exit();
	}
}

$user = $_SESSION['username'];

$result = mysql_query("SELECT exp FROM account WHERE username='$user'");
if ($result) 
{
	$account = mysql_fetch_array($result);
	$exp = $account['exp'];
}
else 
{
	echo GENERAL_FAIL;
	exit();
}

if ($exp > 0)
{
	if (!mysql_query("UPDATE advertisement SET date='$currentTime' WHERE adid='$adid';"))
	{
		echo GENERAL_FAIL;
		exit();
	}

	if (!mysql_query("UPDATE account SET exp=exp-1 WHERE username='$user'"))
	{
		echo GENERAL_FAIL;
		exit();
	}
	else echo SUCCESS;
}
else echo GENERAL_FAIL;
?>
<?php
include('/home/postonme/hidden_scripts/definitions.php');
include('/home/postonme/hidden_scripts/session.php');

$user = $_POST["user"];
$pass = $_POST["pass"];

$encrypt = md5($pass);

$tempuser = $user;
$temppass = $encrypt;

$validation = include("/home/postonme/hidden_scripts/validate.php");

if  ($validation == 1)
{
	$currentuser = $_SESSION['username'];
	if (substr($currentuser, 0, 5) == "Guest")
	{
		$response = mysql_query("UPDATE account SET tmponline=false WHERE username='".mysql_real_escape_string($currentuser)."'");
		if (!$response)
		{
			error_log(mysql_error, 0);
			echo json_encode(array(SQL_ERROR));
		}
	}
	
	$_SESSION['username'] = $properusername;
	$_SESSION['password'] = $encrypt;
	$_SESSION['online'] = true;

	$response = mysql_query("UPDATE account SET online=true WHERE username='".mysql_real_escape_string($user)."'");
	//$response = mysql_query("UPDATE account SET online=true, chatIP=$_SERVER['REMOTE_ADDR'] WHERE username='".mysql_real_escape_string($user)."'");
	if ($response)
	{
		$response = mysql_query("SELECT exp FROM account WHERE username='".mysql_real_escape_string($user)."'");
		if ($response)
		{
			$account = mysql_fetch_array($response);
			$jsonarray = array(SUCCESS, $properusername, $account['exp']);
			echo json_encode($jsonarray);
		}
		else
		{
			error_log(mysql_error, 0);
			echo json_encode(array(SQL_ERROR));
		}
	}
	else
	{
		error_log(mysql_error, 0);
		echo json_encode(array(SQL_ERROR));
	}
}
else
{
	echo json_encode(array($validation));
}
?>
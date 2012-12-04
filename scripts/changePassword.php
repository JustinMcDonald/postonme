<?php
include('/home/postonme/hidden_scripts/definitions.php');
include('/home/postonme/hidden_scripts/session.php');
$pass = $_POST['pass'];
$newpass = $_POST['newpass'];

$encrypt = md5($pass);
$encryptnewpass = md5($newpass);

if ($encrypt == $_SESSION['password'])
{
	$validation = include('/home/postonme/hidden_scripts/validate.php');
	if ($validation != 1) exit();
	
	$user = $_SESSION['username'];
	
	if (!mysql_query("UPDATE account SET password='$encryptnewpass' WHERE username='$user'")) echo "Something went wrong, please try again later.";
	else 
	{
		$_SESSION['password'] = $encryptnewpass;
		echo SUCCESS;
	}
}
else echo "Password mismatch.";
?>
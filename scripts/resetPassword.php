<?php
include('/home/postonme/hidden_scripts/session.php');
include('/home/postonme/hidden_scripts/db.php');
$user = $_POST['user'];
$code = $_POST['code'];
$pass = $_POST['pass'];

$encrypt = md5($pass);

$response = mysql_query("SELECT verificationcode, active FROM account WHERE username='$user'");
if ($response)
{
	$account = mysql_fetch_array($response);
	$accountcode = $account['verificationcode'];
	$accountactive = $account['active'];
}
else 
{
	echo "Something went wrong, please try again later.";
	exit();
}

if ($code == $accountcode && $accountactive)
{
	if (mysql_query("UPDATE account SET password='$encrypt', verificationcode='', online=true WHERE username='$user'"))
	{
		$_SESSION['username'] = $user;
		$_SESSION['password'] = $encrypt;
		$_SESSION['online'] = true;
		echo "Your password has been reset successfully.";
	}
	else echo "Something went wrong, please try again later.";
}
else echo "Something went wrong, please try again later.";
?>
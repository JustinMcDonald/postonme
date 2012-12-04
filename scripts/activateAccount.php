<?php
$activateuser = $_GET['user'];
$verify = $_GET['verify'];
$code = $_GET['code'];

if ($verify)
{
	$response = mysql_query("SELECT verificationcode, password, active, reference FROM account WHERE username='$activateuser'");
	if ($response)
	{
		$activateaccount = mysql_fetch_array($response);
		$accountcode = $activateaccount['verificationcode'];
		$accountpass = $activateaccount['password'];
		$accountactive = $activateaccount['active'];
		$accountreference = $activateaccount['reference'];
	}
	else
	{
		echo "<script>alert('Your account has been not been activated. Please try again later.');</script>";
		exit();
	}

	if ($code == $accountcode && !$accountactive)
	{
		if (mysql_query("UPDATE account SET active=true, online=true WHERE username='$activateuser'"))
		{
			$_SESSION['username'] = $activateuser;
			$_SESSION['password'] = $accountpass;
			$_SESSION['online'] = true;
			echo "<script>alert('Your account has been successfully activated!');</script>";
		}
		else echo "<script>alert('Your account has been not been activated. Please try again later.');</script>";
	}
	else echo "<script>alert('Your account has been not been activated. Please try again later.');</script>";
	
	mysql_query("UPDATE account SET exp=exp+5 WHERE username='$accountreference'");
}
?>
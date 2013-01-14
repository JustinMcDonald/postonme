<?php
include('/home/postonme/hidden_scripts/definitions.php');
include('/home/postonme/hidden_scripts/session.php');

$newuser = $_POST['user'];

$resource = mysql_query("SELECT email, verificationcode FROM account WHERE username='".mysql_real_escape_string($newuser)."'");
if ($resource)
{
	$account = mysql_fetch_array($resource);
	$email = $account['email'];
	$verification_code = $account['verificationcode'];
	include('/home/postonme/public_html/email/emailVerification.php');
	echo SUCCESS;
}
else
{
	echo "Something went wrong, please try again later!";
	error_log(mysql_error, 0);
	exit();
}
?>
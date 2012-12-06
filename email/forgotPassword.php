<?php
include('/home/postonme/hidden_scripts/definitions.php');
include('/home/postonme/hidden_scripts/db.php');

$email = $_POST["email"];

if (!filter_var($email, FILTER_VALIDATE_EMAIL))
{
	echo INVALID_EMAIL;
	exit();
}

$query = "SELECT username, active FROM account WHERE email='".mysql_real_escape_string($email)."'";  
$result = mysql_query($query);  

if (mysql_num_rows($result) == 1)
{
	$account = mysql_fetch_array($result);
	$user = $account['username'];
	$active = $account['active'];
	if ($active)
	{
		$verification_code = generateRandomString(32);
		
		$query = "UPDATE account SET verificationcode='".mysql_real_escape_string($verification_code)."' WHERE username='".mysql_real_escape_string($user)."'";
		$result = mysql_query($query);
		if (!$result)
		{
			echo "Something went wrong, please try again later.";
			exit();
		}
		
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		//$headers .= 'From: PostOnMe Support <support@postonme.com>' . "\r\n";
		//$headers .= 'Mailed-By: magic@postonme.com' . "\r\n";
		$headers .= 'Reply-To: support@postonme.com';

		$subject = 'PostOnMe! Reset Password for "' . $user . '"';

		$message = "
			<html>
			<head><title>PostOnMe Reset Password</title></head>
			<body>
				<p><b>Uh-oh, you forgot your password! Do not worry, your account '" . $user . "' is safe!</b></p>
				<p>To reset your password, just click the link below:</p>
				<a href='www.postonme.com/account.php?user=" . $user . "&reset=1&code=" . $verification_code . "'>www.postonme.com/account</a>
			</body>
			</html>
		";

		mail($email, $subject, $message, $headers);
		
		echo "Email sent. Check your email to reset your password";
	}
	else echo "This account has not been activated yet.";
}
else echo "No account is linked to that email.";

function generateRandomString($length)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}
?>
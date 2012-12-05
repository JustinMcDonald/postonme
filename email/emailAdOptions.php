<?php
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
//$headers .= 'From: PostOnMe Support <support@postonme.com>' . "\r\n";
//$headers .= 'Mailed-By: magic@postonme.com' . "\r\n";
$headers .= 'Reply-To: support@postonme.com';

$subject = 'PostOnMe "'. $title .'" Advertisement Posted';

if ($online || $madeaccount)
{
$message = "
	<html>
	<head><title>PostOnMe Account Activation</title></head>
	<body>
		<p><b>Congratulations! You're PostOnMe advertisement '" . $title . "' has been successfully posted!</b></p>
		<p>It will expire in 30 days.</p>
		
		<p>Alternatively, you may delete your advertisement by clicking the link below:</p>
		<a href='www.postonme.com/account.php?adid=" . $adid . "&delete=1&code=" . $owner_code . "'>www.postonme.com/account</a>
	</body>
	</html>
";
}
else
{
$message = "
	<html>
	<head><title>PostOnMe Account Activation</title></head>
	<body>
		<p><b>Congratulations! You're PostOnMe advertisement '" . $title . "' has been successfully posted!</b></p>
		<p>It will expire in 30 days.</p>
		<p>To delete it, just click the link below:</p>
		<a href='www.postonme.com/account.php?adid=" . $adid . "&delete=1&code=" . $owner_code . "'>www.postonme.com/account</a>
	</body>
	</html>
";
}

mail($email, $subject, $message, $headers);
?>
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
	<head><title>PostOnMe Advertisement Posted</title></head>
	<body>
		<p><b>Woohoo! You're PostOnMe advertisement '" . $title . "' has been successfully posted.</b></p>
		<p>It will expire in 30 days.</p>
		<p>Visit your <a href='www.postonme.com/account'>account page</a> to modify or bump your post.</p>
		<p>You may delete your advertisement by clicking the link below:</p>
		<a href='www.postonme.com/account.php?adid=" . $adid . "&delete=1&code=" . $owner_code . "'>www.postonme.com/account.php?adid=" . $adid . "&delete=1&code=" . $owner_code . "</a>
		<p>If you have any questions, feel free to contact us at <a href='mailto:support@postonme.com'>support@postonme.com</a>.</p>
		</br>
		</br>
		<p>The PostOnMe Team</p>
	</body>
	</html>
";
}
else
{
$message = "
	<html>
	<head><title>PostOnMe Advertisement Posted</title></head>
	<body>
		<p><b>Woohoo! You're PostOnMe advertisement '" . $title . "' has been successfully posted.</b></p>
		<p>It will expire in 30 days.</p>
		<p>To delete it, just click the link below:</p>
		<a href='www.postonme.com/account.php?adid=" . $adid . "&delete=1&code=" . $owner_code . "'>www.postonme.com/account.php?adid=" . $adid . "&delete=1&code=" . $owner_code . "</a>
		<p>If you have any questions, feel free to contact us at <a href='mailto:support@postonme.com'>support@postonme.com</a>.</p>
		</br>
		</br>
		<p>The PostOnMe Team</p>
	</body>
	</html>
";
}

mail($email, $subject, $message, $headers);
?>
<?php
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: PostOnMe Support <support@postonme.com>' . "\r\n";
$headers .= 'Mailed-By: magic@postonme.com' . "\r\n";
$headers .= 'Reply-To: support@postonme.com';

$subject = 'Welcome to PostOnMe';

$message = "
	<html>
	<head><title>Welcome to PostOnMe</title></head>
	<body>
		<p><b>Welcome to PostOnMe!</b></p>
		<p>You're PostOnMe account '" . $newuser . "' is ready to rock!
		</br>To activate it, just click the link below:</p>
		<a href='www.postonme.com/account.php?user=" . $newuser . "&verify=1&code=" . $verification_code . "'>www.postonme.com/account</a>
		<p>If you have any questions, feel free to contact us at <a href='mailto:support@postonme.com'>support@postonme.com</a>.</p>
		</br>
		</br>
		<p>The PostOnMe Team</p>
	</body>
	</html>
";


mail($email, $subject, $message, $headers);
?>
<?php
include('/home/postonme/hidden_scripts/definitions.php');
$sender = $_GET['email'];
$message = $_GET['message'];
$adid = $_GET['adid'];

if ($message == "")
{
	echo "Please write a message.";
	exit();
}
if (!filter_var($sender, FILTER_VALIDATE_EMAIL))
{
	echo "Please provide a valid email.";
	exit();
}

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
//$headers .= 'From: PostOnMe Reply <magic@postonme.com>' . "\r\n";
//$headers .= 'Mailed-By: magic@postonme.com' . "\r\n";
$headers .= 'Reply-To: ' . $sender;

include('/home/postonme/hidden_scripts/db.php');

$query = "SELECT title, contact FROM advertisement WHERE adid=".mysql_real_escape_string($adid);
$result = mysql_query($query);
if (!$result)
{
	echo "Something went wrong, please try again later.";
	exit();
}
$ad = mysql_fetch_array($result);

$receiver = $ad['contact'];
$name = explode("@", $sender);
$subject = ucfirst($name[0]) . " is Interested in Your Advertisement \"" . ucfirst($ad['title']) . "\" on PostOnMe!";

$body = "
	<html>
	<head><title>PostOnMe Reply</title></head>
	<body>
		<div>".ucfirst($name[0])." said:</div>
		<div style='width:100%;border:1px solid black;margin-top:5px;padding:5px 10px;'><b>\t" . $message . "</b></div>
		<div style='margin-top:20px;'>To respond to ".ucfirst($name[0])." just reply to this email.</div>
	</body>
	</html>";

if (mail($receiver, $subject, $body, $headers)) echo SUCCESS;
else echo "Something went wrong, please try again later.";
?>
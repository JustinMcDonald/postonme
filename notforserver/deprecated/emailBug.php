<?php
$message = $_POST['message'];
$subject = "Uh oh, a new bug!";
if (mail("bugs@postonme.com", $subject, $message)) {
	$result = "Thank you for your bug report, we'll get right on it!";
	echo $result;
} else {
	$result = "Something went wrong, please try again later.";
	echo $result;
}
?>
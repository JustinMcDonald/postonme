<?php
$message = $_POST['message'];
$subject = "A new Suggestion!";
if (mail("suggestions@postonme.com", $subject, $message)) {
	$result = "Thank you for your suggestion!";
	echo $result;
} else {
	$result = "Something went wrong, please try again later.";
	echo $result;
}
?>
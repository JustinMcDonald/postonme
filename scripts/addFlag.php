<?php
$id = $_GET["id"];
$message = $_GET['message'];

include('/home/postonme/hidden_scripts/db.php');

$sql = "INSERT INTO flags (adid, message) VALUE (" . $id . ", \"" . $message . "\")";
$result = mysql_query($sql);
if (!$result) {
	echo "Error submitting the advertisment flag, please try again later.";
	exit();
} else echo "1";

?>
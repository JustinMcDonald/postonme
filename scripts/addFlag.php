<?php
$id = $_GET["id"];
$message = $_GET['message'];

include('/home/postonme/hidden_scripts/db.php');

$sql = "INSERT INTO flags (adid, message) VALUE (" . mysql_real_escape_string($id) . ", '" . mysql_real_escape_string($message) . "')";
$result = mysql_query($sql);
if (!$result) {
	echo "Error submitting the advertisment flag, please try again later.";
	exit();
} else echo "1";

?>
<?php
include('/home/postonme/hidden_scripts/session.php');

if (!(isset($_SESSION['username']))){
	echo "You need to login to use this feature";
	exit();
}

$user = $_SESSION['username'];

$accountinquiries = "";

$sql = "SELECT * FROM accountinquiries WHERE username=\"" . $user . "\"";
$sqlresponse = mysql_query($sql);

while ($id = mysql_fetch_array($sqlresponse)) {

	$accountinquiries = $accountinquiries . "." . $id['adid'];
}

echo substr($accountinquiries, 1);
?>
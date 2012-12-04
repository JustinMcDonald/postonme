<?php
include('/home/postonme/hidden_scripts/session.php');

if (!(isset($_SESSION['username']))){
	echo "You need to login to use this feature";
	exit();
}

$user = $_SESSION['username'];
$pass = $_SESSION['password'];

if  (include('/home/postonme/hidden_scripts/validate.php')){
	
	$accountposts = "";
	
	$sql = "SELECT * FROM accountposts WHERE username=\"" . $user . "\"";
	$sqlresponse = mysql_query($sql);
	
	while ($id = mysql_fetch_array($sqlresponse)) {
		
		$accountposts = $accountposts . "." . $id['adid'];
	}
	
	echo substr($accountposts, 1);
}
else{
	echo "Password mismatch.";
	exit();
}
?>
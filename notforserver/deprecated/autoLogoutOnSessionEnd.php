<?php
include('session.php');
ignore_user_abort(true);

/*if (!(isset($_SESSION['username']))){
	echo "You need to login to use this feature";
	exit();
}

$user = $_SESSION["username"];
$pass = $_SESSION["password"];
*/

$user = $_SESSION['username'];
$pass = $_SESSION['password'];
$thisid = session_id();

include('db.php');

$sql = "SELECT password FROM account WHERE username=\"" . $user . "\"";
$sqlresponse = mysql_query($sql);
if (!$sqlresponse) {
	echo "Unable to fetch user password.: " . mysql_error();
	exit();
}
$realpass = mysql_result($sqlresponse, 0);

if  ($pass == $realpass){
	
	while(1) {
		echo "test<br>\n";
		flush();
		sleep(2);
		if(!(session_id() == $thisid)) {
			
			$sql = "SELECT adid FROM accountposts WHERE username=\"" . $user . "\"";
			$rows = mysql_query($sql);
			if (!$rows) {
				echo "Unable to fetch post ID's: " . mysql_error();
				exit();
			}
			
			while ($row = mysql_fetch_array($rows)) {
				
				$sql = "UPDATE advertisement SET posteronline=false WHERE adid=" . $row[0];
				$response = mysql_query($sql);
				if (!$response) {
					echo mysql_error();
					exit();
				}
			}
			die();
		}
	}
}
else {
	echo "Password mismatch.";
	exit();
}
?>
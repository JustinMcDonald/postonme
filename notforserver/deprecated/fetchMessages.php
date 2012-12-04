<?php 
include('/home/postonme/hidden_scripts/session.php');

if (!(isset($_SESSION['username']))){
	echo "You need to login to use this feature";
	exit();
}

$fetch = $_GET['id'];
$user = $_SESSION['username'];
$pass = $_SESSION['password'];
$type = substr($fetch, 0, 1);
$id = substr($fetch, 1);

if ($type == "p"){
	if (!include('/home/postonme/hidden_scripts/validate.php')) {
		echo "Invalid username or password.";
		exit();
	}
}

$sql = "";
if ($type == "p") {
	$sql = "SELECT * FROM messagein WHERE adid='$id' AND readMessage='0' ORDER BY time ASC";
} else if ($type == "i") {
	$sql = "SELECT * FROM messageout WHERE adid='$id' AND inquirer='$user' AND readMessage='0' ORDER BY time ASC";
}
$messages = mysql_query($sql);
if (!$messages){
	echo "Error fetching messages.";
	exit();
}

if (mysql_num_rows($messages) > 0) {

	$sql = "SELECT title FROM advertisement WHERE adid=" . $id;
	$response = mysql_query($sql);
	if(!$response){
		echo "Error fetching advertisement title";
		exit();
	}
	$title = mysql_result($response, 0);
	echo $title . "`%~";
	
	while($message = mysql_fetch_array($messages)) {
		echo $message['username'] . "`%~" . $message['message'] . "`%~";
		
		if ($type == "p") {
			$sql = "UPDATE messagein SET readMessage='1' WHERE id=" . $message['id'];
		} else if ($type == "i") {
			$sql = "UPDATE messageout SET readMessage='1' WHERE id=" . $message['id'];
		}
		
		if (!$response = mysql_query($sql)) echo "Error editing readMessage" . mysql_error();
	}
}
else exit();
?>
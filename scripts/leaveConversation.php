<?php
include('/home/postonme/hidden_scripts/session.php');

$cid = $_POST['cid'];
$current_time = time();
$user = $_SESSION['username'];

if (isset($_SESSION['online']))
{
	if ($_SESSION['online'])
	{
		$validation = include('/home/postonme/hidden_scripts/validate.php');
		if ($validation != 1) exit();
	}
}
$result = mysql_query("SELECT poster, inquirer FROM conversation WHERE id='".mysql_real_escape_string($cid)."'");
$conversation = mysql_fetch_array($result);

($user == $conversation['poster']) ? mysql_query("UPDATE conversation SET active_poster=false WHERE id='".mysql_real_escape_string($cid)."'") : mysql_query("UPDATE conversation SET active_inquirer=false WHERE id='".mysql_real_escape_string($cid)."'");
//mysql_query("INSERT INTO messages (conv_id, date, written_by, message, read_message) VALUES ('".mysql_real_escape_string($cid)."', $current_time, 'POSTONME', '".mysql_real_escape_string($user)." has left the conversation.', 0)");
?>
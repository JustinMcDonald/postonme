<?php
include('/home/postonme/hidden_scripts/session.php');

$data = $_POST['cids'];
$cids = explode(',', $data);
		
$user = $_SESSION['username'];
$pass = $_SESSION['password'];

if (isset($_SESSION['online']))
{
	if ($_SESSION['online'])
	{
		$validation = include('/home/postonme/hidden_scripts/validate.php');
		if ($validation != 1) exit();
	}
}

$conversation_array = array();

for ($i = 0; $i < count($cids) - 1; $i++)
{
	$conversation_object = array("$cids[$i]");
	$message_array = array();
	$messages = mysql_query("SELECT id, written_by, message FROM messages WHERE conv_id='$cids[$i]' AND written_by!='$user' AND read_message=false");
	while($message = mysql_fetch_array($messages))
	{
		$message_id = $message['id'];
		mysql_query("UPDATE messages SET read_message=true WHERE id=$message_id");
		$message_written_by = $message['written_by'];
		$message_text = $message['message'];
		$message_object = array("$message_written_by", "$message_text");
		array_push($message_array, $message_object);
	}
	array_push($conversation_object, $message_array);
	array_push($conversation_array, $conversation_object);
}

echo json_encode($conversation_array);
?>
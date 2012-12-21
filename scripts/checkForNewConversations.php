<?php
include('/home/postonme/hidden_scripts/session.php');

$data = $_POST['cids'];
$cids = explode(',', $data);

$constraints = "";
for ($i = 0; $i < count($cids) - 1; $i++)
{
	$constraints .= " AND id!=".mysql_real_escape_string($cids[$i])."'";
}
		
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

//FIND ALL CONVERSATIONS WHERE I AM THE INQUIRER
$query = "SELECT id, adid, poster FROM conversation WHERE inquirer='".mysql_real_escape_string($user)."' AND active_inquirer=true" . $constraints;
$conversations = mysql_query($query);
while($conversation = mysql_fetch_array($conversations))
{
	$conversation_id = $conversation['id'];
	$conversation_adid = $conversation['adid'];
	
	$result = mysql_query("SELECT title FROM advertisement WHERE adid='".mysql_real_escape_string($conversation_adid)."'");
	$advertisement = mysql_fetch_array($result);
	
	$conversation_title = $advertisement['title'];
	$conversation_poster = $conversation['poster'];
	$conversation_object = array("$conversation_id", "$conversation_title", "$conversation_poster");
	$message_array = array();
	$messages = mysql_query("SELECT message, written_by FROM messages WHERE conv_id='".mysql_real_escape_string($conversation_id)."'");
	while($message = mysql_fetch_array($messages))
	{
		$message_written_by = $message['written_by'];
		$message_text = $message['message'];
		$message_object = array("$message_written_by", "$message_text");
		array_push($message_array, $message_object);
	}
	array_push($conversation_object, $message_array);
	array_push($conversation_array, $conversation_object);
}

if ($_SESSION['online'])
{
	$query = "SELECT id, adid, inquirer FROM conversation WHERE poster='".mysql_real_escape_string($user)."' AND active_poster=true".$constraints;
	$conversations = mysql_query($query);
	while($conversation = mysql_fetch_array($conversations))
	{
		$conversation_id = $conversation['id'];
		$conversation_adid = $conversation['adid'];
		
		$result = mysql_query("SELECT title FROM advertisement WHERE adid='".mysql_real_escape_string($conversation_adid)."'");
		$advertisement = mysql_fetch_array($result);
		
		$conversation_title = $advertisement['title'];
		$conversation_inquirer = $conversation['inquirer'];
		$conversation_object = array("$conversation_id", "$conversation_title", "$conversation_inquirer");
		$message_array = array();
		$messages = mysql_query("SELECT id, message, written_by FROM messages WHERE conv_id='".mysql_real_escape_string($conversation_id)."'");
		while($message = mysql_fetch_array($messages))
		{
			$message_id = $message['id'];
			mysql_query("UPDATE messages SET read_message=true WHERE id='".mysql_real_escape_string($message_id)."'");
			$message_written_by = $message['written_by'];
			$message_text = $message['message'];
			$message_object = array("$message_written_by", "$message_text");
			array_push($message_array, $message_object);
		}
		array_push($conversation_object, $message_array);
		array_push($conversation_array, $conversation_object);
	}
}

echo json_encode($conversation_array);
?>
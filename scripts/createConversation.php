<?php
include('/home/postonme/hidden_scripts/session.php');

if (!isset($_SESSION['username'])) exit();

$adid = $_POST['adid'];
$result = mysql_query("SELECT username, title FROM advertisement WHERE adid='".mysql_real_escape_string($adid)."'");
if (!$result) exit();

$advertisement = mysql_fetch_array($result);

$title = $advertisement['title'];
$poster = $advertisement['username'];
$inquirer = $_SESSION['username'];
$current_time = time();

$result = mysql_query("SELECT id FROM conversation WHERE adid='".mysql_real_escape_string($adid)."' AND inquirer='".mysql_real_escape_string($inquirer)."' AND active_inquirer=true");
if (mysql_num_rows($result) > 0)
{
	$conversation = mysql_fetch_array($result);
	echo json_encode(array($conversation['id']));
	exit();
}

mysql_query("INSERT INTO conversation (adid, inquirer, poster, active_inquirer, active_poster) VALUES ('".mysql_real_escape_string($adid)."', '".mysql_real_escape_string($inquirer)."', '".mysql_real_escape_string($poster)."', true, true)");
$cid = mysql_insert_id();

echo json_encode(array($cid, $title, $poster));
?>
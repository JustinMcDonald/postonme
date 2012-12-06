<?php
include('/home/postonme/hidden_scripts/definitions.php');
include('/home/postonme/hidden_scripts/session.php');

if (!isset($_SESSION['username'])) exit();

$conv_id = $_POST["cid"];
$message = $_POST['message'];
$written_by = $_SESSION['username'];
$current_time = time();

if (!mysql_query("INSERT INTO messages (conv_id, date, written_by, message, read_message) VALUES ('".mysql_real_escape_string($conv_id)."', $current_time, '".mysql_real_escape_string($written_by)."', '".mysql_real_escape_string($message)."', false)")) echo SUCCESS;
else echo GENERAL_FAIL;
?>
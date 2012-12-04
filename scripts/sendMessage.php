<?php
include('/home/postonme/hidden_scripts/definitions.php');
include('/home/postonme/hidden_scripts/session.php');

if (!isset($_SESSION['username'])) exit();

$conv_id = $_POST["cid"];
$message = $_POST['message'];
$written_by = $_SESSION['username'];
$current_time = time();

if (!mysql_query("INSERT INTO messages (conv_id, date, written_by, message, read_message) VALUES ($conv_id, $current_time, '$written_by', '$message', false)")) echo SUCCESS;
else echo GENERAL_FAIL;
?>
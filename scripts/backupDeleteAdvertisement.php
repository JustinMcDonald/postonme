<?php
$adid = $_GET['adid'];
$delete = $_GET['delete'];
$code = $_GET['code'];

if ($delete)
{
	$response = mysql_query("SELECT owner_code FROM advertisement WHERE adid='".mysql_real_escape_string($adid)."'");
	if ($response)
	{
		$deletead = mysql_fetch_array($response);
		$owner_code = $deletead['owner_code'];
	}
	else 
	{
		echo "<script>alert('Something went wrong, please try again later.');</script>";
		exit();
	}
	
	if ($code == $owner_code)
	{
		if (!mysql_query("DELETE FROM advertisement WHERE adid = '".mysql_real_escape_string($adid)."';")) echo "<script>alert('Something went wrong, please try again later.');</script>";
		else echo "<script>alert('Your advertisement has been deleted!');</script>";
	}
	else echo "<script>alert('Something went wrong, please try again later.');</script>";
}
?>
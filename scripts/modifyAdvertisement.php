<?php
include('/home/postonme/hidden_scripts/constants.php');
include('/home/postonme/hidden_scripts/session.php');

$adid = $_POST['adid'];
$category = $_POST['category'];
$title = $_POST['title'];
$price = $_POST['price'];
$text = $_POST['text'];
$currentTime = time();

$validate = include("/home/postonme/hidden_scripts/validate.php");

if ($validate == 1)
{
	if(preg_match('/^.{5,75}$/',$title))
	{
		if (preg_match('/^[0-9]+$/',$price))
		{
			if(preg_match('/^.{1,500}$/s',$text))
			{
				if (mysql_query("UPDATE advertisement SET date='$currentTime', category='$category', title='$title', price='$price', text='$text' WHERE adid='$adid';")) echo "1Changes were successfully changed.";
				else echo "Something went wrong. Please try again later.";
			}
			else echo "Text must be between 1 and 500 characters.";
		}
		else echo "Price must only contain numbers (0-9).";
	}
	else echo "Title must be between 5 and 75 characters.";
}
else echo "Something went wrong. Please try again later.";
?>
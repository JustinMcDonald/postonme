<?php
include('/home/postonme/hidden_scripts/session.php');
include('/home/postonme/hidden_scripts/definitions.php');

$type = $_POST["adtype"];
$category = $_POST["categorytext"];
$title = $_POST["titletext"];
$price = $_POST["pricetext"];
$detail = $_POST["detailtext"];
$email = $_POST["emailtext"];
$newuser = $_POST["chatname"];
$newpass = $_POST["chatpass"];
$newpass2 = $_POST["chatpass2"];
$path = "../uploads/";
$valid_formats = array("jpg", "png", "gif", "bmp");
$valid_price_chars = array("0","1","2","3","4","5","6","7","8","9");
$name = $_FILES["file"]["name"];
$size = $_FILES["file"]["size"];
$uploaded = false;

if(isset($_POST["categorytext"]))
{
	if((strlen($title) > 4) and (strlen($title)< 51) and ($title != "5-50 characters"))
	{
		$goodprice=true;
		for ($i = 0; $i < strlen($price); $i++){
			if (!(in_array($price[$i], $valid_price_chars))) $goodprice=false;
		}
		if((strlen($price) > 0) and $goodprice)
		{
			if((strlen($detail) > 0) and (strlen($detail) < 200))
			{
				if (filter_var($email, FILTER_VALIDATE_EMAIL))
				{
					if(strlen($name))
					{
						list($txt, $ext) = explode(".", $name);
						if(in_array($ext,$valid_formats))
						{
							if($size<(1024*1024))
							{
								switch($ext)
								{
									case 'jpg':
										$image = imagecreatefromjpeg($_FILES['file']['tmp_name']);
										break;
									case 'png':
										$image = imagecreatefrompng($_FILES['file']['tmp_name']);
										break;
									case 'gif':
										$image = imagecreatefromgif($_FILES['file']['tmp_name']);
										break;
									default:
										echo UNSUPPORTED_FILETYPE;
										exit();
										break;
								}
								
								// Target dimensions
								$max_width = 818;
								$max_height = 460;
								$max_thumb_width = 50;
								$max_thumb_height = 50;

								// Get current dimensions
								$old_width = imagesx($image);
								$old_height = imagesy($image);

								// Calculate the scaling we need to do to fit the image inside our frame
								$scale = min($max_width/$old_width, $max_height/$old_height);
								$scale_thumb = min($max_thumb_width/$old_width, $max_thumb_height/$old_height);

								// Get the new dimensions
								$new_width = ceil($scale*$old_width);
								$new_height = ceil($scale*$old_height);
								$new_width_thumb = ceil($scale_thumb*$old_width);
								$new_height_thumb = ceil($scale_thumb*$old_height);
								
								// Create new empty image
								$new = imagecreatetruecolor($new_width, $new_height);
								$new_thumb = imagecreatetruecolor($new_width_thumb, $new_height_thumb);

								// Resize old image into new
								imagecopyresampled($new, $image, 0, 0, 0, 0, $new_width, $new_height, $old_width, $old_height);
								imagecopyresampled($new_thumb, $image, 0, 0, 0, 0, $new_width_thumb, $new_height_thumb, $old_width, $old_height);
								
								$actual_image_name = time().substr(str_replace(" ", "_", $txt), 5);
								
								if(imagejpeg($new, $path.$actual_image_name.".".$ext, 100) && imagejpeg($new_thumb, $path.$actual_image_name."_thumb".".".$ext, 100)) $uploaded = true;
								else
								{
									echo "<div class='errorbackground'>Oops! Something went wrong uploading the image..</div>";
									exit();
								}
								
							}
							else
							{
								echo "Your image is too big! Please choose a smaller image.";
								exit();
							}
							
						}
						else
						{
							echo UNSUPPORTED_FILETYPE;
							exit();
						}
					}
					
					$madeaccount = false;
					if (((strlen($newuser) > 0) or (strlen($newpass) > 0)) and ($newuser != "1-15 characters (a-z, 0-9)") and ($newpass != "5-15 characters"))
					{
						if((strlen($newuser) > 0) and (strlen($newuser) < 15))
						{
							if (substr($newuser, 0, 5) != "Guest")
							{
								if((strlen($newpass) > 4) and (strlen($newpass) < 15))
								{
									if ($newpass == $newpass2)
									{
										$encrypt = md5($newpass);
										
										$query = "SELECT username FROM account WHERE username=\"$newuser\"";  
										$result = mysql_query($query);  

										if (!(mysql_num_rows($result) > 0))
										{
											$verification_code = generateRandomString(32);
											$query = "INSERT INTO account (username, password, email, verificationcode) VALUES (\"$newuser\", \"$encrypt\", \"$email\", \"$verification_code\")"; 

											if (mysql_query($query))
											{
												$madeaccount = true;
												//TODO: MERGE ACCOUNTS HERE
												
												include('/home/postonme/public_html/scripts/emailVerification.php');
												/*
												$_SESSION['username'] = $newuser;
												$_SESSION['password'] = $encrypt;
												$_SESSION['online'] = true;
												*/
											} 
											else
											{
												echo GENERAL_FAIL; 
												exit();
											}
										}
										else
										{
											echo ACCOUNT_EXISTS;
											exit();
										}
									}
									else
									{
										echo PASSWORD_MISMATCH;
										exit();
									}
								}
								else
								{
									echo "Password must be 5-15 characters.";
									exit();
								}
							}
							else
							{
								echo "Username cannot start with 'Guest'.";
								exit();
							}
						}
						else
						{
							echo "Username must be 1-15 characters.";
							exit();
						}
					}
					
					$online = $_SESSION['online'];
					$user = $_SESSION['username'];
					if ($madeaccount) $user = $newuser;
					
					$currentTime = time();
					
					if ($uploaded) $sql = "INSERT INTO advertisement (title, date, category, type, price, text, contact, username, image, image_thumb, online) VALUES ('$title', '$currentTime', '$category', '$type', '$price', '$detail', '$email', '$user', '$actual_image_name"."."."$ext', '$actual_image_name"."_thumb."."$ext', $online)";
					else $sql = "INSERT INTO advertisement (title, date, category, type, price, text, contact, username, online) VALUES ('$title', '$currentTime', '$category', '$type', '$price', '$detail', '$email', '$user', $online)";
					
					if (mysql_query($sql))
					{
						if ($online) echo SUCCESS + "a" + "Your advertisement has been successfully created!";
						else if ($madeaccount) echo SUCCESS + "b" + "Your account and advertisement have been successfully created. An email has been sent with account verification instructions.";
						else echo SUCCESS + "c" + "Your advertisement has been successfully posted. Next time register an account to recieve messages with LiveChat!";
					}
					else
					{
						echo GENERAL_FAIL; 
						error_log(mysql_error(), 0);
					}
				} 
				else echo INVALID_EMAIL;
			} 
			else echo "Details must be between 1 and 200 characters.";
		} 
		else echo "Price must only contain numbers (0-9).";
	} 
	else echo "Title must be between 10 and 50 characters.";
} 
else echo "Please select a category.";

function generateRandomString($length)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}
?>
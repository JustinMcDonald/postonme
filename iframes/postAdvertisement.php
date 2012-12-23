<?php
include('/home/postonme/hidden_scripts/constants.php');
include('/home/postonme/hidden_scripts/session.php');

echo "<script src='//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js' type='text/javascript'></script>";

$firstload = $_GET["first"];
if ($firstload == "true") exit();

echo "<script> var form = $('#adform', window.top.document); window.top.removeFormErrors(form); </script>";

$location = $_POST['postlocation'];
$type = $_POST["adtype"];
$category = $_POST["categorytext"];
$title = $_POST["titletext"];
$price = $_POST["pricetext"];
$detail = $_POST["detailtext"];
$email = $_POST["emailtext"];
$newuser = $_POST["chatname"];
$newpass = $_POST["chatpass"];
$newpass2 = $_POST["chatpass2"];
//$reference = $_POST["postreference"];
$path = "../uploads/";
$valid_formats = array("jpg", "png", "gif", "bmp", );
$valid_price_chars = array("0","1","2","3","4","5","6","7","8","9");
$name = $_FILES["file"]["name"];
$size = $_FILES["file"]["size"];
$uploaded = false;

if(isset($_POST["categorytext"]))
{
	if((strlen($title) >= 5) and (strlen($title)<= 75) and ($title != "5-75 characters"))
	{
		$goodprice=true;
		for ($i = 0; $i < strlen($price); $i++){
			if (!(in_array($price[$i], $valid_price_chars))) $goodprice=false;
		}
		if((strlen($price) > 0) and $goodprice)
		{
			if((strlen($detail) > 0) and (strlen($detail) <= MAX_CHAR_DESCRIPTIONS) and $detail != "Write some details..")
			{
				if (filter_var($email, FILTER_VALIDATE_EMAIL) || $_SESSION['online'])
				{
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
										
										$query = "SELECT username FROM account WHERE username='".mysql_real_escape_string($newuser)."'";  
										$result = mysql_query($query);  

										if (!(mysql_num_rows($result) > 0))
										{
											$query = "SELECT email FROM account WHERE email='".mysql_real_escape_string($email)."'";  
											$result = mysql_query($query);  

											if (!(mysql_num_rows($result) > 0))
											{
												/*if ($reference != '')
												{
													$query = "SELECT username FROM account WHERE username='".mysql_real_escape_string($reference)."'";  
													$result = mysql_query($query); 
												}

												if (mysql_num_rows($result) > 0 || $reference == '')
												{*/
													$verification_code = generateRandomString(32);
													//$query = "INSERT INTO account (username, password, email, verificationcode, reference) VALUES (\"$newuser\", \"$encrypt\", \"$email\", \"$verification_code\", \"$reference\")"; 
													$query = "INSERT INTO account (username, password, email, verificationcode) VALUES ('".mysql_real_escape_string($newuser)."', '".mysql_real_escape_string($encrypt)."', '".mysql_real_escape_string($email)."', '".mysql_real_escape_string($verification_code)."')"; 

													if (mysql_query($query))
													{
														echo "<script>alert('Account successfully created! An email has been sent with account verification instructions.');</script>";
														$madeaccount = true;
														//TODO: MERGE ACCOUNTS HERE
														
														include('/home/postonme/public_html/email/emailVerification.php');
														/*
														$_SESSION['username'] = $newuser;
														$_SESSION['password'] = $encrypt;
														$_SESSION['online'] = true;
														*/
													} 
													else
													{
														echo "<script>alert('Account creation failed.');</script>";
														exit();
													}
												/*}
												else 
												{
													echo "<script>window.top.indicateError('postreference'); alert('The username you referenced does not exist.');</script>";
													exit();
												}*/
											}
											else
											{
												echo "<script>window.top.indicateError('postemail'); alert('That email is already taken.');</script>";
												exit();
											}
										}
										else
										{
											echo "<script>window.top.indicateError('postchatname'); alert('That username is already taken.');</script>";
											exit();
										}
									}
									else
									{
										echo "<script>window.top.indicateError('postchatpass2'); alert('Your passwords do not match.');</script>";
										exit();
									}
								}
								else
								{
									echo "<script>window.top.indicateError('postchatpass'); alert('Password must be 5-15 characters.');</script>";
									exit();
								}
							}
							else
							{
								echo "<script>window.top.indicateError('postchatname'); alert('Username cannot start with 'Guest'.');</script>";
								exit();
							}
						}
						else
						{
							echo "<script>window.top.indicateError('postchatname'); alert('Username must be 1-15 characters.');</script>";
							exit();
						}
					}
					
					
					if(strlen($name))
					{
						list($txt, $ext) = explode(".", $name);
						if(in_array(strtolower($ext),$valid_formats))
						{
							if($size<(1024*1024))
							{
								switch(strtolower($ext))
								{
									case 'jpg':
										$image = imagecreatefromjpeg($_FILES['file']['tmp_name']);
										break;
									case 'png':
										$image = imagecreatefrompng($_FILES['file']['tmp_name']);
										break;
									case 'bmp':
										$image = imagecreatefromwbmp($_FILES['file']['tmp_name']);
										break;
									case 'gif':
										$image = imagecreatefromgif($_FILES['file']['tmp_name']);
										break;
									default:
										echo "<script>alert('Unsupported image filetype. Try using 'jpg', 'png' or 'gif'.');</script>";
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
									echo "<script>alert('Oops! Something went wrong uploading the image..');</script>";
									exit();
								}
								
							}
							else
							{
								echo "<script>alert('Your image is too big! Please choose a smaller image.');</script>";
								exit();
							}
							
						}
						else
						{
							echo "<script>alert('Invalid image file format.');</script>";
							exit();
						}
					}
					
					$user = $_SESSION['username'];
					$online = $_SESSION['online'];
					if ($madeaccount) $user = $newuser;
					else if ($online)
					{
						$result = mysql_query("SELECT email FROM account WHERE username='".mysql_real_escape_string($user)."'");
						$account = mysql_fetch_array($result);
						$email = $account['email'];
					}
										
					$currentTime = time();
					
					$owner_code = generateRandomString(32);
					
					if ($uploaded) $sql = "INSERT INTO advertisement (title, date, category, location, type, price, text, contact, username, image, image_thumb, online, owner_code) VALUES ('$title', '$currentTime', '$category', '$location', '$type', '$price', '$detail', '$email', '$user', '$actual_image_name"."."."$ext', '$actual_image_name"."_thumb."."$ext', $online, '$owner_code')";
					else $sql = "INSERT INTO advertisement (title, date, category, location, type, price, text, contact, username, online, owner_code) VALUES ('".mysql_real_escape_string($title)."', '".mysql_real_escape_string($currentTime)."', '".mysql_real_escape_string($category)."', '".mysql_real_escape_string($location)."', '".mysql_real_escape_string($type)."', '".mysql_real_escape_string($price)."', '".mysql_real_escape_string($detail)."', '".mysql_real_escape_string($email)."', '".mysql_real_escape_string($user)."', $online, '".mysql_real_escape_string($owner_code)."')";
					
					if (mysql_query($sql))
					{
						$adid = mysql_insert_id();
						include('../email/emailAdOptions.php');
						
						if ($online || $madeaccount) echo "<script>alert('Your advertisement has been successfully posted!'); window.top.location.href = 'http://www.postonme.com/view?id=".$adid."&limit=1&fresh=1'</script>";
						else echo "<script>alert('Your Advertisement has been successfully posted. Next time register an account to recieve messages with LiveChat!'); window.top.location.href = 'http://www.postonme.com/view?id=".$adid."&limit=1&fresh=1'</script>";						
					}
					else
					{
						echo "<script>alert('Your advertisement cannot be posted at this time, please try again later.');</script>"; 
						error_log(mysql_error(), 0);
					}
				} 
				else echo "<script>window.top.indicateError('postemail'); alert('Please provide a valid email address.');</script>";
			} 
			else echo "<script>window.top.indicateError('postdetail'); alert('Details must be between 1 and 300 characters.');</script>";
		} 
		else echo "<script>window.top.indicateError('postprice'); alert('Price must only contain numbers (0-9).');</script>";
	} 
	else echo "<script>window.top.indicateError('posttitle'); alert('Title must be between 5 and 75 characters.');</script>";
}
else echo "<script>window.top.indicateError('postcategory'); alert('Please select a category.');</script>";

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

<?php
include('session.php');
include('db.php');
$path = "uploads/";

$valid_formats = array("jpg", "png", "gif", "bmp");
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {

	if ($_FILES["file"]["error"] > 0) {
		echo "Error uploading.";
		exit();
	}
	
	$name = $_FILES["file"]["name"];
	$size = $_FILES['file']['size'];
	echo $name;
	if(strlen($name)) {
	
		list($txt, $ext) = explode(".", $name);
		if(in_array($ext,$valid_formats)) {
		
			if($size<(1024*1024)) {
			
				$actual_image_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
				$tmp = $_FILES['file']['tmp_name'];
				if(move_uploaded_file($tmp, $path.$actual_image_name)) {
					
					echo "<img src='uploads/".$actual_image_name."'  class='preview'>";
						
				} else echo "failed";
				
			} else echo "Image file size max 1 MB";	
			
		} else echo "Invalid file format..";	
	}
		
	else echo "Please select image..!";
		
	exit;
} else echo "Something is wrong here";
?>
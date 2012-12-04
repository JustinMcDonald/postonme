<div class="maincontainer">
	
	<?php
	$user = $_SESSION['username'];
	
	$query = "SELECT online, exp FROM account WHERE username='$user'";
	$result = mysql_query($query);
		
	$online = false;
	$exp = 0;
	if (mysql_num_rows($result) > 0) 
	{
		$account = mysql_fetch_array($result);
		$online = $account['online'];
		$exp = $account['exp'];
	}
	
	if (!(substr($user, 0, 5) == "Guest"))
	{
		
		$count = 0;
	
		$query = "SELECT * FROM advertisement WHERE username='$user' ORDER BY date DESC";
		
		$ads = mysql_query($query);

		while($ad = mysql_fetch_array($ads)) {//search through advertisement rows
			
			$count++;
			
			/*
			//Advertisement Banner
			if ($ad['type'] == 1)
				echo "<div id='body" . $ad['adid'] . "' class='adbody buyingbg cursorhand' onClick='expand(" . $ad['adid'] . ");'>";
			else echo "<div id='body" . $ad['adid'] . "' class='adbody sellingbg cursorhand' onClick='expand(" . $ad['adid'] . ");'>";
			*/
			
			echo "<div id='adbody" . $ad['adid'] . "' class='adbody cursorhand' title='Click to Expand' onclick='expand(" . $ad['adid'] . ");' style='width:100%')>";
			
			echo "<div style='display:table-cell;vertical-align:middle;'><div class='onlinebtn themeborder'></div></div>"; 
			
			if (strlen($ad['image_thumb']) > 0 && strlen($ad['image']) > 0) echo "<div class='adimagecontainer'><img src='../uploads/" . $ad['image_thumb'] . "' alt='' onClick='var event = arguments[0] || window.event; openGallery(\"../uploads/" . $ad['image'] . "\", event);' class='themeborder'/></div>";
			else echo "<div class='adimagecontainer'><img src='../img/iconThumb.png' alt='' onClick='var event = arguments[0] || window.event; openGallery(\"../img/icon.png\", event);' class='themeborder'/></div>";
				
			echo "<div id='adcategory".$ad['adid']."' class='adcategory'>" . $ad['category'] . "</div>";
			
			/*if ($ad['type'] == 1) echo "<div class='adtitle'><span style='font-size:0.75em;font-weight:400;'>(Buying) </span>" . $ad['title'] . "</div>";
			else echo "<div class='adtitle'><span style='font-size:0.75em;font-weight:400;'>(Selling) </span>" . $ad['title'] . "</div>";*/
			
			echo "<div id='adtitle".$ad['adid']."'class='adtitle'>" . $ad['title'] . "</div>";
			
			echo "<div id='adviews".$ad['adid']."' class='adviews'>" . $ad['views'] . " views</div>";
			
			/*
			echo "<div class='infothumbs'>";
				if ($ad['type'] == 1) echo "<img src='../img/buyThumb.png' alt='' width=28px height=21px>";
				else echo "<img src='../img/saleThumb.png' alt='' width=28px height=21px>";
			echo "</div>";
			*/
			
			echo "<div id='adprice".$ad['adid']."'class='adprice'>$" . $ad['price'] . "</div>";
			
			echo "<div class='addate'>";
			
			$postdate = $ad['date'];
			$timesincepost = time() - $postdate;
			//$timetoday = time() - mktime(0, 0, 0, date('n'), date('j'), date('Y'));
			//$timetoday = time() - (time() % 86400);
			
			if ($timesincepost > 86400){
				$dayssincepost = ($timesincepost - ($timesincepost % 86400)) / 86400;
				if ($dayssincepost == 1) echo "1 day ago.";
				else echo $dayssincepost . " days ago.";
			} else {
				if ($timesincepost > 3600) echo ($timesincepost - ($timesincepost % 3600)) / 3600 . " hours ago.";
				else if ($timesincepost > 60) echo (($timesincepost - ($timesincepost % 60)) / 60) . " minutes ago.";
				else echo $timesincepost . " seconds ago.";
			}		
			echo "</div>";		
			
			echo "</div>";
			
			echo "<script>styleAdvertisementColor('adbody" . $ad['adid'] . "', " . $exp . ");</script>";
			
			//Advertisement Details, hidden by default.
			echo "<div class='addetailbody' id='detail" . $ad['adid'] . "' style='width:100%'>";
				echo "<div class='detailcontainer'>";
					echo "<div id='adtext".$ad['adid']."'class='adtext'>" . nl2br($ad['text']) . "</div>";
				echo "</div>";
				
				echo "<div>";
					echo "<input type='button' title='Bump this post to the top of searches by refreshing the post date.' value='Bump Post' class='submitbtn cursorhand themeborder themecolor' onclick='bumpPost(" . $ad['adid'] . ");'>";
					echo "<input type='button' title='Delete this post.' value='Delete Post' class='submitbtn cursorhand themeborder themecolor' onclick='deletePost(" . $ad['adid'] . ");'>";
					echo "<input type='button' id='modifybtn".$ad['adid']."' title='Enter editing mode to modify this post.' value='Modify Post' class='submitbtn cursorhand themeborder themecolor' onclick='editMode(" . $ad['adid'] . ");'>";
					echo "<input type='button' id='cancelbtn".$ad['adid']."' style='display:none' title='Close editing mode without saving changes.' value='Cancel' class='submitbtn cursorhand themeborder themecolor' onclick='exitEditMode(" . $ad['adid'] . ");'>";
					echo "<input type='button' id='savebtn".$ad['adid']."' style='display:none' title='Save your changes.' value='Save Changes' class='submitbtn cursorhand themeborder themecolor' onclick='saveChanges(" . $ad['adid'] . ");'>";
				echo "</div>";
			
			echo "</div>";
		}
		
		if ($count == 0)
		{
			echo "<div class='themetext'>You haven't <a href='../post.php' target='_top'>posted</a> anything yet!</div>";
		}
		else
		{
			echo "<div class='smallfiller'></div>";
		}
	}
	else 
	{
		echo "<div>Create an account to have all of these wonderful features!</div>";
	}
	?>

</div>
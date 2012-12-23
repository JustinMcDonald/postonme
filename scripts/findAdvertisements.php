<div id="fieldtitles">
	<div class="onlinefiller"></div>
	<div class="imagefiller"></div>
	<div class="adcategory cursorhand" id="fieldcategory" onclick="orderResults('category', 'down');" title='Order by Category'>Category<?php if ($orderfield == 'category') echo "<img src='../img/order_".$direction.".png' alt='' width='10px' height='10px' id='selectcategorydown'>"; ?></div>
	<div class="adtitle cursorhand" id="fieldtitle" onclick="orderResults('title', 'down');" title='Order by Title'>Title<?php if ($orderfield == 'title') echo "<img src='../img/order_".$direction.".png' alt='' width='10px' height='10px' id='selectcategorydown'>"; ?></div>
	<div class="adviews cursorhand" id="fieldviews" onclick="orderResults('views', 'down');" title='Order by Views'>Views<?php if ($orderfield == 'views') echo "<img src='../img/order_".$direction.".png' alt='' width='10px' height='10px' id='selectcategorydown'>"; ?></div>
	<div class="adprice cursorhand" id="fieldprice" onclick="orderResults('price', 'down');" title='Order by Price'>Price<?php if ($orderfield == 'price') echo "<img src='../img/order_".$direction.".png' alt='' width='10px' height='10px' id='selectcategorydown'>"; ?></div>
	<div class="addate cursorhand" id="fielddate" onclick="orderResults('date', 'down');" title='Order by Date'>Post Date<?php if ($orderfield == 'date') echo "<img src='../img/order_".$direction.".png' alt='' width='10px' height='10px' id='selectcategorydown'>"; ?></div>
</div>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=361597738233";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<?php

//ONLINE MARKER
$searchonline = $_GET['online'];
$onlineonly = false;
if ($searchonline == 1) $onlineonly = true;

//LIMIT MARKER
$highlimit = $_GET['limit'];
$lowlimit = $highlimit - 40;

$count = 0;
if ($ads) 
{
	$numresults = mysql_num_rows($ads);
	
	if ($numresults > 0) mysql_data_seek($ads, 0);
	
	for($i = 0; $i < $lowlimit; $i++)
	{
		$sink = mysql_fetch_array($ads);
	}

	for($i = $lowlimit; $i < $highlimit; $i++)
	{
		if ($ad = mysql_fetch_array($ads))
		{	
			$user = $ad['username'];			
			$query = "SELECT online, exp FROM account WHERE username='".mysql_real_escape_string($user)."'";
			$result = mysql_query($query);
			
			$online = false;
			$exp = 0;
			if (mysql_num_rows($result) > 0) 
			{
				$account = mysql_fetch_array($result);
				$online = $account['online'];
				$exp = $account['exp'];
			}
				
			if (!$onlineonly || $online)
			{
				$count++;
				
				echo "<div id='adbody" . $ad['adid'] . "' class='adbody cursorhand' title='Click to Expand' onclick='expand(" . $ad['adid'] . ");'>";
				
				if ($online) echo "<div class='adstatuscontainer'><img src='../img/online_status.png' alt='' width='16px' height='16px' title='Online'/></div>"; 
				else echo "<div class='adstatuscontainer'><img src='../img/offline_status.png' alt='' width='16px' height='16px' title='Offline'/></div>";
				
				if (strlen($ad['image_thumb']) > 0 && strlen($ad['image']) > 0)
				{
					echo "<div class='adimagecontainer'><img src='../uploads/" . $ad['image_thumb'] . "' alt='' title='Expand Image' onClick='var event = arguments[0] || window.event; openGallery(\"../uploads/" . $ad['image'] . "\", event);' class='themeborder'/></div>";
				}
				else
				{
					echo "<div class='adimagecontainer'><img src='../img/iconThumb.png' alt='' title='Expand Image' onClick='var event = arguments[0] || window.event; openGallery(\"../img/icon.png\", event);' class='themeborder'/></div>";
				}
				
				echo "<div class='adcategory'>" . $ad['category'] . "</div>";
				if ($ad['type'] == 1) echo "<div class='adtitle'><span style='font-size:0.75em;font-weight:400;'>(Buying) </span>" . $ad['title'] . "</div>";
				else echo "<div class='adtitle'><span style='font-size:0.75em;font-weight:400;'>(Selling) </span>" . $ad['title'] . "</div>";
				
				echo "<div class='adviews'>" . $ad['views'] . " views</div>";
				
				echo "<div class='adprice'>$" . $ad['price'] . "</div>";
				
				echo "<div class='addate'>";
				
				$postdate = $ad['date'];
				$timesincepost = time() - $postdate;
				
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
				if ($singlead) echo "<div class='addetailbody' id='detail" . $ad['adid'] . "' style='display:block;'>";
				else echo "<div class='addetailbody' id='detail" . $ad['adid'] . "'>";
					echo "<div class='detailcontainer'>";
						echo "<div class='adtext'>" . nl2br($ad['text']) . "</div>";
						if ($_SESSION['username'] != $ad['username'])
						{
							if ($online) 
							{
								echo "<div class='detailonlinemessage'>This person is online! </div>";
								echo "<div id='chat" . $ad['adid'] . "' class='contactbutton themecolor cursorhand themeborder' title='Start a conversation with this person with LiveChat.' onClick='window.top.createConversation(" . $ad['adid'] . ", true); return true;'>Message this Person</div>";
							}
							else 
							{
								echo "<div id='chat" . $ad['adid'] . "' class='contactbutton themecolor cursorhand themeborder' title='Start a conversation with this person with LiveChat.' onClick='window.top.createConversation(" . $ad['adid'] . ", false); return true;'>Message this Person</div>";
							}
						}
						echo "<div class='contactbutton themecolor cursorhand themeborder' title='Email this person' onclick='window.top.showEmailAlert(" . $ad['adid'] . ");'>Email this Person</div>";
						echo "<fb:like id='fbRecommend' href='http://www.postonme.com/view.php?id=".$ad['adid']."&amp;limit=1' send='true' width='350' show_faces='false' font='verdana' action='recommend' style='float:left;'></fb:like>";
						if ($_GET['fresh'] != "")
						{
							echo "<div id='fbRecommendFresh'>Many of your friends will be interested in your post, let them know!<div class='arrow-down'></div><img src='./img/closebtn.png' width='12px' height='12px'/></div>";
							echo "<script>var offset = $('#fbRecommend').offset(); $('#fbRecommendFresh').css('left', offset.left - 200).css('top', offset.top - 60); $('#fbRecommendFresh > img').bind('click', function(){ $('#fbRecommendFresh').hide(); }); setTimeout(function(){ $('#fbRecommendFresh').animate({ opacity:1, left:'+=10'}, 750)}, 1000);</script>";
						}
						echo "<div class='adflag cursorhand' onclick='flagAdvertisement(" . $ad['adid'] . ");'>Flag Ad</div>";
					echo "</div>";
				
				echo "</div>";
			}
		}
		else break;
	}

	if ($highlimit > 40)
	{
		echo "<input type='button' class='themecolor themeborder submitbtn cursorhand' value='Previous Results' onclick='previousLimit(".$highlimit."); return true;'/>";
	}

	if ($numresults > $highlimit)
	{
		echo "<input type='button' class='themecolor themeborder submitbtn cursorhand' value='See More Results' onclick='nextLimit(".$highlimit."); return true;'/>";
	}
}

if ($count == 0)
{
	echo "<div class='themetext'>No results found, please use another search term.</div>";
} else echo "<div class='filler'></div>";
?>

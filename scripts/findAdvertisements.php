<div id="fieldtitles">
	<div class="onlinefiller"></div>
	<div class="imagefiller"></div>
	<div class="adcategory cursorhand" id="fieldcategory" onclick="orderResults('category', 'down');" title='Order by Category'><img src="../img/order_up.png" alt="" width="10px" height="10px" id="selectcategoryup">Category<img src="../img/order_down.png" alt="" width="10px" height="10px" id="selectcategorydown"></div>
	<div class="adtitle cursorhand" id="fieldtitle" onclick="orderResults('title', 'down');" title='Order by Title'><img src="../img/order_up.png" alt="" width="10px" height="10px" id="selecttitleup">Title<img src="../img/order_down.png" alt="" width="10px" height="10px" id="selecttitledown"></div>
	<div class="adviews cursorhand" id="fieldviews" onclick="orderResults('views', 'down');" title='Order by Views'><img src="../img/order_up.png" alt="" width="10px" height="10px" id="selectviewsup">Views<img src="../img/order_down.png" alt="" width="10px" height="10px" id="selectviewsdown"></div>
	<div class="adprice cursorhand" id="fieldprice" onclick="orderResults('price', 'down');" title='Order by Price'><img src="../img/order_up.png" alt="" width="10px" height="10px" id="selectpriceup">Price<img src="../img/order_down.png" alt="" width="10px" height="10px" id="selectpricedown"></div>
	<div class="addate cursorhand" id="fielddate" onclick="orderResults('date', 'down');" title='Order by Date'><img src="../img/order_up.png" alt="" width="10px" height="10px" id="selectdateup">Post Date<img src="../img/order_down.png" alt="" width="10px" height="10px" id="selectdatedown"></div>
</div>

<?php
$searchkey = strtolower($_GET['search']);
$searchorder = $_GET['order'];
$searchtype = $_GET['type'];
$searchprice = $_GET['price'];
$searchdate = $_GET['date'];
$searchcategory = $_GET['category'];
$searchlocation = $_GET['location'];
$searchimages = $_GET['images'];

$query = assembleQuery($searchkey, $searchtype, $searchprice, $searchdate, $searchcategory, $searchlocation, $searchimages, $searchorder);

//ONLINE MARKER
$searchonline = $_GET['online'];
$onlineonly = false;
if ($searchonline == 1) $onlineonly = true;

//LIMIT MARKER
$highlimit = $_GET['limit'];
$lowlimit = $highlimit - 40;

$ads = mysql_query($query);

$numresults = mysql_num_rows($ads);

$count = 0;

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
			
			if (strlen($ad['image_thumb']) > 0 && strlen($ad['image']) > 0) echo "<div class='adimagecontainer'><img src='../uploads/" . $ad['image_thumb'] . "' alt='' title='Expand Image' onClick='var event = arguments[0] || window.event; openGallery(\"../uploads/" . $ad['image'] . "\", event);' class='themeborder'/></div>";
			else echo "<div class='adimagecontainer'><img src='../img/iconThumb.png' alt='' title='Expand Image' onClick='var event = arguments[0] || window.event; openGallery(\"../img/icon.png\", event);' class='themeborder'/></div>";
			
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
			echo "<div class='addetailbody' id='detail" . $ad['adid'] . "'>";
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
						echo "<div class='contactbutton themecolor cursorhand themeborder' title='Email this person' onclick='window.top.showEmailAlert(" . $ad['adid'] . ");'>Email this Person</div>";
						echo "<div class='adflag cursorhand' onclick='flagAdvertisement(" . $ad['adid'] . ");'>Flag this Advertisement</div>";
					}
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

if ($count == 0)
{
	echo "<div class='themetext'>No results found, please use another search term.</div>";
} else echo "<div class='filler'></div>";
?>

<?php
function assembleQuery($search='',$type='',$price='0-10000',$date='',$category='',$location='',$images='0',$order='date')
{
	$query = "SELECT * FROM advertisement WHERE";

	/*SEARCH TERMS*/
	$terms = explode(" ", $search);
	$query .= " (";
	for ($i = 0; $i < count($terms); $i++)
	{
		if ($i > 0) $query .= " OR";
		$query .= " title LIKE '%" . mysql_real_escape_string($terms[$i]) . "%' OR text LIKE '%" . mysql_real_escape_string($terms[$i]) . "%'";
		if (substr($terms[$i], -1) == 's' and strlen($terms[$i]) > 3) $query .= " OR title LIKE '%" . mysql_real_escape_string(substr($terms[$i], 0, -1)) . "%' OR text LIKE '%" . mysql_real_escape_string(substr($terms[$i], 0, -1)) . "%'";
	}
	$query .= ") ";

	/*TYPE*/
	if ($type == 1) $query = $query . " AND type='0' ";
	else if ($type == 2) $query = $query . " AND type='1' ";

	/*PRICE*/
	$maxmin = explode("-", $price);
	if ($maxmin[0] != "") $query = $query . " AND price>=" . $maxmin[0];
	if ($maxmin[1] != "") $query = $query . " AND price<=" . $maxmin[1];

	/*DATE*/
	$currentTime = time();
	$dayago = $currentTime - 86400;
	$yesterday = $currentTime - 259200;
	$weekago = $currentTime - 604800;
	$monthago = $currentTime - 2592000;
	if ($date == '0') $query .= " AND date > $dayago";
	else if ($date == '1') $query .= " AND date > $yesterday";
	else if ($date == '2') $query .= " AND date > $weekago";
	else if ($date == '3') $query .= " AND date > $monthago";
	else if ($date == '4') $query .= " AND date > 0";
		
	/*CATEGORY*/
	$categories = explode("-", $category);
	if (count($categories) > 1) {
		$query = $query . " AND (";
		for ($i = 0; $i < count($categories) - 1; $i++) {
			$query = $query . "category='" . mysql_real_escape_string($categories[$i]) . "'";
			if ($i != count($categories) - 2) $query = $query . " OR ";
		}
		$query = $query . ")";
	}
		
	/*LOCATION*/
	$query .= " AND location='".mysql_real_escape_string($location)."'";

	/*IMAGES*/
	if ($images == 1) $query .= " AND image!=''";

	/*ORDER*/
	if (substr($order, 0, 1) == "1")
	{
		$direction = "DESC";
		$order = substr($order, 1);
	}
	else $direction = "ASC";
	if ($order == "date" && $direction == "ASC") $query .= " ORDER BY ".$order." DESC";
	else if ($order == "date" && $direction == "DESC") $query .= " ORDER BY ".$order." ASC";
	else $query .= " ORDER BY ".$order." ".$direction;	

	return $query;
}
?>

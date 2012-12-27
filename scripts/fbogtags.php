<?php
$searchadid = $_GET['id'];
$searchadid = $_GET['id'];
$searchkey = strtolower($_GET['search']);
$searchorder = $_GET['order'];
$searchtype = $_GET['type'];
$searchprice = $_GET['price'];
$searchdate = $_GET['date'];
$searchcategory = $_GET['category'];
$searchlocation = $_GET['location'];
$searchimages = $_GET['images'];

if (substr($searchorder, 0, 1) == '1')
{
	$direction = 'up';
	$orderfield = substr($searchorder, 1);
}
else
{
	$direction = 'down';
	$orderfield = $searchorder;
}

$singlead = false;

if ($searchadid != '')
{
	$query = "SELECT * FROM advertisement WHERE adid=".mysql_real_escape_string($searchadid);
	$singlead = true;
}
else $query = assembleQuery($searchkey, $searchtype, $searchprice, $searchdate, $searchcategory, $searchlocation, $searchimages, $searchorder);

$ads = mysql_query($query);

if ($ads && $singlead)
{
	$ad = mysql_fetch_array($ads);
	if ($ad['type'] == 1) echo "<meta property=\"og:title\" content=\"PostOnMe Classifieds: (Buying) ".$ad['title']."\" />";
	else echo "<meta property=\"og:title\" content=\"PostOnMe Classifieds: (Selling) ".$ad['title']."\" />";
	echo "<meta property=\"og:type\" content=\"product\" />";
	echo "<meta property=\"og:url\" content=\"http://www.postonme.com/view.php?id=".$ad['adid']."&amp;limit=1\" />";
	if (strlen($ad['image_thumb']) > 0 && strlen($ad['image']) > 0) echo "<meta property=\"og:image\" content=\"http://www.postonme.com/uploads/".$ad['image']."\" />";
	else echo "<meta property=\"og:image\" content=\"http://www.postonme.com/img/icon.png\" />";
	echo "<meta property=\"og:site_name\" content=\"Postonme\" />";
	echo "<meta property=\"fb:admins\" content=\"525435407\" />";
}

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

	//AD MUST BE VISIBLE
	$query .= " AND visible=1";
	
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
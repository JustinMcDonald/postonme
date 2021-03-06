<?php
include('/home/postonme/hidden_scripts/definitions.php');
include('/home/postonme/hidden_scripts/session.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" xml:lang="en-US" lang="en-US" xmlns:og="http://ogp.me/ns#">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<title>PostOnMe | University Campus Classifieds</title>
	
	<meta name="description" content="Campus Classifieds"/>
	<meta name="keywords" content="Classifieds, Campus, Buy, Sell, Trade, Post, Advertisement, Chat, University, Textbooks, buy textbooks,uwo textbooks, uwo used textbooks, used textbooks western, buy used textbooks western, sell used textbooks, sell textbooks, buy textbooks, sell my stuff, sell online, Used,College,Books,Furniture,Electronics,Bikes,Listing"/>
	<meta name="author" content="Justin McDonald"/>
    <meta name="robots" content="index,follow" />
    <meta name="robots" content="Index, all">
    <meta name="audience" content="all">
	
	<link rel="image_src" href="http://www.postonme.com/img/icon.png" />

	<?php include("./common/headers.php"); ?>
	
	<script type="text/javascript" src="/js/index.js"></script>
	
</head>
<body onload="initChat(); return false;">

<div xmlns:og="http://ogp.me/ns#" style="display:none;"> 
<![CDATA[ <!--OpenGraph section--> 
	<meta property="og:title" content="PostOnMe - Campus Classifieds"/> 
	<meta property="og:type" content="university"/> 
	<meta property="og:image" content="http://www.postonme.com/img/icon.png"/> 
	<meta property="og:url" content="www.postonme.com"/> 
	<meta property="og:site_name" content="Campus Classifieds"/>
	<meta property="og:description" content="The fastest, smoothest and cleanest campus classifieds on the internet."/>
	<meta property="fb:admins" content="justin.g.mcdonald"/>
	<meta property="fb:app_id" content="406180249454738"/>
]]>
</div> 

<div id="fb-root"></div>
<script type="text/javascript">(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=451061051608923";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<h1 style="position:fixed; left:-900px;">PostonMe Campus Classifieds</h1>
<h2 style="position:fixed; left:-900px;">Providing personal ad space for Students by Students!</h2>
<h2 style="position:fixed; left:-900px;">Post buy or sell textbooks, books, instruments, computers, tickets, and more.</h2>
<h2 style="position:fixed; left:-900px;">Creating new opportunities to exchage &amp; to chat directly with buyers or sellers.</h2>
<h3 style="position:fixed; left:-900px;">Post an advertisement for everyone to see.</h3>
<h3 style="position:fixed; left:-900px;">Adveritse your used goods faster and more conveniently.</h3> 
<h3 style="position:fixed; left:-900px;">Look at what other poeple are offering!</h3>
<h4 style="position:fixed; left:-900px;">Acquire or barter textbooks, Collectibles, merchandise, and much more.</h4>
<h4 style="position:fixed; left:-900px;">Join the growing community today!</h4> 

<table id="frontpage">
	<tr>
		<td id='frontfill1'><div></div></td>
		<td id='frontedit' class='cursorhand' style='display: <?php if (!isset($_SESSION['online'])) echo 'none'; else if ($_SESSION['online'] == 1) echo 'table-cell'; else echo 'none'; ?> '>
			<div style='height:210px;'></div>
			<img src='img/edit_icon.png' alt='' width='100px' height='100px'/>
			<img src='img/edit_title.png' alt='' width='103px' height='35px' style='display:inline-block;padding-bottom:35px;'/>
			<div style='height:80px;'></div>
			<img src='img/edit_description.png' alt='' width='200px' height='50px'/>
		</td>
		<td id='frontsignup' class='cursorhand'style='display: <?php if (!isset($_SESSION['online'])) echo 'table-cell'; else if ($_SESSION['online'] == 1) echo 'none'; else echo 'table-cell'; ?> '>
			<div style='height:210px;'></div>
			<img src='img/signup_icon.png' alt='' width='100px' height='100px'/>
			<img src='img/signup_title.png' alt='' width='103px' height='35px' style='display:inline-block;padding-bottom:35px;'/>
			<div style='height:80px;'></div>
			<img src='img/signup_description.png' alt='' width='200px' height='50px'/>
		</td>
		<td id='frontsearch' class='cursorhand'>
			<div style='height:210px;'></div>
			<img src='img/search_icon.png' alt='' width='100px' height='100px'/>
			<img src='img/search_title.png' alt='' width='103px' height='35px' style='display:inline-block;padding-bottom:35px;'/>
			<div style='height:10px;'></div>
			<form action="" method="post" id="searchform" onsubmit="openWindow('searchbar'); return false;">
				<div><input type="text" name="searchtext" value='' id="searchbar"/></div>
			</form>
			<div style='height:34px;'></div>
			<img src='img/search_description.png' alt='' width='200px' height='50px'/>
		</td>
		<td id='frontpost' class='cursorhand'>
			<div style='height:210px;'></div>
			<img src='img/post_icon.png' alt='' width='100px' height='100px'/>
			<img src='img/post_title.png' alt='' width='103px' height='35px' style='display:inline-block;padding-bottom:35px;'/>
			<div style='height:80px;'></div>
			<img src='img/post_description.png' alt='' width='200px' height='50px'/>
		</td>
		<td id='frontfill2'><div></div></td>
	</tr>
</table>

<?php
	include('common/nav_filler.php');
	include("common/browse_categories.php");
?>

<div id='frontbanner'><img src='img/front_banner.png' width='786px' height='400px' alt=''/></div>

<?php 
include("common/newsbox.php");
include("common/chatbox.php");
include("common/accountpanels.php");
include("common/navbar.php");
include("common/footer.php");
include("common/screenlock.php");
include("scripts/checkIfOnline.php");
?>

</body>
</html>
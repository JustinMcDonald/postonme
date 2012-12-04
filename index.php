<?php
include('/home/postonme/hidden_scripts/definitions.php');
include('/home/postonme/hidden_scripts/session.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" xml:lang="en-US" lang="en-US" xmlns:og="http://ogp.me/ns#">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="description" content="Campus Classifieds"/>
	<meta name="keywords" content="Classifieds,Campus,Buy,Sell,Trade,Post,Advertisement,Chat"/>
	<meta name="author" content="Justin McDonald"/>
	
	<title>Post On Me! - Campus Classifieds</title>
	
	<meta property="og:title" content="PostOnMe - Campus Classifieds"/> 
	<meta property="og:type" content="university"/> 
	<meta property="og:image" content="http://www.postonme.com/img/icon.png"/> 
	<meta property="og:url" content="www.postonme.com"/> 
	<meta property="og:site_name" content="Campus Classifieds"/>
	<meta property="og:description" content="The fastest, smoothest and cleanest campus classifieds on the internet."/>
	<meta property="fb:admins" content="justin.g.mcdonald"/>
	<!--<meta property="fb:app_id" content="406180249454738"/>-->
	
	<link rel="image_src" href="http://www.postonme.com/img/icon.png" />
	
	<link rel="shortcut icon" href="img/logoicon.ico"/>
	
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<link rel="stylesheet" type="text/css" href="css/nav.css"/>
	<link rel="stylesheet" type="text/css" href="css/footer.css"/>
	<link rel="stylesheet" type="text/css" href="css/chat.css"/>
	<link rel="stylesheet" type="text/css" href="css/newsbox.css"/>
	<link rel="stylesheet" type="text/css" href="css/customalert.css"/>

	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script type="text/javascript" src="/js/functions.js"></script>
	<script type="text/javascript" src="/js/chat.js"></script>
	<script type="text/javascript" src="/js/exp.js"></script>
	<script type="text/javascript" src="/js/news.js"></script>
	<script type="text/javascript" src="/js/navbar.js"></script>
	<script type="text/javascript" src="/js/index.js"></script>
	<script type="text/javascript" src="/js/customalert.js"></script>
	<!--[if IE]>
		<script type="text/javascript" src="/js/DD_roundies.js"></script>
	<![endif]-->
	
</head>
<body onload="initChat(); return false;">

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=361597738233";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<table id="frontpage">
	<tr>
		<td id='frontfill1'><div></div></td>
		<td id='frontrelax' class='cursorhand'>
			<div style='height:20%;'></div>
			<img src='img/relax_icon.png' alt='' width='126px' height='127px'/>
			<div style='height:10%;'></div>
			<img src='img/relax_title.png' alt='' width='103px' height='29px'/>
			<div style='height:1%;'></div>
			<div style='height:30px'></div>
			<div style='height:8%;'></div>
			<img src='img/relax_description.png' alt='' width='236px' height='59px'/>
			<div style='height:20%;'></div>
		</td>
		<td id='frontsearch' class='cursorhand'>
			<div style='height:20%;'></div>
			<img src='img/search_icon.png' alt='' width='126px' height='127px'/>
			<div style='height:10%;'></div>
			<img src='img/search_title.png' alt='' width='103px' height='29px'/>
			<div style='height:1%;'></div>
			<form action="" method="post" id="searchform" onsubmit="openWindow('searchbar'); return false;">
				<input type="text" name="searchtext" value='' id="searchbar">
			</form>
			<div style='height:7%;'></div>
			<img src='img/search_description.png' alt='' width='236px' height='59px'/>
			<div style='height:20%;'></div>
		</td>
		<td id='frontpost' class='cursorhand'>
			<div style='height:20%;'></div>
			<img src='img/post_icon.png' alt='' width='126px' height='127px'/>
			<div style='height:10%;'></div>
			<img src='img/post_title.png' alt='' width='103px' height='29px'/>
			<div style='height:1%;'></div>
			<div style='height:30px'></div>
			<div style='height:8%;'></div>
			<img src='img/post_description.png' alt='' width='236px' height='59px'/>
			<div style='height:20%;'></div>
		</td>
		<td id='frontedit' class='cursorhand'>
			<div style='height:20%;'></div>
			<img src='img/edit_icon.png' alt='' width='126px' height='127px'/>
			<div style='height:10%;'></div>
			<img src='img/edit_title.png' alt='' width='103px' height='29px'/>
			<div style='height:1%;'></div>
			<div style='height:30px'></div>
			<div style='height:8%;'></div>
			<img src='img/edit_description.png' alt='' width='236px' height='59px'/>
			<div style='height:20%;'></div>
		</td>
		<td id='frontfill2'><div></div></td>
	</tr>
</table>

<?php 
include("common/newsbox.php");
//echo "<script>var color = $('#frontfill2').css('background-color'); $('#newsbox').css('background-color', color);</script>";
include("common/chatbox.php");
include("common/signupbox.php");
include("common/navbar.php");
include("common/footer.php");
include("common/screenlock.php");
include("scripts/checkIfOnline.php");
?>

</body>
</html>
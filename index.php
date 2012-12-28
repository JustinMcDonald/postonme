<?php
include('/home/postonme/hidden_scripts/definitions.php');
include('/home/postonme/hidden_scripts/session.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" xml:lang="en-US" lang="en-US" xmlns:og="http://ogp.me/ns#">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="description" content="Campus Classifieds"/>
	<meta name="keywords" content="Classifieds,Campus,Buy,Sell,Trade,Post,Advertisement,Chat,University,Textbooks,Used"/>
	<meta name="author" content="Justin McDonald"/>
	
	<title>Post On Me! - University Campus Classifieds</title>
	
	<meta property="og:title" content="PostOnMe - Campus Classifieds"/> 
	<meta property="og:type" content="university"/> 
	<meta property="og:image" content="http://www.postonme.com/img/icon.png"/> 
	<meta property="og:url" content="www.postonme.com"/> 
	<meta property="og:site_name" content="Campus Classifieds"/>
	<meta property="og:description" content="The fastest, smoothest and cleanest campus classifieds on the internet."/>
	<meta property="fb:admins" content="justin.g.mcdonald"/>
	<!--<meta property="fb:app_id" content="406180249454738"/>-->
	
	<link rel="image_src" href="http://www.postonme.com/img/icon.png" />
	
<<<<<<< HEAD
	<link rel="shortcut icon" href="img/logoicon.ico"/>
	
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<link rel="stylesheet" type="text/css" href="css/nav.css"/>
	<link rel="stylesheet" type="text/css" href="css/footer.css"/>
	<link rel="stylesheet" type="text/css" href="css/chat.css"/>
	<link rel="stylesheet" type="text/css" href="css/newsbox.css"/>
	<link rel="stylesheet" type="text/css" href="css/customalert.css"/>
	<link rel="stylesheet" type="text/css" href="css/accountops.css"/>
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script type="text/javascript" src="/js/functions.js"></script>
	<script type="text/javascript" src="/js/chat.js"></script>
	<script type="text/javascript" src="/js/exp.js"></script>
	<script type="text/javascript" src="/js/news.js"></script>
	<script type="text/javascript" src="/js/navbar.js"></script>
=======
	<?php include("./common/headers.php"); ?>
>>>>>>> a0fc9387c0afca5028d99289971c45b91bd0f326
	<script type="text/javascript" src="/js/index.js"></script>
	
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

<h1 style="position:fixed; left:-900px;">Post on Me! - Campus Classifieds</h1>
<h2 style="position:fixed; left:-900px;">Creating new opportunities to exchage & to chat directly with buyers or sellers.</h2>
<h3 style="position:fixed; left:-900px;">Post an advertisement for everyone to see.</h3>
<h3 style="position:fixed; left:-900px;">Adveritse your used goods faster and more conveniently.</h3> 
<h3 style="position:fixed; left:-900px;">Look at what other poeple are offering!</h3>
<h4 style="position:fixed; left:-900px;">Acquire or barter textbooks, Collectibles, merchandise, and much more.</h4>
<h4 style="position:fixed; left:-900px;">Join the growing community today!</h4> 

<table id="frontpage">
	<tr>
		<td id='frontfill1'><div></div></td>
		<td id='frontedit' class='cursorhand' style='display: <?php if (!isset($_SESSION['online'])) echo 'none'; else if ($_SESSION['online'] == 1) echo 'table-cell'; else echo 'none'; ?> '>
			<div style='height:280px;'></div>
			<img src='img/edit_icon.png' alt='' width='100px' height='100px'/>
			<img src='img/edit_title.png' alt='' width='103px' height='35px' style='display:inline-block;padding-bottom:35px;'/>
			<div style='height:80px;'></div>
			<img src='img/edit_description.png' alt='' width='200px' height='50px'/>
		</td>
		<td id='frontsignup' class='cursorhand'style='display: <?php if (!isset($_SESSION['online'])) echo 'table-cell'; else if ($_SESSION['online'] == 1) echo 'none'; else echo 'table-cell'; ?> '>
			<div style='height:280px;'></div>
			<img src='img/signup_icon.png' alt='' width='100px' height='100px'/>
			<img src='img/signup_title.png' alt='' width='103px' height='35px' style='display:inline-block;padding-bottom:35px;'/>
			<div style='height:80px;'></div>
			<img src='img/signup_description.png' alt='' width='200px' height='50px'/>
		</td>
		<td id='frontsearch' class='cursorhand'>
			<div style='height:280px;'></div>
			<img src='img/search_icon.png' alt='' width='100px' height='100px'/>
			<img src='img/search_title.png' alt='' width='103px' height='35px' style='display:inline-block;padding-bottom:35px;'/>
			<div style='height:10px;'></div>
			<form action="" method="post" id="searchform" onsubmit="openWindow('searchbar'); return false;">
				<input type="text" name="searchtext" value='' id="searchbar">
			</form>
			<div style='height:34px;'></div>
			<img src='img/search_description.png' alt='' width='200px' height='50px'/>
		</td>
		<td id='frontpost' class='cursorhand'>
			<div style='height:280px;'></div>
			<img src='img/post_icon.png' alt='' width='100px' height='100px'/>
			<img src='img/post_title.png' alt='' width='103px' height='35px' style='display:inline-block;padding-bottom:35px;'/>
			<div style='height:80px;'></div>
			<img src='img/post_description.png' alt='' width='200px' height='50px'/>
		</td>
		<td id='frontfill2'><div></div></td>
	</tr>
</table>

<img src='img/front_banner.png' alt='' width='786px' height='400px' id='frontbanner'/>

<?php 
include("common/newsbox.php");
include("common/chatbox.php");
include("common/accountpanels.php");
include("common/browse_categories.php");
include("common/navbar.php");
include("common/footer.php");
include("common/screenlock.php");
include("scripts/checkIfOnline.php");
?>

</body>
</html>
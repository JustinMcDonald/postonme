<?php
include('/home/postonme/hidden_scripts/definitions.php');
include('/home/postonme/hidden_scripts/session.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML Strict//EN"><META http-equiv="Content-Type" content="text/html; charset=utf-8">

<html xmlns="http://www.w3.org/1999/xhtml" slick-uniqueid="1">
<head>
	<title>Post On Me! - Campus Classifieds</title>
	
	<link rel="shortcut icon" href="/img/logoicon.ico" >
	
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<link rel="stylesheet" type="text/css" href="css/nav.css"/>
	<link rel="stylesheet" type="text/css" href="css/footer.css"/>
	<link rel="stylesheet" type="text/css" href="css/chat.css"/>
	<link rel="stylesheet" type="text/css" href="css/newsbox.css"/>
	<link rel="stylesheet" type="text/css" href="css/customalert.css"/>
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="/js/functions.js"></script>
	<script src="/js/chat.js"></script>
	<script type="text/javascript" src="/js/exp.js"></script>
	<script src="/js/news.js"></script>
	<script src="/js/navbar.js"></script>
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

<div class="contentcontainer">
	<h2>Contact Us</h2>
	<p>Feel free to contact us at the appropriate address below. We will try our best to get back to you within 24 hours.</p>
	<h3>Having trouble with the website? Email us at <a href="mailto:support@postonme.com">support@postonme.com</a></h3>
	<h3>For all general inquiries, email us at <a href="mailto:info@postonme.com">info@postonme.com</a></h3>
	<h3>For business related inquiries, email us at <a href="mailto:business@postonme.com">business@postonme.com</a></h3>
	<!--<h3>For all press inquiries, email us at <a href="mailto:press@postonme.com">press@postonme.com</a></h3>-->
</div>

<?php
include("common/newsbox.php");
include("common/chatbox.php");
include("common/signupbox.php");
include("common/navbar.php");
include("common/footer.php");
include("common/screenlock.php");
include("scripts/checkIfOnline.php");
?>

</body>
</html>
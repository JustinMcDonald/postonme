<?php
include('/home/postonme/hidden_scripts/definitions.php');
include('/home/postonme/hidden_scripts/session.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" xml:lang="en-US" lang="en-US" xmlns:og="http://ogp.me/ns#">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<title>PostOnMe | University Campus Classifieds</title>
	
	<?php include("./common/headers.php"); ?>
	
</head>
<body onload="initChat(); return false;">

<div id="fb-root"></div>
<script type='text/javascript'>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&amp;appId=451061051608923";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<?php include('common/nav_filler.php'); ?>

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
include("common/accountpanels.php");
include("common/navbar.php");
include("common/footer.php");
include("common/screenlock.php");
include("scripts/checkIfOnline.php");
?>

</body>
</html>
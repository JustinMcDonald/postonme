<?php
include('/home/postonme/hidden_scripts/definitions.php');
include('/home/postonme/hidden_scripts/session.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML Strict//EN"><META http-equiv="Content-Type" content="text/html; charset=utf-8">

<html xmlns="http://www.w3.org/1999/xhtml" slick-uniqueid="1 xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>

	<?php include("./common/headers.php"); ?>
	
</head>
<body onload="initChat(); return false;">

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=451061051608923";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<?php include('common/nav_filler.php'); ?>

<div class="contentcontainer">
	<h2>About Us</h2>
	<h3>Our Mission:</h3>
	<h3><i><b>To provide an efficient trading platform for students.</b></i></h3>
	</br>
	<p>PostOnMe allows users to post classified advertisements for a variety of items, from appliances to text-books.  
	Advertisements can be viewed and posted by the public but are targeted towards the community of Western University. 
	Advertisements will be displayed for 30 days before expiration. 
	Users may edit, renew, and remove their advertisements at anytime.</p>
	<p>This site is 100% student-funded and all of its content is user-generated. 
	We aim to offer the most comprehensive services possible and strive to change and grow with the needs of our users. 
	We encourage users to provide feedback on their experiences.</p>
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
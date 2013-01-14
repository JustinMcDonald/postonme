<?php
include('/home/postonme/hidden_scripts/definitions.php');
include('/home/postonme/hidden_scripts/session.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" xml:lang="en-US" lang="en-US" xmlns:og="http://ogp.me/ns#">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<title>About Us | University Campus Classifieds</title>

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
	<h2>About Us</h2>
	<h3>Our Mission:</h3>
	<h3><i><b>To provide an efficient trading platform for students.</b></i></h3>
	<div><br/></div>
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
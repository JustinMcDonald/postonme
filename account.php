<?php
include('/home/postonme/hidden_scripts/definitions.php');
include('/home/postonme/hidden_scripts/session.php');
?>

<!--<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML Strict//EN"><META http-equiv="Content-Type" content="text/html; charset=utf-8">-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<!--<html xmlns="http://www.w3.org/1999/xhtml" slick-uniqueid="1" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml">-->
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" xml:lang="en-US" lang="en-US" xmlns:og="http://ogp.me/ns#">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<title>Account | University Campus Classifieds</title>
	
	<?php include("./common/headers.php"); ?>
	
	<link rel="stylesheet" type="text/css" href="css/view.css"/>
	<link rel="stylesheet" type="text/css" href="css/advertisement.css"/>

	<script type="text/javascript" src="/js/gallery.js"></script>
	<script type="text/javascript" src="/js/account.js"></script>
	
</head>
<body onload="initChat(); return false;">

<div id="fb-root"></div>
<script type="text/javascript">(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&amp;appId=451061051608923";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<?php include('common/nav_filler.php'); ?>

<div class='contentcontainer' style='width:62%;padding-left:10px;padding-right:10px;'>
	<h2 style="margin-bottom: 20px;">Review, Modify, Delete or Bump your Advertisements!</h2>
	<div id='accountAdvertisementFrame'>
		<?php include("./scripts/findAccountAdvertisements.php"); ?>
	</div>
</div>

<div class="filler"></div>
	
<?php
include("scripts/activateAccount.php");
include("common/newsbox.php");
include("common/chatbox.php");
include("common/accountpanels.php");
include("scripts/createResetPasswordForm.php");
include("scripts/backupDeleteAdvertisement.php");
include("common/navbar.php");
include("common/footer.php");
include("common/screenlock.php");
?>

<div id="gallery" class="cursorhand" title='Click to Close' onclick="var event = arguments[0] || window.event; closeGallery(event); return true;">
	<div><img src="" alt="" id="galleryimg" class="themeborder"/></div>
</div>

<?php include("scripts/checkIfOnline.php"); ?>

</body>
</html>
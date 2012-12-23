<?php
include('/home/postonme/hidden_scripts/definitions.php');
include('/home/postonme/hidden_scripts/session.php');
include("scripts/activateAccount.php");
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML Strict//EN"><META http-equiv="Content-Type" content="text/html; charset=utf-8">

<html xmlns="http://www.w3.org/1999/xhtml" slick-uniqueid="1" xmlns:fb="http://ogp.me/ns/fb#">
<head>
	<title>Post On Me! - Campus Classifieds</title>
	
	<link rel="shortcut icon" href="/img/logoicon.ico" >
	
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<link rel="stylesheet" type="text/css" href="css/nav.css"/>
	<link rel="stylesheet" type="text/css" href="css/footer.css"/>
	<link rel="stylesheet" type="text/css" href="css/chat.css"/>
	<link rel="stylesheet" type="text/css" href="css/view.css"/>
	<link rel="stylesheet" type="text/css" href="css/newsbox.css"/>
	<link rel="stylesheet" type="text/css" href="css/customalert.css"/>
	<link rel="stylesheet" type="text/css" href="css/advertisement.css"/>
	<link rel="stylesheet" type="text/css" href="css/accountops.css"/>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="/js/functions.js"></script>
	<script src="/js/chat.js"></script>
	<script type="text/javascript" src="/js/exp.js"></script>
	<script src="/js/news.js"></script>
	<script src="/js/navbar.js"></script>
	<script src="/js/gallery.js"></script>
	<script type="text/javascript" src="/js/customalert.js"></script>
	<script type="text/javascript" src="/js/account.js"></script>
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

<div class='contentcontainer' style='width:62%;padding-left:10px;padding-right:10px;'>
	<h2>Review, Modify, Delete or Bump your Advertisements!</h2>
	<div id='accountAdvertisementFrame'>
		<?php include("./scripts/findAccountAdvertisements.php"); ?>
	</div>
</div>

<div class="filler"></div>
	
<?php
include("common/newsbox.php");
include("common/chatbox.php");
include("common/accountpanels.php");
include("scripts/createResetPasswordForm.php");
include("scripts/backupDeleteAdvertisement.php");
include("common/navbar.php");
include("common/footer.php");
include("common/screenlock.php");
?>

<div id="gallery" class="cursorhand" onclick="closeGallery(); return true;">
	<div><img src="" alt="" id="galleryimg" class="themeborder"></div>
</div>

<?php include("scripts/checkIfOnline.php"); ?>

</body>
</html>
<html>
<head>
<title>TreasureTrash</title>
<link rel="stylesheet" type="text/css" href="style.css"/>

<script type="text/javascript" language="javascript">
function OpenWindow() {
	var searchval = document.getElementById('search').value;
	var newurl = "view.php?id=" + searchval;
	self.close();
	window.open(newurl);
}
</script>

</head>
<body>

<div class="mainbody">

<div class="bannerbody">
<a href="index.php"><img src="img/logo.png" id="logo" class="bottomline"></a>
<p id="location" class="bottomline">Western Campus</p>
<!--<a href="post.php"><img src="img/search.png" id="search" class="bottomline"></a>-->
<!--<p id="post" class="bottomline"><a href="post.php">Post an Advertisement</a></p>-->
</div>

<div class="leftpanelbody" style="width:50%">
<div class="centerelement" style="margin:100px auto 0 auto;display:table;">
<form action="" method=post>
<input type="text" name="searchtext" value=" Search" onfocus="if(this.value==this.defaultValue) this.value='';" id="search">
<input type=submit name="searchgo" value="GO" id="go" onClick="OpenWindow()">
</form>
</div>
<p class="centerelement" style="clear:left;"><h3>Classifieds for Treasure</h3></p>
</div>

<div class="rightpanelbody" style="width:50%">
<a href="post.php" class="centerelement"><h1 class="bigbutton">Post</h1></a>
<p class="centerelement"><h3>Your Trash for Free</h3></p>
</div>

<?php
$load = "view.php/?id=" . $_POST['searchtext'];
echo "<script type='text/javascript' language='javascript'> window.open(" . strtolower($load) . "); </script>";
?>

</body>
</html>
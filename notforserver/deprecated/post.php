<html>
<head>
	<title>Post On Me! - Sell it Quicker, Buy it Cheaper</title>
	<link rel="stylesheet" type="text/css" href="style.css"/>

	<script>
	$('#navsearchform navsearchtext').keydown(function(e) {
		if (e.keyCode == 13) {
			$('#navsearchform').submit();
		}
	});

	function openWindow(searchbar) {
		var searchval = document.getElementById(searchbar).value;
		var newurl = "http://www.postonme.com/view.php?id=" + searchval;
		window.location = newurl;
	}
	</script>

</head>
<body>

<div id="navbar" class="navbar navbar-fixed-top themegradient">
	<div class="container">
		
		<a id="brand" href="index.html" target="_top"><img src="img/companyLogo.png" width="200px" height="50px"></a>

		<ul id="links">
		<li>Western University</li>
		</ul>
		
		<ul id="interact">
		<li><a href="post.php" target="_top" id="navpost">Post Advertisement</a></li>
		<li>
			<form action="" method="post" id="navsearchform" onsubmit="openWindow('navsearchbar'); return false;">
				<input type="text" name="navsearchtext" value="Search" onfocus="if(this.value==this.defaultValue) this.value=''; this.style.color='black'; this.style.textAlign='left';" class="smallbutton themeborder" id="navsearchbar">
			</form>
		</li>
		</ul>
		
	</div>
</div>

<div class="filler"></div>

<div class="container">

	<form action="postad.php" method=post>
		<div class="centerelement">
			<div id="radiobtns">
				<input type="radio" name="group1" value=1 checked>I am Buying<br>
				<input type="radio" name="group1" value=0>I am Selling
			</div>
			<p>Category:</p>
			<select name="categorytext">
				<option>Appliances</option>
				<option>Bikes</option>
				<option>Cellphones</option>
				<option>Clothes</option>
				<option>Collectibles</option>
				<option>Computers</option>
				<option>Electronics</option>
				<option>Furniture</option>
				<option>Jewelry</option>
				<option>Movies/Music</option>
				<option>Textbooks</option>
				<option>Tools</option>
				<option>Toys</option>
				<option>Videogames</option>
			</select>
			<p>Title:</p>
			<input type="text" name="titletext" class="textarea"></text><br>
			<p>Price:</p>
			<input type="text" name="pricetext" class="textarea"></text><br>
			<p>Details:</p>
			<textarea class='messagefield' name='detailtext' id='messagefield'></textarea>
			<p>Email:</p>
			<input type="text" name="emailtext" class="textarea"></text><br>
			<input type=SUBMIT name="submitad" value="SUBMIT">
		</div>
	</form>
</div>

</body>
</html>
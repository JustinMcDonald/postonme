<div id='navbar' class='navbar navbar-fixed-top themegradient'>
	<div style='width:100%;height:100%;'>
		<?php //include('./common/elements/level_bar.php'); ?>
		<?php include("./common/elements/advanced_search.php"); ?>
		<div id='fbfield'>
			<div class='fb-like' data-href='http://www.facebook.com/pages/PostOnMe/406180249454738?ref=ts&amp;fref=ts' data-send='true' data-layout='button_count' data-width='150' data-show-faces='false'></div>
		</div>
		<div class='container' style='min-width:810px'>
			<div id='welcomemessage'></div>
			<a id='brand' href='http://www.postonme.com/' target='_top'><img src='img/written_logo.png' width='200px' height='50px'/></a>
			<ul id='locations'>
				<li><a href='#' id='currentlocation'><?php if ($_COOKIE['location'] != '') echo $_COOKIE['location']; ?></a><img src='./img/order_down_selected.png' alt='' width='10px' height='10px' style='margin-left:8px'/>
					<ul id='cities'>
						<li onclick='changeLocation("Georgian College");'><a href='#'>Georgian College</a></li>
						<li onclick='changeLocation("Western University");'><a href='#'>Western University</a></li>
					</ul>
				</li>
			</ul>
			<ul id='interact'>
				<li style='padding-top:5px;'><a href='post.php' target='_top' id='navpost' title='Post a new Advertisement'>Post</a></li>
				<li class='cursorhand' style='padding-left:0;'><img src='img/advanced_search.png' alt='' width='28px' height='28px' id='advsearch' title='Advanced Search'/></li>
				<li class='cursorhand themeborder' id='searchgo' style='padding:0px;'><img src='img/search_go.png' alt='' width='25px' height='25px' title='Search'/></li>
				<li style='padding-right:0'>
					<form action='' method='post' id='navsearchform' onsubmit='openWindow("navsearchbar"); return false;'>
						<input type='text' name='navsearchtext' value='Search' class='themeborder' id='navsearchbar'/>
					</form>
				</li>
			</ul>
		</div>
		<?php include("./common/elements/guest_operations.php"); ?>
		<?php include("./common/elements/account_operations.php"); ?>
	</div>
</div>
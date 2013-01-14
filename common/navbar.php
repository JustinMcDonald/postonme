<div id='navbar' class='themecolor'>
	<div>
		<?php 
			//include('./common/elements/level_bar.php');
			include("./common/elements/advanced_search.php");
		?>
		<div id='fbfield' style='display:none'>
			<!--<div class='fb-like' data-href='http://www.facebook.com/pages/PostOnMe/406180249454738?ref=ts&amp;fref=ts' data-send='true' data-layout='button_count' data-width='150' data-show-faces='false'></div>-->
			<!--<fb:like href="http://www.postonme.com" send="false" layout="button_count" width="200" show_faces="false"></fb:like>-->
			<!--<div class='fb-like' data-href='http://www.postonme.com'>-->
		</div>
		<div>
			<div id='welcomemessage'></div>
			<a id='brand' href='http://www.postonme.com/'><img src='img/written_logo.png' alt='' width='200px' height='50px'/></a>
			<ul id='locations'>
				<li><a href='#' id='currentlocation'><?php if ($_COOKIE['location'] != '') echo $_COOKIE['location']; ?></a><img src='./img/order_down_selected.png' alt='' width='10px' height='10px' style='margin-left:8px'/>
					<ul id='cities'>
						<li onclick='changeLocation("Georgian College");'><a href='#'>Georgian College</a></li>
						<li onclick='changeLocation("Western University");'><a href='#'>Western University</a></li>
					</ul>
				</li>
			</ul>
			<ul id='interact'>
				<li style='padding-top:5px;'><a href='post.php' id='navpost' title='Post a new Advertisement'>Post</a></li>
				<li class='cursorhand' style='padding-left:0;'><img src='img/advanced_search.png' alt='' width='28px' height='28px' id='advsearch' title='Advanced Search'/></li>
				<li class='cursorhand themeborder' id='searchgo' style='padding:0px;'><img src='img/search_go.png' alt='' width='25px' height='25px' title='Search'/></li>
				<li style='padding-right:0'>
					<form action='' method='post' id='navsearchform' onsubmit='openWindow("navsearchbar"); return false;'>
						<div><input type='text' name='navsearchtext' value='Search' class='themeborder' id='navsearchbar'/></div>
					</form>
				</li>
			</ul>
		</div>
		<?php
			include("./common/elements/guest_operations.php");
			include("./common/elements/account_operations.php");
		?>
	</div>
</div>
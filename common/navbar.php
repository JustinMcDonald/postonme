<div id='navbar' class='navbar navbar-fixed-top themegradient'>
	<div style='width:100%;height:100%;'>
		<?php //include('level_bar.php'); ?>
		<div id='advpanel'>
			<div> <!--CATEGORIES-->
				<fieldset>
					<legend>Categories</legend>
					<table id='categories'>
						<tr>
							<td><input id='100' type='checkbox' value='Arts, Crafts'/></td>
							<td><label for='100'>Arts, Crafts</label></td>
							<td><input id='101' type='checkbox' value='Clothing'/></td>
							<td><label for='101'>Clothing</label></td>
							<td><input id='102' type='checkbox' value='Musical Instruments'/></td>
							<td><label for='102'>Musical Instruments</label></td>
						</tr>
						<tr>
							<td><input id='103' type='checkbox' value='Appliances'/></td>
							<td><label for='103'>Appliances</label></td>
							<td><input id='104' type='checkbox' value='Computers, Accessories'/></td>
							<td><label for='104'>Computers, Accessories</label></td>
							<td><input id='105' type='checkbox' value='Sports Equipment'/></td>
							<td><label for='105'>Sports Equipment</label></td>
						</tr>
						<tr>
							<td><input id='106' type='checkbox' value='Bikes'/></td>
							<td><label for='106'>Bikes</label></td>
							<td><input id='107' type='checkbox' value='Electronics'/></td>
							<td><label for='107'>Electronics</label></td>
							<td><input id='108' type='checkbox' value='Tickets'/></td>
							<td><label for='108'>Tickets</label></td>
						</tr>
						<tr>
							<td><input id='109' type='checkbox' value='Books, Textbooks'/></td>
							<td><label for='109'>Books, Textbooks</label></td>
							<td><input id='110' type='checkbox' value='Furniture'/></td>
							<td><label for='110'>Furniture</label></td>
							<td><input id='111' type='checkbox' value='Videogames, Consoles'/></td>
							<td><label for='111'>Videogames, Consoles</label></td>
							
						</tr>
						<tr>
							<td><input id='112' type='checkbox' value='CD, DVD, BluRay'/></td>
							<td><label for='112'>CD, DVD, BluRay</label></td>
							<td><input id='113' type='checkbox' value='Games, Collectibles'/></td>
							<td><label for='113'>Games, Collectibles</label></td>
							<td><input id='114' type='checkbox' value='Everything Else'/></td>
							<td><label for='114'>Everything Else</label></td>
						</tr>
					</table>
				</fieldset>
			</div>
			<div> <!--buy/sell/online/images-->
				<fieldset>
					<legend>Options</legend>
					<table>
						<tr>
							<td><input id='200' type='checkbox' name='buying' value='1'/></td>
							<td><label for='200'>I'm Buying it</label></td>
						</tr>
						<tr>
							<td><input id='201' type='checkbox' name='selling' value='2'/></td>
							<td><label for='201'>I'm Selling it</label></td>
						</tr>
						<tr>
							<td><input id='202' type='checkbox' name='online'/></td>
							<td><label for='202'>Online Only</label></td>
						</tr>
						<tr>
							<td><input id='203' type='checkbox' name='images'/></td>
							<td><label for='203'>Images Only</label></td>
						</tr>
					</table>
				</fieldset>
			</div>
			<div> <!--price-->
				<fieldset>
					<legend>Price</legend>
					<table id='price'>
						<tr>
							<td>Minimum:</td>
						</tr>
						<tr>
							<td><div id='outputmin'>$0</div></td>
							<td><input type='range' id='rangemin' value='0' min='0' max='19' step='1'></td>
						</tr>
						<tr>
							<td>Maximum:</td>
						</tr>
						<tr>
							<td><div id='outputmax'>$10000</div></td>
							<td><input type='range' id='rangemax' value='1000' min='0' max='19' step='1'></td>
						</tr>
						<tr>
							<td colspan='2'><input type='checkbox' id='highroller'/>I'm Feeling Wealthy</td>
						</tr>
					</table>
				</fieldset>
			</div>
			<div> <!--date-->
				<fieldset>
					<legend>Date Posted</legend>
					<table id='date'>
						<tr>
							<td><input id='300' type='radio' name='date' value='0'></td>
							<td><label for='300'>Last 24 Hours</label></td>
						</tr>
						<tr>
							<td><input id='301' type='radio' name='date' value='1'></td>
							<td><label for='301'>Last 3 Days</label></td>
						</tr>
						<tr>
							<td><input id='302' type='radio' name='date' value='2'></td>
							<td><label for='302'>Last Week</label></td>
						</tr>
						<tr>
							<td><input id='303' type='radio' name='date' value='3'></td>
							<td><label for='303'>Last Month</label></td>
						</tr>
						<tr>
							<td><input id='304' type='radio' name='date' value='4'></td>
							<td><label for='304'>All Time</label></td>
						</tr>
					</table>
				</fieldset>
			</div>
		</div>
		<div id='fbfield'>
			<div class='fb-like' data-href='http://www.facebook.com/pages/PostOnMe/406180249454738?ref=ts&amp;fref=ts' data-send='true' data-layout='button_count' data-width='150' data-show-faces='false'></div>
		</div>
		<div class='container' style='min-width:810px'>
			<div id='welcomemessage'></div>
			<a id='brand' href='http://www.postonme.com/' target='_top'><img src='img/written_logo.png' width='200px' height='50px'/></a>
			<ul id='locations'>
				<li><a href='#' id='currentlocation'></a><img src='./img/order_down_selected.png' alt='' width='10px' height='10px' style='margin-left:8px'/>
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
	</div>
</div>
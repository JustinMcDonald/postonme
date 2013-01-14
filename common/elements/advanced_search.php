<div id='advpanel' style='display:none'>
	<div> <!--CATEGORIES-->
		<fieldset>
			<legend>Categories</legend>
			<table id='categories'>
				<tr>
					<td><input id='a100' type='checkbox' value='Arts, Crafts'/></td>
					<td><label for='a100'>Arts, Crafts</label></td>
					<td><input id='a101' type='checkbox' value='Clothing'/></td>
					<td><label for='a101'>Clothing</label></td>
					<td><input id='a102' type='checkbox' value='Musical Instruments'/></td>
					<td><label for='a102'>Musical Instruments</label></td>
				</tr>
				<tr>
					<td><input id='a103' type='checkbox' value='Appliances'/></td>
					<td><label for='a103'>Appliances</label></td>
					<td><input id='a104' type='checkbox' value='Computers, Accessories'/></td>
					<td><label for='a104'>Computers, Accessories</label></td>
					<td><input id='a105' type='checkbox' value='Sports Equipment'/></td>
					<td><label for='a105'>Sports Equipment</label></td>
				</tr>
				<tr>
					<td><input id='a106' type='checkbox' value='Bikes'/></td>
					<td><label for='a106'>Bikes</label></td>
					<td><input id='a107' type='checkbox' value='Electronics'/></td>
					<td><label for='a107'>Electronics</label></td>
					<td><input id='a108' type='checkbox' value='Tickets'/></td>
					<td><label for='a108'>Tickets</label></td>
				</tr>
				<tr>
					<td><input id='a109' type='checkbox' value='Books, Textbooks'/></td>
					<td><label for='a109'>Books, Textbooks</label></td>
					<td><input id='a110' type='checkbox' value='Furniture'/></td>
					<td><label for='a110'>Furniture</label></td>
					<td><input id='a111' type='checkbox' value='Videogames, Consoles'/></td>
					<td><label for='a111'>Videogames, Consoles</label></td>
					
				</tr>
				<tr>
					<td><input id='a112' type='checkbox' value='CD, DVD, BluRay'/></td>
					<td><label for='a112'>CD, DVD, BluRay</label></td>
					<td><input id='a113' type='checkbox' value='Games, Collectibles'/></td>
					<td><label for='a113'>Games, Collectibles</label></td>
					<td><input id='a114' type='checkbox' value='Everything Else'/></td>
					<td><label for='a114'>Everything Else</label></td>
				</tr>
			</table>
		</fieldset>
	</div>
	<div> <!--buy/sell/online/images-->
		<fieldset>
			<legend>Options</legend>
			<table>
				<tr>
					<td><input id='a200' type='checkbox' name='buying' value='1'/></td>
					<td><label for='a200'>I'm Buying it</label></td>
				</tr>
				<tr>
					<td><input id='a201' type='checkbox' name='selling' value='2'/></td>
					<td><label for='a201'>I'm Selling it</label></td>
				</tr>
				<tr>
					<td><input id='a202' type='checkbox' name='online'/></td>
					<td><label for='a202'>Online Only</label></td>
				</tr>
				<tr>
					<td><input id='a203' type='checkbox' name='images'/></td>
					<td><label for='a203'>Images Only</label></td>
				</tr>				
			</table>
		</fieldset>
	</div>
	<div> <!--date-->
		<fieldset>
			<legend>Date Posted</legend>
			<table id='date'>
				<tr>
					<td><input id='a300' type='radio' name='date' value='0'/></td>
					<td><label for='a300'>Last 24 Hours</label></td>
				</tr>
				<tr>
					<td><input id='a301' type='radio' name='date' value='1'/></td>
					<td><label for='a301'>Last 3 Days</label></td>
				</tr>
				<tr>
					<td><input id='a302' type='radio' name='date' value='2'/></td>
					<td><label for='a302'>Last Week</label></td>
				</tr>
				<tr>
					<td><input id='a303' type='radio' name='date' value='3'/></td>
					<td><label for='a303'>Last Month</label></td>
				</tr>
				<tr>
					<td><input id='a304' type='radio' name='date' value='4'/></td>
					<td><label for='a304'>All Time</label></td>
				</tr>
			</table>
		</fieldset>
	</div>
    <div>
        <fieldset>
            <legend>Price Range</legend>
            <table>
			<tr>
			    <td>
			        <input type="text" id="slider-value" value="$0-$250" />
			    </td>
			</tr>
			<tr>
			    <td><div id="slider-range"></div></td>
			</tr>
			<tr>
			    <td><input type='checkbox' id='highroller' />I'm Feeling Wealthy</td>
			</tr>        
            </table>
        </fieldset>        
    </div>
</div>
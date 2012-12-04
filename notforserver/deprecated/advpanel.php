<div id='advpanel' class='themeborder'>
	<div> <!--CATEGORIES-->
		<fieldset>
			<legend>Categories</legend>
			<table id='categories'>
				<tr>
					<td><input type='checkbox' value='Arts, Crafts'/></td>
					<td>Arts, Crafts</td>
					<td><input type='checkbox' value='Clothing'/></td>
					<td>Clothing</td>
					<td><input type='checkbox' value='Musical Instruments'/></td>
					<td>Musical Instruments</td>
				</tr>
				<tr>
					<td><input type='checkbox' value='Appliances'/></td>
					<td>Appliances</td>
					<td><input type='checkbox' value='Computers, Accessories'/></td>
					<td>Computers, Accessories</td>
					<td><input type='checkbox' value='Sports Equipment'/></td>
					<td>Sports Equipment</td>
				</tr>
				<tr>
					<td><input type='checkbox' value='Bikes'/></td>
					<td>Bikes</td>
					<td><input type='checkbox' value='Electronics'/></td>
					<td>Electronics</td>
					<td><input type='checkbox' value='Tickets'/></td>
					<td>Tickets</td>
				</tr>
				<tr>
					<td><input type='checkbox' value='Books, Textbooks'/></td>
					<td>Books, Textbooks</td>
					<td><input type='checkbox' value='Furniture'/></td>
					<td>Furniture</td>
					<td><input type='checkbox' value='Videogames, Consoles'/></td>
					<td>Videogames, Consoles</td>
					
				</tr>
				<tr>
					<td><input type='checkbox' value='CD, DVD, BluRay'/></td>
					<td>CD, DVD, BluRay</td>
					<td><input type='checkbox' value='Games, Hobbies, Collectibles'/></td>
					<td>Games, Hobbies, Collectibles</td>
					<td><input type='checkbox' value='Tools'/></td>
					<td>Everything Else</td>
				</tr>
			</table>
		</fieldset>
	</div>
	<div> <!--GENERAL CHECKBOXES-->
		<div class='inlineblock'> <!--buy/sell/online/images-->
			<fieldset>
				<legend>Options</legend>
				<table id='buysell'>
					<tr>
						<td><input type='checkbox' name='buying' value='1'></td>
						<td>I'm Buying it</td>
					</tr>
					<tr>
						<td><input type='checkbox' name='selling' value='2'></td>
						<td>I'm Selling it</td>
					</tr>
					<tr>
						<td><input type='checkbox' name='online' id='online'></td>
						<td>Online Only</td>
					</tr>
					<tr>
						<td><input type='checkbox' name='images' id='images'></td>
						<td>Images Only</td>
					</tr>
				</table>
			</fieldset>
		</div>
		<div class='inlineblock'> <!--price-->
			<fieldset>
				<legend>Price</legend>
				<table id='price'>
					<tr>
						<td>Minimum:</td>
						<td>Maximum:</td>
					</tr>
					<tr>
						<td><input type='radio' name='min' value='5'>$5</td>
						<td><input type='radio' name='max' value='10'>$10</td>
					</tr>
					<tr>
						<td><input type='radio' name='min' value='10'>$10</td>
						<td><input type='radio' name='max' value='25'>$25</td>
					</tr>
					<tr>
						<td><input type='radio' name='min' value='25'>$25</td>
						<td><input type='radio' name='max' value='100'>$100</td>
					</tr>
					<tr>
						<td><input type='radio' name='min' value='100'>$100</td>
						<td><input type='radio' name='max' value='300'>$300</td>
					</tr>
				</table>
			</fieldset>
		</div>
		<div class='inlineblock'> <!--date-->
			<fieldset>
				<legend>Date Posted</legend>
				<table id='date' style='height:50px'>
					<tr>
						<td><input type='radio' name='date' value='0'></td>
						<td>Within Last 24 Hours</td>
					</tr>
					<tr>
						<td><input type='radio' name='date' value='1'></td>
						<td>Within Last 3 Days</td>
					</tr>
					<tr>
						<td><input type='radio' name='date' value='2'></td>
						<td>Within Last Week</td>
					</tr>
					<tr>
						<td><input type='radio' name='date' value='3'></td>
						<td>Within Last Month</td>
					</tr>
				</table>
			</fieldset>
		</div>
	</div>
</div>
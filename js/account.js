window.myValue;

function expand(id){
	var n = document.getElementById('detail'+id);
	n.style.display = n.style.display == "none" || n.style.display == "" ? "table" : "none";
	if (window.myValue != id){ 
		if (window.myValue != null){
			var l = document.getElementById('detail'+window.myValue);
			l.style.display = l.style.display == "none" || l.style.display == "" ? "table" : "none";
		}
		window.myValue = id;
	}
	else window.myValue = null;
}

function deletePost(adid){
	var answer = confirm("Are you sure you want to delete this advertisement?");
	if (answer == true){
		var xmlhttp;
		if (window.XMLHttpRequest) xmlhttp=new XMLHttpRequest();// code for IE7+, Firefox, Chrome, Opera, Safari
		else xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");// code for IE6, IE5
		
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
				alert("Advertisement deleted.");
				window.top.location.reload();
			}
		}
		
		var url = "../scripts/deleteAdvertisement.php?adid="+adid;
		xmlhttp.open("GET",url,false);
		xmlhttp.send();
	}
}

function bumpPost(adid){

	var answer = confirm("Are you sure you want to bump this advertisement?\n(Cost = 1 Experience)");
	if (answer)
	{
		var dataString = "adid="+adid;
		
		$.ajax({
			url: "../scripts/bumpAdvertisement.php",
			type: "post",
			data: dataString,
			success: function(response, textStatus, jqXHR)
			{
				(response == '1') ? window.top.location.reload() : alert('Your experience cannot go below 0');
			},
			error: function (xhr, ajaxOptions, thrownError) {
				alert("Something went wrong. Please try again later.");
			}
		});
	}
}

function editMode(adid){
	var adbody = $('#adbody'+adid);
	window.color = adbody.css('background-color');
	adbody.css('background-color', '#AEF5AF');
	adbody.css('cursor', 'auto');	
	$('#detail'+adid).css('background-color', '#AEF5AF');
	
	$('.adbody').each(function()
	{
		this.setAttribute('onclick', null);
	});
	
	$('#adviews'+adid).hide();
	
	var category = $('#adcategory'+adid);
	window.categoryval = category.text();
	category.replaceWith("<div id='adcategory"+adid+"' class='adcategory' style='width:172px;min-width:172px'><select name='adcategory' style='width:100%'>"+
									"<option>Art, Crafts</option>"+
									"<option>Appliances</option>"+
									"<option>Bikes</option>"+
									"<option>Books, Textbooks</option>"+
									"<option>CD, DVD, BluRay</option>"+
									"<option>Clothing</option>"+
									"<option>Computers, Accessories</option>"+
									"<option>Electronics</option>"+
									"<option>Furniture</option>"+
									"<option>Games, Collectibles</option>"+
									"<option>Musical Instruments</option>"+
									"<option>Sports Equipment</option>"+
									"<option>Tickets</option>"+
									"<option>Videogames, Consoles</option>"+
									"<option>Everything Else</option>"+
								"</select></div>");
	$('#adcategory'+adid+' option').each(function(){
		if (this.value == window.categoryval) this.setAttribute('selected', 'selected');
	});
	
	var title = $('#adtitle'+adid);
	window.titleval = title.text();
	title.replaceWith("<div id='adtitle"+adid+"' class='adtitle'><input type='text' style='width:280px;min-width:250px;resize:none;' value='"+window.titleval+"' maxlength='75'/></div>");
	
	var price = $('#adprice'+adid);
	window.priceval = price.text();
	price.replaceWith("<div id='adprice"+adid+"' class='adprice'><div style='min-width:60px'>$<input type='text' style='width:40px' value='"+window.priceval.substring(1)+"' maxlength='4'/></div></div>");
	
	var text = $('#adtext'+adid);
	window.textval = text.text().replace(/<br ?\/?>/g, "\n");
	text.replaceWith("<textarea id='adtext"+adid+"' style='width:100%;height:130px;resize:none;' maxlength='500'>"+window.textval+"</textarea>");
	
	$('#modifybtn'+adid).hide();
	$('#cancelbtn'+adid).show();
	$('#savebtn'+adid).show();
}

function exitEditMode(adid){
	var adbody = $('#adbody'+adid);
	adbody.css('background-color', window.color);
	adbody.css('cursor', 'pointer');	
	$('#detail'+adid).css('background-color', 'transparent');
	
	$('.adbody').each(function()
	{
		var id = this.getAttribute('id').substring(6);
		this.setAttribute('onclick', 'expand(' + id + ');');
	});
	
	$('#adviews'+adid).show();
	
	$('#adcategory'+adid).replaceWith("<div id='adcategory"+adid+"' class='adcategory'>"+window.categoryval+"</div>");
	
	$('#adtitle'+adid).replaceWith("<div id='adtitle"+adid+"' class='adtitle'>"+window.titleval+"</div>");
	
	$('#adprice'+adid).replaceWith("<div id='adprice"+adid+"' class='adprice'>"+window.priceval+"</div>");
	
	$('#adtext'+adid).replaceWith("<div id='adtext"+adid+"' class='adtext'>"+window.textval.replace(/\n/g, '<br />')+"</div>");
	
	$('#modifybtn'+adid).show();
	$('#cancelbtn'+adid).hide();
	$('#savebtn'+adid).hide();
}

function saveChanges(adid){
	var newcategory = $('#adcategory'+adid+' option:selected').val();
	var newtitle = $('#adtitle'+adid+' input').val();
	var newprice = $('#adprice'+adid+' input').val();
	var newtext = $('#adtext'+adid).val();
	var dataString = "adid="+adid+"&category="+newcategory+"&title="+newtitle+"&price="+newprice+"&text="+newtext;
	$.ajax({
		type: "POST",
		url: "../scripts/modifyAdvertisement.php",
		data: dataString,
		success: function(data, textStatus, jqXHR) {
			if (data.substring(0,1) == "1")
			{
				window.categoryval = newcategory;
				window.titleval = newtitle;
				window.priceval = '$' + newprice;
				window.textval = newtext.replace(/\n/g, '<br />');
				exitEditMode(adid);
				alert(data.substring(1));
			}
			else alert(data);
		},
		error: function (xhr, ajaxOptions, thrownError) {
			alert("Something went wrong. Please try again later.");
		}
	});
	
}
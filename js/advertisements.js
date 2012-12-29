window.myValue;

function expand(id){
	var n = document.getElementById('detail'+id);
	n.style.display = n.style.display == "none" || n.style.display == "" ? "block" : "none";
	
	//Reactivate the facebook like butotn
	/*var like_box = $('#detail'+id+' .fb-like-inactive');
	like_box.removeClass('fb-like-inactive');
	like_box.addClass('fb-like');*/
	FB.XFBML.parse($('#fbfield'+id)[0]);
	
	//Logic for closing previously opened advertisement
	if (window.myValue != id){ 
		if (window.myValue != null){
			var l = document.getElementById('detail'+window.myValue);
			l.style.display = l.style.display == "none" || l.style.display == "" ? "block" : "none";
		}
		window.myValue = id;
		addView(id);
	}
	else window.myValue = null;
}

function flagAdvertisement(id) {
	var answer = confirm("Are you sure you want to flag this advertisement?");
	if (answer == true){
		var message = prompt("Please describe why you feel this advertisement is inappropriate:");
		addFlag(id, message);
	}
	else return;
}

function addView(id) {
	$.ajax({
		url : "../scripts/addView.php?id="+id,
		type: "get",
	});
}

function addFlag(id, message) {
	$.ajax({
		url : "../scripts/addFlag.php?id="+id+"&message="+message,
		type: "get",
		success: function(response, textStatus, jqXHR)
		{
			if (response == "1") alert("Thank you for your effort to make PostOnMe a safer environment.");
			else alert(response);
		}
	});
}

function initOrder()
{
	if (location.search)
	{
		var parts = location.search.substring(1).split('&');
		for (var i = 0; i < parts.length; i++)
		{
			var nv = parts[i].split('=');
			if (nv[0] == "order") (nv[1].substring(0,1) == "1") ? indicateOrder(nv[1].substring(1), "up") : indicateOrder(nv[1], "down");
		}
	}
}
	
function indicateOrder(type, direction)
{
	if (direction == "down") $('#field'+type).attr('onclick', 'orderResults(\"'+type+'\", \"up\");');
	else $('#field'+type).attr('onclick', 'orderResults(\"'+type+'\", \"down\");');
}

function orderResults(type, direction)
{
	if (direction == "up") type = "1" + type;
	var url = window.top.location.href;
	for (var i = 0; i < url.length; i++) 
	{
		if (url[i] == "?") 
		{
			url = url.substring(i+1);
			break;
		}
	}
	url = url.replace(/&order=.*?&/, "&order="+type+"&");
	window.location = "http://www.postonme.com/view.php?" + url;
}

function nextLimit(limit)
{
	var url = window.top.location.href;
	for (var i = 0; i < url.length; i++) 
	{
		if (url[i] == "?") 
		{
			url = url.substring(i+1);
			break;
		}
	}
	var nextlimit = limit + 40;
	url = url.replace(/&limit=.*/, "&limit="+nextlimit);
	location = "./view.php?" + url;
}

function previousLimit(limit)
{
	var url = window.top.location.href;
	for (var i = 0; i < url.length; i++) 
	{
		if (url[i] == "?") 
		{
			url = url.substring(i+1);
			break;
		}
	}
	var nextlimit = limit - 40;
	url = url.replace(/&limit=.*/, "&limit="+nextlimit);
	location = "./view.php?" + url;
}
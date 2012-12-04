$(document).ready(function() {
	
	var setting = getCookie('news');
	if (setting == null)
	{
		/*if ($(window).width() < 1143)
		{*/
			$("#newsbox").hide();
			$("#shownewsbutton").css('visibility', 'visible');
		/*}*/
	}
	else
	{
		if (setting == "true") 
		{
			$('#shownewsbutton').css('visibility', 'hidden');
			$('#newsbox').css('display', 'block');
			$('#hidenewsbutton').css('visibility', 'visible');
			//if (e.css('visibility') == 'visible') e[0].onclick();
		}
		else
		{
			$('#newsbox').css('display', 'none');
			$('#shownewsbutton').css('visibility', 'visible');
			//if (e.css('visibility') == 'visible') e[0].onclick();
		}
	}
	
	$(window).bind('resize', function()
	{
		if ($(window).width() < 1143)
		{
			$("#newsbox").hide();
			$("#shownewsbutton").css('visibility', 'visible');
		}
		else if ($(window).width() >= 1143 && getCookie('news') == "true")
		{
			$("#newsbox").show();
			$("#shownewsbutton").css('visibility', 'hidden');
		}
	});
});


function hideNews()
{
	setCookie('news',false,365);
	var elem = document.getElementById("newsbox"),
	right = 0,
	timer;
	
	timer = setInterval(function()
	{
		elem.style.right = ( right -= 42 ) + "px";
		if ( right <= -210)
		{
			clearInterval(timer);
			elem.style.display = "none";
			document.getElementById("shownewsbutton").style.visibility = "visible";
		}
	}, 10);
}

function showNews()
{
	setCookie('news',true,365);
	var elem = document.getElementById("newsbox"),
	right = -210,
	timer;
	
	document.getElementById("shownewsbutton").style.visibility = "hidden";
	elem.style.display = "block";
			
	timer = setInterval(function()
	{
		elem.style.right = ( right += 42 ) + "px";
		if ( right >= 0)
		{
			clearInterval(timer);
		}
	}, 10);
}

function toggleSubDetails(id)
{
	for (var i = 0; i < 7; i++) if ('100'+i != id) $('#100'+i).hide();
	var e = $('#'+id);
	(e.is(':visible')) ? e.hide() : e.show();
}
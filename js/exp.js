function getLevelColorHigh(level)
{
	switch(level)
	{
		case 0:
			return '59DFFF';
			break;
		case 1:
			return '59EFFF';
			break;
		case 2:
			return '59FFDF';
			break;
		case 3:
			return '59FFBF';
			break;
		case 4:
			return '59FFA0';
			break;
		case 5:
			return '5FFF59';
			break;
		case 6:
			return '9fFF59';
			break;
		case 7:
			return 'BFFF59';
			break;
		case 8:
			return 'CFFF59';
			break;
		case 9:
			return 'DFFF59';
			break;
		case 10:
			return 'EFFF59';
			break;
		default:
			return 'EFFF59';
			break;
	}
}

function getLevelColorLow(level)
{
	switch(level)
	{
		case 0:
			return '50CAE6';
			break;
		case 1:
			return '50D9E6';
			break;
		case 2:
			return '50E6C9';
			break;
		case 3:
			return '50E6AC';
			break;
		case 4:
			return '50E690';
			break;
		case 5:
			return '55E650';
			break;
		case 6:
			return '93E650';
			break;
		case 7:
			return 'ACE650';
			break;
		case 8:
			return 'BAE650';
			break;
		case 9:
			return 'C9E650';
			break;
		case 10:
			return 'D7E650';
			break;
		default:
			return 'D7E650';
			break;
	}
}

function hexToRgb(hex)
{
    var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
    return result ? {
        r: parseInt(result[1], 16),
        g: parseInt(result[2], 16),
        b: parseInt(result[3], 16)
    } : null;
}

function styleAdvertisementColor(id, exp)
{
	var level = (exp - (exp % 10)) / 10;
	var c = getLevelColorHigh(level);
	var hc = getLevelColorLow(level);
	
	var rgb = hexToRgb('#'+c);
	var hrgb = hexToRgb('#'+hc);
	var e = $('#'+id);
	e.css('background-color', 'rgba('+rgb.r+','+rgb.g+','+rgb.b+',0.4)');
	e.css('filter', 'progid:DXImageTransform.Microsoft.gradient(startColorstr=#77'+c+',endColorstr=#77'+c+')');
	e.hover(function()
	{
		$(this).css('background-color', 'rgba('+hrgb.r+','+hrgb.g+','+hrgb.b+',0.8)');
		$(this).css('filter', 'progid:DXImageTransform.Microsoft.gradient(startColorstr=#b7'+hc+',endColorstr=#b7'+hc+')');
	}, function()
	{
		$(this).css('background-color', 'rgba('+rgb.r+','+rgb.g+','+rgb.b+',0.4)');
		$(this).css('filter', 'progid:DXImageTransform.Microsoft.gradient(startColorstr=#77'+c+',endColorstr=#77'+c+')');
	});
	//document.createStyleSheet().addRule('#'+id+':hover', 'background-color:rgba('+hrgb.r+','+hrgb.g+','+hrgb.b+',0.6)');
	//addCSSRule('#'+id+':hover', 'background-color:rgba('+hrgb.r+','+hrgb.g+','+hrgb.b+',0.6)');
	//addCSSRule('#'+id+':hover', 'display:none');
}

function styleSocialColor(exp)
{
	var currentexp = exp % 10;
	var level = (exp - currentexp) / 10 + 1;
	var hexcolor = getLevelColorHigh(level);
	$('#level').text('Level '+level);
	var b = $('#expfill');
	(currentexp == 0) ? b.css('width', '2%') : b.css('width', currentexp*10+'%');
	b.css('background-color', '#'+hexcolor);
	var c = $('#expbar');
	c.attr('title', exp+' Experience');
	c.show();
	//$('#expinfo').show();
}

function showGuestLevelMessage()
{
	$('#level').text('Sign up & level up');
	$('#expbar').hide();
	//$('#expinfo').hide();
}
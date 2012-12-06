$(document).ready(function()
{
	var currentlocation = $('#currentlocation').text();
	$('#locationoptions option').each(function(){
		if (this.value == currentlocation) $('#locationoptions').val(currentlocation);
	});
	
	$('#adform input[type=text], #adform textarea').bind('focusin', function(){
		if (this.value==this.defaultValue) this.style.color='#ADADAD';
		setCaretPosition(this, 0);
		this.selectionStart = 0;
		this.selectionEnd = 0;
	});
	
	$('#adform input[type=text], #adform textarea').bind('click', function(){
		if (this.value==this.defaultValue) {
			setCaretPosition(this, 0);
			this.selectionStart = 0;
			this.selectionEnd = 0;
		}
	});
	
	$('#adform input[type=text], #adform textarea').bind('focusout', function(){
		if (this.value=='') this.value=this.defaultValue;
		this.style.color='#C9C9C9;';
	});
	
	$('#adform input[type=text], #adform textarea').bind('keydown', function(){
		if (this.value==this.defaultValue) this.value='';
		this.style.color='black';
	});
	
	$('#adform input[type=text], #adform textarea').bind('keyup', function(){
		if (this.value=='') {
			this.value=this.defaultValue;
			setCaretPosition(this, 0);
			this.selectionStart = 0;
			this.selectionEnd = 0;
			this.style.color='#C9C9C9';
		}
	});
});
$(function(){
	$('.cabecera').click(function() {
		$(this).next().slideToggle('slow');
		return false;
	}).next().hide();
});
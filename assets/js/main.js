// JavaScript Document
$(document).ready(function(e) {
    $('#buscador').css('display','none');

	$( ".buscador" ).click(function() {
	  $( "#buscador" ).fadeToggle( "fast", "linear",function(){
		  $( "#buscador input[type=text]" ).focus();
		  } );
	});
});
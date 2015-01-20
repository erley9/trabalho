$(document).ready(function() {

	$("li.tem-sub").on("mouseenter",function(){

		console.log("chegou aqui");

		$("#submenu").slideDown('fast', function() {
			
		}).css("display","block");
	});

	$("li.tem-sub").on("mouseleave",function(){

		console.log("chegou aqui");

		$("#submenu").slideUp('fast', function() {
			
		});
	});
	
	
});
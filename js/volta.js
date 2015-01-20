$(document).ready(function() {

	$("a.voltar").on("click",function(e){

		e.preventDefault();


		history.back(-1); 


	});
	
});
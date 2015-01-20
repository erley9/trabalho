$(document).ready(function() {


	$("#lista-servicos li").on("click",function(){

		var id = $(this).attr('data-div');


		var aba = "#"+id;


		console.log(aba);


		$("#mostra-servicos li").hide();


		$(aba).show();
	});
	
});
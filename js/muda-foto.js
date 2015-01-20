$(document).ready(function() {

	$("#lista-imagem li").on("click",function(e){

		e.preventDefault();


		var href = $(this).children('a').attr('href');

		$("#imagem-principal img").attr('src', href);

	});
	
});
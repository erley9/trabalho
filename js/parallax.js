$(document).ready(function(){




$("div.muda").each(function(){
	var obj = $(this);
	var position=$(obj).css('background-position');
 
	$(window).scroll(function() {
		var yPos = -($(window).scrollTop() / obj.data('speed')); 
		

		var posicoes = 	position.split(" ");

		console.log("posicoes:",posicoes);

		var posicaoformatada = posicoes[1];

		var resultado = parseInt(posicaoformatada.replace("px",""));

		var bgpos =resultado + yPos + 'px';

		console.log(bgpos);

		valorfinal = "center"+" "+bgpos;

		console.log("Valor Final:",valorfinal)
 
		obj.css('background-position', valorfinal );
 
	}); 
});




});
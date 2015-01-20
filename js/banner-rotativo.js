$(document).ready(function() {

	var imagemtotal = $("#banners li.imagem").length;

	var contador = 1;

	while(contador <= imagemtotal){
		if(contador == 1){


			var li = "<li id='contador"+contador+"' class='selecionado' data-quantidade='"+contador+"'></li>";

			$("#lista-contadores").append(li);


		}else{

			var li = "<li id='contador"+contador+"' data-quantidade='"+contador+"'></li>";

			$("#lista-contadores").append(li);

		}

		contador++;
	}



	var inicio = 1;

	var id =setInterval(function(){


		inicio ++;

		if(inicio > imagemtotal){
			inicio = 1;
		}
		

		$("#lista-contadores li").removeClass('selecionado');
		$("#banners li.imagem").hide();

		var li = "#imagem"+inicio;

		var contador = "#contador"+inicio;
		
		$(li).show();

		$(contador).addClass('selecionado');



	}, 3000);
	
});
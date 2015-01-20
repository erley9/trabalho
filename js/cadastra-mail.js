$(document).ready(function() {

	$("#enviacadastro").on("click",function(){

		var email = $(this).prev().val();

		var pai = $("#cadastra-se");

		var url = pai.attr('action');

		$.ajax({
		  url: url,
		  type: 'POST',
		  dataType: 'html',
		  data: {'email': email},
		  complete: function(xhr, textStatus) {
		    //called when complete
		  },
		  success: function(data, textStatus, xhr) {
			if(xhr.responseText=="sucesso"){

				pai.html("<p class='mensagem'>Cadastro Efetuado com Sucesso!</p>").css({
					"width": "258px",
					"height": "288px",
					"float": "left",
					"position": "relative",
					"font-family":"arial",
					"color":"#f00",
					"padding-top":"230px"
				});
			}else{
				pai.html("<p class='mensagem'>Não foi possivel se cadastrar no momento tente novamente mais tarde!</p>").css({
					"width": "258px",
					"height": "288px",
					"float": "left",
					"position": "relative",
					"font-family":"arial",
					"color":"#f00",
					"padding-top":"230px"
				});
			}		    
		  },
		  error: function(xhr, textStatus, errorThrown) {
		    //called when there is an error
		  }
		});
		

	});
	
});
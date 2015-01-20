$(document).ready(function() {

	$("form.envia-mail").on("submit",function(e){

		e.preventDefault();

		var form = $(this);

		var url = form.attr('action');

		var dados = form.serialize();

		$.ajax({
		  url: url,
		  type: 'POST',
		  dataType: 'html',
		  data: dados,
		  complete: function(xhr, textStatus) {
		    //called when complete
		  },
		  success: function(data, textStatus, xhr) {
		    if(xhr.responseText=="sucesso"){

		    	form.html("<p class='mensagem'>Email Enviado com Sucesso!</p>");
		    }else{
		    	form.html("<p class='mensagem'>Erro ao enviar o e-mail entre em contato com o administrador</p>");
		    }
		  },
		  error: function(xhr, textStatus, errorThrown) {
		    //called when there is an error
		  }
		});
		

	});
	
});
$(document).ready(function() {

	$("#form-observacoes").on("submit",function(e){
		e.preventDefault();

		var observacao = $("#form-observacoes #observacao").val();

		var id = $("#form-observacoes input.id").val();

		var action = $("#form-observacoes").attr('action');


		$.ajax({
		  url: action,
		  type: 'POST',
		  dataType: 'html',
		  data: {"id": id,"observacao":observacao},
		  complete: function(xhr, textStatus) {
		    //called when complete
		  },
		  success: function(data, textStatus, xhr) {
		    $("#lista-observacoes").html(data);
		  },
		  error: function(xhr, textStatus, errorThrown) {
		    //called when there is an error
		  }
		});
		

	});
	
});
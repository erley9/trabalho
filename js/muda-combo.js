$(document).ready(function() {

	$("#categoria").on("change",function(){

		var categoria = $(this).val();

		var url = $(this).data('url');



		$.ajax({
		  url: url,
		  type: 'POST',
		  dataType: 'html',
		  data: {"categoria": categoria},
		  complete: function(xhr, textStatus) {
		    //called when complete
		  },
		  success: function(data, textStatus, xhr) {
		    $("#subcategoria").html(data);
		  },
		  error: function(xhr, textStatus, errorThrown) {
		    //called when there is an error
		  }
		});
		

	});
	
});
$(document).ready(function() {
	 $('progress').css({
	 	display: 'none',
	 });

	 $('#porcentagem').css({
	 	display: 'none',
	 });


	$("#envia-foto").on("click",function(){
		 $('progress').attr('value','0');
		 $('#porcentagem').html('0%');

		$('#cadastrarFotos').ajaxForm({
		        uploadProgress: function(event, position, total, percentComplete) {
		            $('progress').attr('value',percentComplete).css({"display":"inline-block"});
		            $('#porcentagem').html(percentComplete+'%').css({"display":"inline-block"});
		        },
		        success: function(data) {
		        		
		            $('progress').attr('value','100');
		        $('#porcentagem').html('100%');
		            $('#galeria').html(data);


		            if($("#galeria  li").length >= 8){

		            //$("div.holder").jPages("destroy");

		            $("div.holder").jPages({
		                containerID  : "galeria",
		                perPage      : 8,
		                startPage    : 1,
		                startRange   : 1,
		                midRange     : 5,
		                endRange     : 1,
		                first       : "Primeira",
		                previous    : "Anterior",
		                next        : "Proxima",
		                last        : "Ultima"
		            });		
		            $("div.holder").css("display","block");
		        	}else{
		        		$("div.holder").css("display","none");
		        	}


		            $('progress').delay(5000).css({
		            	display: 'none',
		            });

		            $('#porcentagem').css({
		            	display: 'none',
		            });


		            $("#cadastrarFotos")[0].reset();

		        }  
		         
		});



	});

	$("#galeria").on("click","a.excluir",function(e){
		e.preventDefault();

		var url = $(this).attr("href");

		var id = $(this).attr("data-id");

		$.ajax({
		  url: url,
		  type: 'POST',
		  dataType: 'html',
		  data: {"id": id},
		  complete: function(xhr, textStatus) {
		    //called when complete
		  },
		  success: function(data, textStatus, xhr) {
		    $("#galeria").html(data);


		        if($("#galeria  li").length >= 8){

		        $("div.holder").jPages("destroy");

		        $("div.holder").jPages({
		            containerID  : "galeria",
		            perPage      : 8,
		            startPage    : 1,
		            startRange   : 1,
		            midRange     : 5,
		            endRange     : 1,
		            first       : "Primeira",
		            previous    : "Anterior",
		            next        : "Proxima",
		            last        : "Ultima"
		        });		
		        	$("div.holder").css("display","block");
		    	}else{
		    		$("div.holder").css("display","none");
		    	}
		  },
		  error: function(xhr, textStatus, errorThrown) {
		    //called when there is an error
		  }
		});
		
	});


	
});
$(document).ready(function($) {
	//$(".ddd").mask("(99)");
	$(".telefone").mask("9999-9999");
	$(".dddtelefone").mask("(99)9999-9999");

	$(".celsp").mask("99999-9999");
	$(".data").mask("99/99/9999");
	$(".ddd2").mask("99");
	$(".cnpj").mask("99.999.999/9999-99");
	$(".cpf").mask("999.999.999-99");
	$(".cep").mask("99999-999");

	$(".data-ano").mask("99/9999");
	


	
	$("#ddd-celular").on("keyup",function(){

		var total = $(this).val().length;

		console.log(total);
		console.log("foi");

		if(total == 2){
			if($(this).val() == 11 || $(this).val() == 21){

				$(".celular").mask("99999-9999");

				$(".celular").focus();

			}else{

				$(".celular").mask("9999-9999");

				$(".celular").focus();
			}
		}
	});

});
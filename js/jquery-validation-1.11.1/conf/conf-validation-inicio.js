$(document).ready(function() {

	var base = $("#base").val();
	var verificamail = base+"inicio/verificaMail";


	$("#cadastrar1").validate({
			rules: {
				nome:"required",
				telefone:"required",
				atuacao:"required",
				email:{
					required:true,
					remote: verificamail
				},
				agree: "required"
			},
			messages: {
				nome:"Por favor digite seu nome",
				telefone: "Por favor digite seu Telefone",
				atuacao:"Por favor selecione sua Área de Atuação",
				email:{
					required:"Por favor digite seu E-mail",
					remote:"E-mail já Cadastrado"
					},
				agree: "Please accept our policy"
			}
		});
});

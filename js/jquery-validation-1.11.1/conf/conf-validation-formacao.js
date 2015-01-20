$(document).ready(function() {

	var base = $("#base").val();
	var verificamail = base+"inicio/verificaMail";


	$("#form-formacao").validate({
			rules: {
				instituicao:"required",
				tipo:"required",
				curso:"required",
				inicio:"required",
				fim:"required",
				status:"required",
				carga:"required",
				agree: "required"
			},
			messages: {
				instituicao:"Por favor digite o nome da instituição",
				tipo: "Selecione o tipo da formação",
				curso:"Por favor digite o nome do curso",
				inicio:"Por favor digite a data de inicio",
				fim:"Por favor digite a data de termino do curso",
				status:"Selecione o status do curso",
				carga:"Digite a Carga horária do curso",
				descricao:"Por favor digite uma descricao do curso",
				agree: "Please accept our policy"
			}
		});
});

$(document).ready(function() {

	var url=window.location.href;
	var verificaLogin = url.replace("cadastrar","verificalogin");
	$("#form-cadastro").validate({
			rules: {
				empresa: "required",
				contato: "required",
				cep:{
					required:true,
					
				},
				logradouro: {
					required: true,
				},
				numero:{
					required:true,
					number:true
				},
				bairro:{
					required:true
				},
				cidade:{
					required:true
				},
				
				estado:{
					required:true,
					maxlength: 2
				},
				telefone:{
					required:true
				},
				site:{
					required:true,
				},
				categorias:{
					required:true
				},
				login:{
					required:true,
				},

				senha: {
					required: true
				},
				status:{
					required:true
				},

				email: {
					required: true,
					email: true
				},

				descricao:{
					required:true
				},

				agree: "required"
			},
			messages: {
				empresa: "Por favor digite o nome da empresa",
				contato: "Por favor digite o nome de alguem para contato",
				email: {
      			required: "Por favor digite um e-mail para contato",
      			email: "Digite um e-mail valido"
    			},
				cep:"Por favor digite um cep valido",
				logradouro:"Por favor digite o endereço",
				numero:{
					required:"Por favor digite o numero da empresa",
					number:"Digite somente numeros"
				},
				bairro:{
					required:"Por favor digite o bairro"
				},
				cidade:{
					required:"Por favor digite a cidade"
				},
				estado:{
					required:"Por favor digite o Estado",
					maxlength:"O estado deve ter 2 digitos ex:SP"

				},
				telefone:"Por favor digite um telefone para contato",
				site:{
					required:"Por favor digite o site da empresa"
				},
				categorias:"Selecione a categoria da empresa",
				login:{
					required:"Por favor digite um login",
					},
				senha:"Por favor digite uma senha",
				status:"Selecione o status",
				descricao:"Digite uma descrição da empresa",

				agree: "Please accept our policy"
			}
		});
});

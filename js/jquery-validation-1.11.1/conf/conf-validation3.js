$(document).ready(function() {

	var base = $("#base").val();
	var verificaMail = base;

	jQuery.validator.addMethod("cnpj", function(cnpj, element) {
	   cnpj = jQuery.trim(cnpj);// retira espaços em branco
	   // DEIXA APENAS OS NÚMEROS
	   cnpj = cnpj.replace('/','');
	   cnpj = cnpj.replace('.','');
	   cnpj = cnpj.replace('.','');
	   cnpj = cnpj.replace('-','');
	 
	   var numeros, digitos, soma, i, resultado, pos, tamanho, digitos_iguais;
	   digitos_iguais = 1;
	 
	   if (cnpj.length < 14 && cnpj.length < 15){
	      return false;
	   }
	   for (i = 0; i < cnpj.length - 1; i++){
	      if (cnpj.charAt(i) != cnpj.charAt(i + 1)){
	         digitos_iguais = 0;
	         break;
	      }
	   }
	 
	   if (!digitos_iguais){
	      tamanho = cnpj.length - 2
	      numeros = cnpj.substring(0,tamanho);
	      digitos = cnpj.substring(tamanho);
	      soma = 0;
	      pos = tamanho - 7;
	 
	      for (i = tamanho; i >= 1; i--){
	         soma += numeros.charAt(tamanho - i) * pos--;
	         if (pos < 2){
	            pos = 9;
	         }
	      }
	      resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
	      if (resultado != digitos.charAt(0)){
	         return false;
	      }
	      tamanho = tamanho + 1;
	      numeros = cnpj.substring(0,tamanho);
	      soma = 0;
	      pos = tamanho - 7;
	      for (i = tamanho; i >= 1; i--){
	         soma += numeros.charAt(tamanho - i) * pos--;
	         if (pos < 2){
	            pos = 9;
	         }
	      }
	      resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
	      if (resultado != digitos.charAt(1)){
	         return false;
	      }
	      return true;
	   }else{
	      return false;
	   }
	}, "Informe um CNPJ válido."); // Mensagem padrão 


	jQuery.validator.addMethod("cpf", function(cpf, element) {
		 //Limpa pontos e Traços da string
 cpf = cpf.replace(/\./g, "");
 cpf = cpf.replace(/\-/g, "");
 cpf = cpf.replace(/\_/g, "");
 
 if(cpf.length!=11){ var result = false; };
 
 pri = eval(cpf.substring(0,3));
 seg = eval(cpf.substring(4,7));
 ter = eval(cpf.substring(8,11));
 qua = eval(cpf.substring(12,14));
 
 var i;
 var numero;
 
 numero = (pri+seg+ter+qua);
 
 c = cpf.substr(0,9);
 
 var dv = cpf.substr(9,2);
 
 var d1 = 0;
 
 for (i = 0; i < 9; i++){
 d1 += c.charAt(i)*(10-i);
 }
 
 if (d1 == 0){
 return  false;
 }
 
 d1 = 11 - (d1 % 11);
 if (d1 > 9) d1 = 0;
 
 if (dv.charAt(0) != d1){
	return false;
 }
 
 d1 *= 2;
 for (i = 0; i < 9; i++){
 d1 += c.charAt(i)*(11-i);
 }
 
 d1 = 11 - (d1 % 11);
 if (d1 > 9) d1 = 0;
 
 if (dv.charAt(1) != d1){
  return false;
 }
	return true;
		

	},"Informe um CPF Valido");

	$("#form-empresa").validate({
			rules: {
				empresa: "required",
				cnpj:{
					required:true,
					cnpj:true
				},
				telefone:{
					required:true
				},
				email: {
					required: true,
					email: true,
					remote:verificaMail
				},

				atuacao:"required",
				
			
				cep:{
					required:true,
					
				},
				
				endereco: {
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
			
				site:{
					required:true,
				},
				categorias:{
					required:true
				},
	

				senha: {
					required: true
				},
				status:{
					required:true
				},

				

				descricao:{
					required:true
				},

				agree: "required"
			},
			messages: {
				empresa: "Por favor digite o nome da empresa",
				cnpj:{
					required:"Por favor digite o CNPJ",
					cpf:"CNPJ Invalido"
				},
				telefone:"Por favor digite um telefone para contato",	
				email: {
				    required: "Por favor digite um e-mail para contato",
				    email: "Digite um e-mail valido",
				    remote:"E-mail já cadastrado"
				},
				atuacao:"Por favor selecione sua Área de Atuação",				
				cep:"Por favor digite um cep valido",
				endereco:"Por favor digite o endereço",
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
				senha:"Por favor digite uma senha",
				descricao:"Digite uma descrição da empresa",

				agree: "Please accept our policy"
			}
		});
});

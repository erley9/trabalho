$(document).ready(function() {

/*jQuery.validator.addMethod("cnpj", function(cnpj, element) {
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
 
 

	var url=window.location.href;
	var verificaLogin = url.replace("cadastrar","verificalogin");
	$("#form-anuncie").validate({
			rules: {
				empresa: "required",
				contato: "required",
				cnpj:{
					required:true,
					cnpj:true
				},
				cep:{
					required:true,
					number:true
					
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
				senha: {
					required: true
				},

				confirmacao:{
                    required: true,
                    equalTo: "#senha"
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
				contato: "Por favor digite o nome de um contato",
				cnpj:{
					required:"Por favor digite o cnpj",
					cnpj:"CNPJ Invalido"
				},
				email: {
      			required: "Por favor digite um e-mail para contato",
      			email: "Digite um e-mail valido"
    			},
				cep:{
					required:"Por favor digite um cep valido",
					number:"Digite somente numeros"
				},
				logradouro:"Por favor digite o endereço",
				numero:{
					required:"Por favor digite o numero",
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
				telefone:"Por favor digite um telefone",
				site:{
					required:"Por favor digite o site da empresa",
				},
				categorias:"Selecione a categoria da empresa",
				login:{
					required:"Por favor digite um login",
					remote:"Login já Cadastrado"
					},
				senha:"Por favor digite uma senha",
				confirmacao:{
					required:"Por favor repita a senha",
					equalTo:"Senha diferente"

				},
				status:"Selecione o status",
				descricao:"Digite uma descrição da empresa",

				agree: "Please accept our policy"
			},
			submitHandler: function(form) {
                  console.log("foi");
          }
		});*/
});

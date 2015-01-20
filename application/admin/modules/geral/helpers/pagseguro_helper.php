<?php
require_once("PagSeguroLibrary/PagSeguroLibrary.php");


function geraPagamento(array $credencial, array $produto, array $dadosComprador, array $endereco, $url){
	$paymentRequest = new PagSeguroPaymentRequest();


	$paymentRequest->addItem('1', $produto["nome"], $produto["quantidade"], $produto["valor"]);  
	


	//dados do comprador
	$paymentRequest->setSender(
		$dadosComprador["nome"],
		$dadosComprador["email"],
		$dadosComprador["ddd"],
		$dadosComprador["telefone"]
		);

	
	//endereço do comprador
	$paymentRequest->setShippingAddress(
		$endereco["cep"],
		$endereco["logradouro"],
		$endereco["numero"],
		$endereco["bairro"],
		$endereco["cidade"],
		$endereco["uf"],
		'BRA'
		);  

	//especifica a url
	$paymentRequest->addParameter('notificationURL', $url); 

	
	//especifica a moeda
	$paymentRequest->setCurrency("BRL");  



	//especifica as credeciais
	$credentials = new PagSeguroAccountCredentials($credencial["email"],$credencial["token"]);

	//cria a pagina de requisição do pagseguro
	$url = $paymentRequest->register($credentials); 

	//envia pro pagseguro
	header("Location:{$url}");  

}


?>
<?php
require_once("PagSeguroLibrary/PagSeguroLibrary.php");


function geraPagamento(array $credencial, array $produto, array $dadosComprador, array $endereco, $frete){
	$paymentRequest = new PagSeguroPaymentRequest();



	foreach ($produto as $item) {
			$paymentRequest->addItem($item["id"], $item["nome"], $item["quantidade"], $item["valor"],$item["peso"]); 
	}


 
	


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
		$endereco["complemento"],
		$endereco["bairro"],
		$endereco["cidade"],
		$endereco["uf"],
		'BRA'
		);
	//tipo de frete

	$shipping = new PagSeguroShipping();

	$type = new PagSeguroShippingType(3); 
	$shipping->setType($type);  

	$shipping->setCost($frete);  

	$paymentRequest->setShipping($shipping);      


	
	//especifica a moeda
	$paymentRequest->setCurrency("BRL");  



	//especifica as credeciais
	$credentials = new PagSeguroAccountCredentials($credencial["email"],$credencial["token"]);

	//cria a pagina de requisição do pagseguro
	$url = $paymentRequest->register($credentials); 

	//envia pro pagseguro
	header("Location:{$url}");  

}




function buscaTransacao($transacao){

	/* Definindo as credenciais  */      
	$credentials = new PagSeguroAccountCredentials(        
	    'fernando@agenciacriativaimagem.com.br',         
	    'B7D3B99A04B7403BBD10E4A68AF492B7'        
	);    
	    
	/* Código identificador da transação  */      
	$transaction_id = $transacao;    
	    
	/*   
	    Realizando uma consulta de transação a partir do código identificador   
	    para obtero o objeto PagSeguroTransaction  
	*/     
	$transaction = PagSeguroTransactionSearchService::searchByCode(    
	    $credentials,    
	    $transaction_id    
	);  
	  

	return $transaction;  
	

}

function traduzStatus($status){

	$statusTraducao=
	array(
		'WAITING_PAYMENT' => "AGUARDANDO PAGAMENTO",
		'IN_ANALYSIS' => "EM ANALISE",
		'PAID' => "PAGO",
		'AVAILABLE' => "DISPONIVEL",
		'IN_DISPUTE' => "EM DISPUTA",
		'REFUNDED' => "DEVOLVIDO",
		'CANCELLED' => "CANCELADO"
	 );

	return $statusTraducao[$status];

}


function atualizaTransacao(){
	/* Definindo as credenciais  */    
$credentials = new PagSeguroAccountCredentials(      
    'felipedeliberalibrunheroto@gmail.com',       
    'F9D85EF0BB974BDE9819733ECFDFDEB5'      
);  
  
/* Tipo de notificação recebida */  
$type = $_POST['notificationType'];  
  
/* Código da notificação recebida */  
$code = $_POST['notificationCode'];  
  
  
/* Verificando tipo de notificação recebida */  
if ($type === 'transaction') {  
      
    /* Obtendo o objeto PagSeguroTransaction a partir do código de notificação */  
    $transaction = PagSeguroNotificationService::checkTransaction(  
        $credentials,  
        $code // código de notificação  
    );  

    return $transaction;


      
}  

}


?>
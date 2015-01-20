<?php

function formataData($data){

	$dataexplodida = explode("-", $data);

	$dia=$dataexplodida[2];
	$mes=$dataexplodida[1];
	$ano=$dataexplodida[0];

	$dataFormatada = $dia."/".$mes."/".$ano;


	return $dataFormatada;
}

function formataData2($data){

	$dataexplodida = explode("-", $data);

	$dia=$dataexplodida[2];
	$mes=$dataexplodida[1];
	$ano=$dataexplodida[0];

	$dataFormatada = $dia."/".$mes;


	return $dataFormatada;
}

function formataDataHora($data){

	$date = date_create($data);
	return date_format($date, 'd/m/Y H:i:s');
}

function formataDataHora2($data){

	$date = date_create($data);
	return date_format($date, 'd/m/y H:i');
}

function formataDataHora3($data){

	$date = date_create($data);
	return date_format($date, 'd/m');

}

function formataDataHora5($data){

	$date = date_create($data);
	return date_format($date, 'd/m/Y');
}



function comparaData($dataAtual,$dataExpiracao){

	$valor="";

	if(strtotime($dataAtual) > strtotime($dataExpiracao)){
		$valor = "maior";
	}else{
		$valor = "menor";
	}


	return $valor;
	

}


function dias($mes,$ano){

	$mês = mktime( 0, 0, 0, $mes, 1, $ano );  
	 setlocale(LC_ALL, 'pt_BR'); 
	 return date("t",$mês);

}


?>
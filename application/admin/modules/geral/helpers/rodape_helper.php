<?php

function buscaListagemAndamento(){

	$ci= get_instance();

	$ci->load->model("geral/obras_model","obras");
	

	$obras = $ci->obras->buscaObrasEmAndamento(10)->result();

	foreach ($obras as $obra) {
		echo "
		<li>
		    <a href=''>{$obra->titulo}</a>
		</li>
		";
	}

}

function buscaListagemConcluidas(){

	$ci= get_instance();

	$ci->load->model("geral/obras_model","obras");
	

	$obras = $ci->obras->buscaObrasConcluidas(10)->result();

	foreach ($obras as $obra) {
		echo "
		<li>
		    <a href=''>{$obra->titulo}</a>
		</li>
		";
	}

}

function buscaListagemClientes(){

	$ci= get_instance();

	$ci->load->model("geral/clientes_model","clientes");
	

	$clientes = $ci->clientes->buscaClientes(10)->result();

	foreach ($clientes as $cliente) {
		echo "
		<li>
		    <a href=''>{$cliente->nome}</a>
		</li>
		";
	}

}

?>


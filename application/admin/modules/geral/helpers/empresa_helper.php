<?php

function listaEmpresaChat($id){
	 $ci= get_instance();

	 $ci->load->model("geral/favoritos_model","favoritos");
	 $ci->load->model("geral/clientes_model");

	 $resultado = $ci->favoritos->listaFavoritos($id)->result();

	 $lista="";

	 foreach ($resultado as $linha) {

	 	$clientes = $ci->clientes_model->get_byID($linha->favoritosfk)->row();

	 	$lista.="<li class='abrir' id='janela".$clientes->id."' usuario='".$clientes->id."'>";
	 				
	 	if($clientes->logado == "sim"){
		$lista .="<span class='logado status'></span>";
		}else{
		$lista .="<span class='deslogado status'></span>";	
		}


		$nome ="";

			if(strlen($clientes->empresa_nome) > 15){
				$nome = substr($clientes->empresa_nome, 0,15)."...";
			}else{
				$nome = $clientes->empresa_nome;
			}


		$lista.="

	 	<img src='".base_url("img/logos/{$clientes->logo}")."' alt='' />
	 
	 	<span>".$nome."</span>";

	 	$lista.="</li>";
	 }

	 return $lista;

}

function verificaStatus($id){
	 $ci= get_instance();

	 $ci->load->model("geral/clientes_model");

	 $clientes = $ci->clientes_model->get_byID($id)->row();

	 if($clientes->logado == "sim"){
	 	return "logado";
	 }else{
	 	return "deslogado";
	 }

}



?>
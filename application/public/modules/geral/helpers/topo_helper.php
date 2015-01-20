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


?>


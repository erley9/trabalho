<?php

function geraListaPaginas(){

	$ci= get_instance();

	$ci->load->model("geral/paginas_model","paginas");
	

	$paginas = $ci->paginas->get_all()->result();

	$select = "<select id='paginas' name='paginas'>";


			$select .= "<option value=''>Selecione a pagina</option>";


			foreach ($paginas as $pagina) {
				$select .="<option value='".$pagina->id."'>".$pagina->pagina."</option>";
			}


	$select .="</select>";


	return $select;


}




function geraListaPaginaSelecionada($id){

	$ci= get_instance();

	$ci->load->model("geral/paginas_model","paginas");
	

	$paginas = $ci->paginas->get_all()->result();

	$select = "<select id='paginas' name='paginas'>";


			$select .= "<option value=''>Selecione a pagina</option>";


			foreach ($paginas as $pagina) {

				if($id == $pagina->id){
					$select .="<option value='".$pagina->id."' selected>".$pagina->pagina."</option>";
				}else{
					$select .="<option value='".$pagina->id."'>".$pagina->pagina."</option>";
				}
			}


	$select .="</select>";


	return $select;


}

?>


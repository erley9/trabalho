<?php

function montaSelect($lista,$name,$id,$textooption,$campo1,$campo2){

	$select = "<select id='".$id."' name='".$name."'>";

	$select .="<option value=''>{$textooption}</option>";

	foreach ($lista as $item) {


		$select .="<option value='".$item->$campo1."'>".$item->$campo2."</option>";
		
	}


	$select .="</select>";


	return $select;

	

}


function montaSelectclass($lista,$name,$id,$textooption,$campo1,$campo2,$class){

	$select = "<select id='".$id."' name='".$name."' class='".$class."'>";

	$select .="<option value=''>{$textooption}</option>";

	$select .="<option value='todos'>Todos os Estados</option>";

	foreach ($lista as $item) {


		$select .="<option value='".$item->$campo1."'>".$item->$campo2."</option>";
		
	}


	$select .="</select>";


	return $select;

	

}



function montaSelectSelecionado($lista,$name,$id,$textooption,$campo1,$campo2,$idlista){

	$select = "<select id='".$id."' name='".$name."'>";

	$select .="<option value=''>{$textooption}</option>";

	foreach ($lista as $item) {

		if($item->id == $idlista){

				$select .="<option value='".$item->$campo1."' selected>".$item->$campo2."</option>";

		}else{
				$select .="<option value='".$item->$campo1."'>".$item->$campo2."</option>";
		}


	
		
	}


	$select .="</select>";


	return $select;

	

}

function montaSelectSelecionado2($lista,$name,$id,$textooption,$campo1,$campo2,$idlista,$comparacao){

	$select = "<select id='".$id."' name='".$name."'>";

	$select .="<option value=''>{$textooption}</option>";

	foreach ($lista as $item) {

		if($item->$comparacao == $idlista){

				$select .="<option value='".$item->$campo1."' selected>".$item->$campo2."</option>";

		}else{
				$select .="<option value='".$item->$campo1."'>".$item->$campo2."</option>";
		}


	
		
	}


	$select .="</select>";


	return $select;

	

}


function montaSelectEstados(){

	 $ci= get_instance();

	 $ci->load->model("geral/estados_model","estados");

	 $estados = $ci->estados->get_all()->result();
	 
	 $select = montaSelectclass($estados,"estados","estados","Estado","sigla","sigla","select-verdadeiro");

	 return $select;
}



?>


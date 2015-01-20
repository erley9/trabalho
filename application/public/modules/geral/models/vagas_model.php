<?php

require_once("crud_model.php");

class vagas_model extends Crud_model{
   

public function __construct() {
    parent::__construct();
    $this->tabela="vagas";
    $this->controller="vagas";
}

public function buscaVagasCadastradas($empresa){

	$this->db->where("empresafk",$empresa);
	return $this->db->get($this->tabela);

}

public function buscaVagas($filtros){

	if(!empty($filtros["cargos"])){

		$contador = 0;

		foreach ($filtros["cargos"] as $key => $value) {
			
			if($contador == 0){

				$this->db->like("cargo",$value);

			}else{

				$this->db->or_like("cargo",$value);

			}

			$contador ++;
		}

	}


	if(!empty($filtros["areas"])){

		$contador = 0;

		foreach ($filtros["areas"] as $key => $value) {
			if($contador == 0){

				$this->db->or_like("area", $value);
			}else{
				$this->db->like("area",$value);
			}

			$contador ++;
		}
	}


	if(!empty($filtros["estados"])){

		$contador = 0;

		foreach ($filtros["estados"] as $key => $value) {
			if($contador == 0){

				if(count($filtros["estados"]) == 1 && $value == "todos" ){

					break;

				}else{

				$this->db->where("estado", $value);

			}
			}else{
				$this->db->or_where("estado",$value);
			}

			$contador ++;
		}
	}

	if(!empty($filtros["faixas"])){

		$contador = 0;

		foreach ($filtros["faixas"] as $key => $value) {
			if($contador == 0){



					$this->db->where("salario", $value);

				
			}else{
				$this->db->or_where("salario",$value);
			}

			$contador ++;
		}
	}

	if(!empty($filtros["periodos"])){

		$contador = 0;

		foreach ($filtros["periodos"] as $key => $value) {
			if($contador == 0){

				$this->db->where("periodo", $value);
			}else{
				$this->db->or_where("periodo",$value);
			}

			$contador ++;
		}
	}


	return $this->db->get($this->tabela);
}


public function buscaVagas2($filtros){

	if(!empty($filtros["cargos"])){

		$contador = 0;

		foreach ($filtros["cargos"] as $key => $value) {
			
			if($contador == 0){

				$this->db->where("cargo",$value);

			}else{

				$this->db->or_where("cargo",$value);

			}

			$contador ++;
		}

	}


	if(!empty($filtros["areas"])){

		$contador = 0;

		foreach ($filtros["areas"] as $key => $value) {
			if($contador == 0){

				$this->db->where("area", $value);
			}else{
				$this->db->or_where("area",$value);
			}

			$contador ++;
		}
	}


	if(!empty($filtros["estados"])){

		$contador = 0;

		foreach ($filtros["estados"] as $key => $value) {
			if($contador == 0){

				if(count($filtros["estados"]) == 1 && $value == "todos" ){

					break;

				}else{

				$this->db->where("estado", $value);

			}
			}else{
				$this->db->or_where("estado",$value);
			}

			$contador ++;
		}
	}

	if(!empty($filtros["faixas"])){

		$contador = 0;

		foreach ($filtros["faixas"] as $key => $value) {
			if($contador == 0){



					$this->db->where("salario", $value);

				
			}else{
				$this->db->or_where("salario",$value);
			}

			$contador ++;
		}
	}

	if(!empty($filtros["periodos"])){

		$contador = 0;

		foreach ($filtros["periodos"] as $key => $value) {
			if($contador == 0){

				$this->db->where("periodo", $value);
			}else{
				$this->db->or_where("periodo",$value);
			}

			$contador ++;
		}
	}


	return $this->db->get($this->tabela);
}

public function buscaVagasLimitadas(){

	$this->db->order_by("data","desc");
	$this->db->limit(15);
	return $this->db->get($this->tabela);
}



}

?>

<?php

require_once("crud_model.php");

class curriculos_model extends Crud_model{
   

public function __construct() {
    parent::__construct();
    $this->tabela="curriculos";
    $this->controller="curriculos";
}

public function buscaCurriculoCandidato($usuario){
	$this->db->where("usuariofk",$usuario);
	
	return $this->db->get($this->tabela);
}

public function buscaCurriculoporCargo($cargo,$curriculufk){

	$this->db->like("cargo",$cargo);

	$this->db->where("curriculofk",$curriculufk);
	
	return $this->db->get("objetivo_profissional");

}



public function buscaVagas($filtros){

	

	if(!empty($filtros["atuacao"])){

		$contador = 0;

		foreach ($filtros["atuacao"] as $key => $value) {
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



					$this->db->where("faixa_salarial", $value);

				
			}else{
				$this->db->or_where("faixa_salarial",$value);
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


	$resultados =  $this->db->get($this->tabela);

	$curriculos = array();

	foreach ($resultados->result() as $curriculo) {
		

		foreach ($filtros["cargos"] as $key => $value) {
			

			$existe = $this->buscaCurriculoporCargo($value,$curriculo->id);

			if($existe->num_rows() > 0){

				$curriculos[] = $curriculo;
				break;
			}

		}
		

	}

	return $curriculos;
}


public function buscaCurriculoporNome($nome){

	$this->db->like("nome",$nome);
	$this->db->or_like("sobrenome",$nome);

	return $this->db->get($this->tabela);
}



}

?>

<?php

require_once("crud_model.php");

class post_model extends Crud_model{
   

public function __construct() {
    parent::__construct();
    $this->tabela="post";
    $this->controller="post";
}


public function postCliente($id){


	$this->db->where("enviado",$id);
	$this->db->or_where("recebido",$id);

	$this->db->order_by("id","desc");

	$this->db->limit("200");

	return $this->db->get($this->tabela);

}


public function buscaEnviados($id){

	$this->db->where('enviado',$id);

	$this->db->order_by("id","desc");

	return $this->db->get($this->tabela);
}

public function buscaRecebidos($id){

	$this->db->where('recebido',$id);

	$this->db->order_by("id","desc");

	return $this->db->get($this->tabela);
}

public function buscaPostNoticias($id){

	$this->db->where('tipo','noticia');

	$this->db->where('enviado',$id);

	$this->db->order_by("id","desc");

	return $this->db->get($this->tabela);

}

public function buscaPostAnuncios(){


	$this->db->where('tipo','anuncio');

	$this->db->order_by("id","desc");

	return $this->db->get($this->tabela);

}


public function BuscaAnuncioTitulo($titulo){

	$this->db->where("titulo",$titulo);

	return $this->db->get($this->tabela);

}





    
}

?>

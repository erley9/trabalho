<?php

require_once("crud_model.php");

class topicos_model extends Crud_model{
   

public function __construct() {
    parent::__construct();
    $this->tabela="topicos";
    $this->controller="topicos";
}

public function buscaTopicosEmpresa($id){
	$this->db->where("enviado",$id);
	
	$this->db->or_where("recebido",$id);

	$this->db->order_by("id","desc");

	$this->db->limit("10");

	$this->db->group_by("postfk");

	return $this->db->get($this->tabela);
}

public function buscaTopicosEmpresaLimit($id,$inicio,$quantidade){
	$this->db->where("enviado",$id);
	
	$this->db->or_where("recebido",$id);

	$this->db->order_by("id","desc");

	$this->db->limit($quantidade,$inicio);

	$this->db->group_by("postfk");

	return $this->db->get($this->tabela);
}

public function buscaEnviados($id){

	return $this->db->query("select * from post inner join topicos on topicos.postfk = post.id where topicos.enviado=$id and post.tipo='orcamento'");
}

public function buscaEnviados2($id){

	return $this->db->query("select * from post inner join topicos on topicos.postfk = post.id where topicos.enviado=$id and post.tipo='orcamento' limit 10");

}

public function buscaEnviadosLimit($id,$inicio,$quantidade){

	return $this->db->query("select * from post inner join topicos on topicos.postfk = post.id where topicos.enviado=$id and post.tipo='orcamento' limit $inicio,$quantidade");

}

public function buscaRecebidos($id){

return $this->db->query("select * from post inner join topicos on topicos.postfk = post.id where topicos.recebido=$id and post.tipo='orcamento'");

}

public function buscaRecebidos2($id){

return $this->db->query("select * from post inner join topicos on topicos.postfk = post.id where topicos.recebido=$id and post.tipo='orcamento' limit 10");

}

public function buscaRecebidosLimit($id,$inicio,$quantidade){

return $this->db->query("select * from post inner join topicos on topicos.postfk = post.id where topicos.recebido=$id and post.tipo='orcamento' limit $inicio,$quantidade");

}



public function buscaTopicoPorPost($id){

	$this->db->where("postfk",$id);
	return $this->db->get($this->tabela);

}

public function pegaIDTopicoPorMensagem($id){

	return $this->db->query("
		SELECT topicos.*
		FROM topicos
		INNER JOIN post ON topicos.postfk = post.id
		INNER JOIN mensagens ON mensagens.postfk = post.id
		WHERE mensagens.id =$id");
}
 
}

?>

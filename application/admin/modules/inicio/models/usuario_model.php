<?php

class usuario_model extends Crud_model{
    protected $tabela="usuario";

    public function verificalogin($login=null,$senha=null){
        if($login!=null || $senha!=null){
    	$this->db->where('login', $login);
        $this->db->where('senha', $senha);
        $resultado = $this->db->get($this->tabela);
        if($resultado->num_rows()>0){
            $dados = $resultado->result();
            $sessiondados = array('id'=>$dados->id,'usuario'=>$dados->login,'status'=>"logado");
            $this->session->set_userdata($sessiondados);
            return true;
        }else{
            return false;
        }
        }else{
            return false;
        }
 
    }
    
    
    
}

?>

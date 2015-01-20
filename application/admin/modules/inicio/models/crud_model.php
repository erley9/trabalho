<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crud_model extends CI_Model{
    
    protected $tabela;

    public function do_insert($dados=NULL){
		if($dados!=NULL){
			$this->db->insert($this->tabela,$dados);
		}
	}

	public function get_all(){
		return $this->db->get($this->tabela);
	}

	public function do_update($dados=NULL,$condicao=NULL){
		if($dados!=NULL && $condicao!=NULL){
			$this->db->update($this->tabela,$dados,$condicao);
			$this->session->set_flashdata("edicaook","Cadastro alterado com sucesso");
			redirect(current_url());
		}

	}

	public function get_byID($id=''){
		if($id!=''){
			$this->db->where("id",$id);
			$this->db->limit(1);
			return $this->db->get($this->tabela);
		}else{
			return FALSE;
		}
	}

	public function do_delete($condicao=NULL){
		if($condicao!=NULL){
			$this->db->delete($this->tabela,$condicao);
			$this->session->set_flashdata("excluirok","Registro deletado com sucesso");
			redirect("crud/retrieve");
		}
	}

}
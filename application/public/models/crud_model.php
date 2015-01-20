<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crud_model extends CI_Model{
    
    protected $tabela;

    public function do_insert($dados=NULL){
		if($dados!=NULL){
			$this->db->insert("cliente",$dados);
		}
	}

	public function get_all(){
		return $this->db->get('cliente');
	}

	public function do_update($dados=NULL,$condicao=NULL){
		if($dados!=NULL && $condicao!=NULL){
			$this->db->update('cliente',$dados,$condicao);
			$this->session->set_flashdata("edicaook","Cadastro alterado com sucesso");
			redirect(current_url());
		}

	}

	public function get_byID($id=''){
		if($id!=''){
			$this->db->where("id",$id);
			$this->db->limit(1);
			return $this->db->get('cliente');
		}else{
			return FALSE;
		}
	}

	public function do_delete($condicao=NULL){
		if($condicao!=NULL){
			$this->db->delete("cliente",$condicao);
			$this->session->set_flashdata("excluirok","Registro deletado com sucesso");
			redirect("crud/retrieve");
		}
	}

}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contato extends CI_Controller {


        private $dados=Array();

        public function __construct() {
            parent::__construct();

                if(isset($_SESSION["logado"])){
            if( $_SESSION["logado"] != true){
                $this->session->set_flashdata('status', 'Sessão Expirou');
                redirect("adm");
            }
            }

            $this->load->model("geral/contato_model","empresa");
          
        }
        
	public function index()
	{
        $empresa = $this->empresa->get_byID(1)->row();

        $dados = array('empresa' => $empresa);
      
		$this->load->view("listar",$dados);
	}

    public function alterar(){
        $post = $_POST;

        $dados = array(
            "endereco" => $post["endereco"],
            "endereco2" => $post["endereco2"],
            "telefone" => $post["telefone"]
            );

        $condicao = array('id' => 1);

        $this->empresa->do_update($dados,$condicao);

        $this->session->set_flashdata("status","Dados Empresa Alterado com Sucesso");

        redirect("contato");
    }
        
   


}


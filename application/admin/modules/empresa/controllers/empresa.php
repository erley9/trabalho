<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Empresa extends CI_Controller {


        private $dados=Array();

        public function __construct() {
            parent::__construct();

                if(isset($_SESSION["logado"])){
            if( $_SESSION["logado"] != true){
                $this->session->set_flashdata('status', 'Sessão Expirou');
                redirect("adm");
            }
            }

            $this->load->model("geral/sobre_model","empresa");
          
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
            'sobre'=>$post["sobre"],
            'qualificacoes'=>$post["qualificacoes"],
            'estrutura'=>$post["estrutura"],
            'funcionarios'=>$post["funcionarios"],
            'missao'=>$post["missao"],
            'visao'=>$post["visao"],
            'objetivos'=>$post["objetivos"],
            'politica'=>$post["politica"],
            'processos'=>$post["processos"]
            );

        $condicao = array('id' => 1);

        $this->empresa->do_update($dados,$condicao);

        $this->session->set_flashdata("status","Dados Empresa Alterado com Sucesso");

        redirect("empresa");
    }
        
   


}


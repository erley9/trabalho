<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Faixas extends CI_Controller {


        private $dados=Array();

        public function __construct() {
            parent::__construct();

    if(isset($_SESSION["logado"])){
            if( $_SESSION["logado"] != true){
                $this->session->set_flashdata('status', 'Sessão Expirou');
                redirect("adm");
            }
            }

            $this->load->model("geral/faixa_model","atividades");
            
          
        }
        
	public function index()
	{
        $resultado = $this->atividades->get_all();
        $dados = array('lista' => $resultado);
        $this->load->view("listar",$dados);
	}
        
        public function cadastrar(){
            
            if(isset($_POST["nome"])){

                $post = $_POST;

                $dados = array('id' =>  null , "valor" => $post["nome"]);

                $this->atividades->do_insert($dados);

                $this->session->set_flashdata("status","Atividade Cadastrada com Sucesso");
                redirect("faixas");
            
               
            }else{
                 $this->load->view("cadastrar",$this->dados);
            }
           
        }
        
        public function excluir(){
            $id=$this->uri->segment(3);
            $condicao = array("id"=>$id);
            $this->atividades->do_delete($condicao);
            $this->session->set_flashdata("status","Atividade Excluida com Sucesso");
            redirect("faixas");
            
        }

        public function editar(){
            if(isset($_POST['id'])){

                $post = $_POST;

                $dados = array('valor' => $post["nome"]);

                $condicao = array('id' => $post["id"] );


                $this->atividades->do_update($dados,$condicao);

                $this->session->set_flashdata("status","Atividade Alterado com Sucesso");
                redirect("faixas");
               
            }else{

            $id = $this->uri->segment(3);
            $resultado = $this->atividades->get_byID($id);
            $dados["cliente"] = $resultado->row(); 
            $this->load->view("editar",$dados);
        }


        }

       
        


}


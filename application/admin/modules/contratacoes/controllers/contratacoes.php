<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contratacoes extends CI_Controller {


        private $dados=Array();

        public function __construct() {
            parent::__construct();

               if(isset($_SESSION["logado"])){
            if( $_SESSION["logado"] != true){
                $this->session->set_flashdata('status', 'Sessão Expirou');
                redirect("adm");
            }
            }

            $this->load->model("geral/tipo_contratacao_model","atividades");
            
          
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

                $dados = array('id' =>  null , "tipo" => $post["nome"]);

                $this->atividades->do_insert($dados);

                $this->session->set_flashdata("status","Tipo Cadastrada com Sucesso");
                redirect("contratacoes");
            
               
            }else{
                 $this->load->view("cadastrar",$this->dados);
            }
           
        }
        
        public function excluir(){
            $id=$this->uri->segment(3);
            $condicao = array("id"=>$id);
            $this->atividades->do_delete($condicao);
            $this->session->set_flashdata("status","Tipo de Contratação Excluido com Sucesso");
            redirect("contratacoes");
            
        }

        public function editar(){
            if(isset($_POST['id'])){

                $post = $_POST;

                $dados = array('tipo' => $post["nome"]);

                $condicao = array('id' => $post["id"] );


                $this->atividades->do_update($dados,$condicao);

                $this->session->set_flashdata("status","Tipo Alterado com Sucesso");
                redirect("contratacoes");
               
            }else{

            $id = $this->uri->segment(3);
            $resultado = $this->atividades->get_byID($id);
            $dados["cliente"] = $resultado->row(); 
            $this->load->view("editar",$dados);
        }


        }

       
        


}


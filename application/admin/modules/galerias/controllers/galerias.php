<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Galerias extends CI_Controller {


        private $dados=Array();

        public function __construct() {
            parent::__construct();

            if($this->session->userdata('status')!="logado"){
                $this->session->set_flashdata('status', 'Sessão Expirou');
                redirect("adm");
            }

            $this->load->model("geral/galeria_model","galeria");
          
        }
        
	public function index()
	{
        $resultado = $this->galeria->get_all();
        $dados = array('lista' => $resultado);
		$this->load->view("listar",$dados);
	}
        
        public function cadastrar(){
            
            if(isset($_POST["nome"])){
              
                $nome=$_POST["nome"];
                $dados = array('id'=>NULL,"nome"=>$nome);
                $this->galeria->do_insert($dados);
                $this->session->set_flashdata("status","Galeria Cadastrada com Sucesso");
                redirect("galerias");
                 
            }else{
                 $this->load->view("cadastrar");
            }
           
        }
        
        public function excluir(){
            $id=$this->uri->segment(3);
            $lista = $this->galeria->get_byID($id);
            $condicao = array("id"=>$id);
            $this->galeria->do_delete($condicao);
            $this->session->set_flashdata("status","Galeria Excluida com Sucesso");
            redirect("galerias");
            
        }

        public function editar(){
            if(isset($_POST['nome'])){
             
                $categoria=$_POST["nome"];
                $id=$_POST["id"];
                 
                        $dados = array('nome'=>$categoria);
                        $condicao=array('id'=>$id);
                        $this->galeria->do_update($dados,$condicao);
                        $this->session->set_flashdata('status',"Galeria alterada com sucesso");
                        redirect("galerias");
                
                 

            }else{
            $id = $this->uri->segment(3);
            $resultado = $this->galeria->get_byID($id);
            $dados = array('lista' => $resultado->row()); 
            $this->load->view("editar",$dados);
        }

        }

     
        


}


<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Instrutores extends CI_Controller {


        private $dados=Array();

        public function __construct() {
            parent::__construct();

            if($this->session->userdata('status')!="logado"){
                $this->session->set_flashdata('status', 'Sessão Expirou');
                redirect("adm");
            }

          $this->load->model("geral/instrutores_model","instrutores");
          
        }
        
	public function index()
	{
        $resultado = $this->instrutores->get_all();
        $dados = array('lista' => $resultado);
        $this->load->view("listar",$dados);
	}
        
        public function cadastrar(){
            
            if(isset($_POST["nome"])){
                $post=$_POST;
                
                    $config['upload_path'] = '../img/instrutores';
                    $config['allowed_types'] = 'gif|jpg|png';
            
                    

                    $this->load->library('upload', $config);
                    
                    $campo = "logo";

                    if (!$this->upload->do_upload($campo)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('status', 'Erro ao enviar o arquivo, o arquivo deve ser de no maximo 170px de largura e nos formato jpg/png/gif');
                        redirect("banner");
                    } else {
                        $data = $this->upload->data();
                        $dados = array("id"=>NULL,"nome"=>$post["nome"],"foto"=>$data["file_name"]);
                        $this->instrutores->do_insert($dados);
                        $this->session->set_flashdata('status', 'Instrutor Cadastrado com sucesso!');
                        redirect("instrutores");
                    }
               
            }else{
                 $this->load->view("cadastrar",$this->dados);
            }
           
        }
        
        public function excluir(){
            $id=$this->uri->segment(3);
            $lista = $this->instrutores->get_byID($id);
            $resultado = $lista->row();
            $arquivo="../img/instrutores/".$resultado->foto;
            
            if(file_exists($arquivo)){
                unlink($arquivo);
            }
            $condicao = array("id"=>$id);
            $this->instrutores->do_delete($condicao);
            $this->session->set_flashdata("status","Instrutor Excluido com Sucesso");
            redirect("instrutores");
            
        }

        public function editar(){
            if(isset($_POST['id'])){
                if(!empty($_FILES['logo']['name'])){


                    $post=$_POST;
                
                    $config['upload_path'] = '../img/instrutores';
                    $config['allowed_types'] = 'gif|jpg|png';
                    

                    $this->load->library('upload', $config);
                    
                    $campo = "logo";

                    if (!$this->upload->do_upload($campo)) {
                        $error = array('error' => $this->upload->display_errors());
                        print_r($error);
                        //$this->session->set_flashdata('status', 'Erro ao enviar o arquivo, o arquivo deve ser de no maximo 170px de largura e nos formato jpg/png/gif');
                        //redirect("banner");
                    } else {
                        $data = $this->upload->data();
                        $valores = array("nome"=>$post["nome"],"foto"=>$data["file_name"]);
                        $condicao = array('id' => $post["id"]);
                        $this->instrutores->do_update($valores,$condicao);
                        $this->session->set_flashdata('status', 'Instrutor Alterado com sucesso');
                        redirect("instrutores");
                    }


                }else{  
                        $post=$_POST;
                        $valores = array("nome"=>$post["nome"]);
                        $condicao = array('id' => $post["id"]);
                        $this->instrutores->do_update($valores,$condicao);
                        $this->session->set_flashdata('status', 'Instrutor Alterado com sucesso');
                        redirect("instrutores");

                }
            }else{
            $id = $this->uri->segment(3);
            $resultado = $this->instrutores->get_byID($id);
            $dados["cliente"] = $resultado->row(); 
            $this->load->view("editar",$dados);
        }

        }
        


}


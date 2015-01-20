<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Obras extends CI_Controller {


        private $dados=Array();

        public function __construct() {
            parent::__construct();

            if($this->session->userdata('status')!="logado"){
                $this->session->set_flashdata('status', 'Sessão Expirou');
                redirect("adm");
            }

            $this->load->model("geral/obras_model","obras");
      
          
        }
        
	public function index()
	{
        $resultado = $this->obras->get_all();
        $dados = array('lista' => $resultado);
        $this->load->view("listar",$dados);
	}
        
        public function cadastrar(){
            
            if(isset($_POST["titulo"])){
                $dados=$_POST;
                
                    $config['upload_path'] = '../img/obras';
                    $config['allowed_types'] = 'gif|jpg|jpeg|png';
            
                    

                    $this->load->library('upload', $config);
                    
                    $campo = "logo";

                    if (!$this->upload->do_upload($campo)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('status', 'Erro ao enviar o arquivo, o arquivo deve ser de no maximo 170px de largura e nos formato jpg/png/gif');
                        print_r($error);
                    } else {
                        $data = $this->upload->data();
                        $dados = array("id"=>NULL,"titulo"=>$dados["titulo"],"descricao"=>$dados["descricao"],"imagem"=>$data["file_name"],"status"=>$dados["status"]);
                        $this->obras->do_insert($dados);
                        $this->session->set_flashdata('status', 'Obra Cadastrada com sucesso!');
                        redirect("obras");
                    }
               
            }else{
                 $this->load->view("cadastrar",$this->dados);
            }
           
        }
        
        public function excluir(){
            $id=$this->uri->segment(3);
            $lista = $this->obras->get_byID($id);
            $resultado = $lista->row();
            $arquivo="../img/obras/".$resultado->imagem;
            
            if(file_exists($arquivo)){
                unlink($arquivo);
            }
            $condicao = array("id"=>$id);
            $this->obras->do_delete($condicao);
            $this->session->set_flashdata("status","Obra Excluida com Sucesso");
            redirect("obras");
            
        }

        public function editar(){
            if(isset($_POST['titulo'])){
                if(!empty($_FILES['logo']['name'])){


                    $post=$_POST;
                
                    $config['upload_path'] = '../img/obras';
                    $config['allowed_types'] = 'gif|jpg|jpeg|png';
                 

                    $this->load->library('upload', $config);
                    
                    $campo = "logo";

                    if (!$this->upload->do_upload($campo)) {
                        $error = array('error' => $this->upload->display_errors());
                        print_r($error);
                        //$this->session->set_flashdata('status', 'Erro ao enviar o arquivo, o arquivo deve ser de no maximo 170px de largura e nos formato jpg/png/gif');
                        //redirect("banner");
                    } else {
                        $data = $this->upload->data();
                        $valores = array("titulo"=>$post["titulo"],"imagem"=>$data["file_name"],"descricao"=>$post["descricao"],"status"=>$post["status"]);
                        $condicao = array('id' => $post["id"]);
                        $this->obras->do_update($valores,$condicao);
                        $this->session->set_flashdata('status', 'Obra Alterada com sucesso');
                        redirect("obras");
                    }


                }else{  
                        $post=$_POST;
                        $valores = array("titulo"=>$post["titulo"],"descricao"=>$post["descricao"],"status"=>$post["status"]);
                        $condicao = array('id' => $post["id"]);
                        $this->obras->do_update($valores,$condicao);
                        $this->session->set_flashdata('status', 'Obra Alterada com sucesso');
                        redirect("obras");

                }
            }else{
            $id = $this->uri->segment(3);
            $resultado = $this->obras->get_byID($id);
            $dados["cliente"] = $resultado->row(); 
            $this->load->view("editar",$dados);
        }

        }
        


}


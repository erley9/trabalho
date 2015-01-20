<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Certificados extends CI_Controller {


        private $dados=Array();

        public function __construct() {
            parent::__construct();

            if($this->session->userdata('status')!="logado"){
                $this->session->set_flashdata('status', 'Sessão Expirou');
                redirect("adm");
            }

            $this->load->model("geral/certificados_model","certificados");
      
          
        }
        
	public function index()
	{
        $resultado = $this->certificados->get_all();
        $dados = array('lista' => $resultado);
        $this->load->view("listar",$dados);
	}
        
        public function cadastrar(){
            
            if(isset($_POST["titulo"])){
                $dados=$_POST;
                
                    $config['upload_path'] = '../img/certificados';
                    $config['allowed_types'] = 'gif|jpg|png';
            
                    

                    $this->load->library('upload', $config);
                    
                    $campo = "logo";

                    if (!$this->upload->do_upload($campo)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('status', 'Erro ao enviar o arquivo, o arquivo deve ser de no maximo 170px de largura e nos formato jpg/png/gif');
                        redirect("obras");
                    } else {
                        $data = $this->upload->data();
                        $dados = array("id"=>NULL,"titulo"=>$dados["titulo"],"descricao"=>$dados["descricao"],"imagem"=>$data["file_name"],"url"=>$dados["url"]);
                        $this->certificados->do_insert($dados);
                        $this->session->set_flashdata('status', 'Certificado Cadastrado com sucesso!');
                        redirect("certificados");
                    }
               
            }else{
                 $this->load->view("cadastrar",$this->dados);
            }
           
        }
        
        public function excluir(){
            $id=$this->uri->segment(3);
            $lista = $this->certificados->get_byID($id);
            $resultado = $lista->row();
            $arquivo="../img/certificados/".$resultado->imagem;
            
            if(file_exists($arquivo)){
                unlink($arquivo);
            }
            $condicao = array("id"=>$id);
            $this->certificados->do_delete($condicao);
            $this->session->set_flashdata("status","Certificado Excluido com Sucesso");
            redirect("certificados");
            
        }

        public function editar(){
            if(isset($_POST['titulo'])){
                if(!empty($_FILES['logo']['name'])){


                    $post=$_POST;
                
                    $config['upload_path'] = '../img/certificados';
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
                        $valores = array("titulo"=>$post["titulo"],"imagem"=>$data["file_name"],"descricao"=>$post["descricao"],"url"=>$post["url"]);
                        $condicao = array('id' => $post["id"]);
                        $this->certificados->do_update($valores,$condicao);
                        $this->session->set_flashdata('status', 'Obra Alterada com sucesso');
                        redirect("certificados");
                    }


                }else{  
                        $post=$_POST;
                        $valores = array("titulo"=>$post["titulo"],"descricao"=>$post["descricao"],"url"=>$post["url"]);
                        $condicao = array('id' => $post["id"]);
                        $this->certificados->do_update($valores,$condicao);
                        $this->session->set_flashdata('status', 'Obra Alterada com sucesso');
                        redirect("certificados");

                }
            }else{
            $id = $this->uri->segment(3);
            $resultado = $this->certificados->get_byID($id);
            $dados["cliente"] = $resultado->row(); 
            $this->load->view("editar",$dados);
        }

        }
        


}


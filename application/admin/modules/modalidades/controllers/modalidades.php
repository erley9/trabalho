<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Modalidades extends CI_Controller {


        private $dados=Array();

        public function __construct() {
            parent::__construct();

            

     if(isset($_SESSION["logado"])){
            if( $_SESSION["logado"] != true){
                $this->session->set_flashdata('status', 'Sessão Expirou');
                redirect("adm");
            }
            }
            $this->load->model("geral/modalidades_model","parceiros");
          
        }
        
	public function index()
	{
        $resultado = $this->parceiros->get_all();
        $dados = array('lista' => $resultado);
		$this->load->view("listar",$dados);
	}
        
        public function cadastrar(){
            
            if(isset($_POST["titulo"])){
                
                $dados=$_POST;
                
                    $config['upload_path'] = '../img/modalidades';
                    $config['allowed_types'] = 'gif|jpg|png';
                  
                    $this->load->library('upload', $config);
                    
                    $campo = "logo";

                    if (!$this->upload->do_upload($campo)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('status', 'Erro ao enviar o arquivo, o arquivo deve ser de no maximo 150px de largura e nos formato jpg/png/gif');
                        redirect("modalidades");
                    } else {
                        $data = $this->upload->data();
                        $dados = array("id"=>NULL,"titulo"=>$dados["titulo"],"descricao"=>$dados["descricao"],"imagem"=>$data["file_name"]);
                        $this->parceiros->do_insert($dados);
                        $this->session->set_flashdata('status', 'Modalidade Cadastrada com sucesso!');
                        redirect("modalidades");
                    }
            }else{
                 $this->load->view("cadastrar");
            }
           
        }
        
        public function excluir(){
            $id=$this->uri->segment(3);
            $lista = $this->parceiros->get_byID($id);
            $resultado = $lista->row();
            $arquivo="../img/modalidades/".$resultado->imagem;
            
            if(file_exists($arquivo)){
                unlink($arquivo);
            }
            $condicao = array("id"=>$id);
            $this->parceiros->do_delete($condicao);
            $this->session->set_flashdata("status","Modalidade Excluido com Sucesso");
            redirect("modalidades");
            
        }

        public function editar(){
            if(isset($_POST['titulo'])){
                if(!empty($_FILES['logo']['name'])){


                    $dados=$_POST;
                
                    $config['upload_path'] = '../img/modalidades';
                    $config['allowed_types'] = 'gif|jpg|png';
                    

                    $this->load->library('upload', $config);
                    
                    $campo = "logo";

                    if (!$this->upload->do_upload($campo)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('status', 'Erro ao enviar o arquivo, o arquivo deve ser de no maximo 150px de largura e nos formato jpg/png/gif');
                        redirect("topicos");
                    } else {
                        $data = $this->upload->data();
                        $valores = array("titulo"=>$dados["titulo"],"descricao" => $dados["descricao"],"imagem"=>$data["file_name"]);
                        $condicao = array('id' => $dados["id"]);
                        $this->parceiros->do_update($valores,$condicao);
                        $this->session->set_flashdata('status', 'Topico Alterado com sucesso!');
                        redirect("modalidades");
                    }


                }else{
                        $dados=$_POST;
                        $valores = array("titulo"=>$dados["titulo"],"descricao"=>$dados["descricao"]);
                        $condicao = array('id' => $dados["id"]);
                        $this->parceiros->do_update($valores,$condicao);
                        $this->session->set_flashdata('status', 'Topico Alterado com sucesso!');
                        redirect("modalidades");

                }
            }else{
            $id = $this->uri->segment(3);
            $resultado = $this->parceiros->get_byID($id);
            $dados = array('cliente' => $resultado->row()); 
            $this->load->view("editar",$dados);
        }

        }
        


}


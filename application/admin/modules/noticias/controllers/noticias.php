<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Noticias extends CI_Controller {


        private $dados=Array();

        public function __construct() {
            parent::__construct();

        if(isset($_SESSION["logado"])){
               if( $_SESSION["logado"] != true){
                   $this->session->set_flashdata('status', 'Sessão Expirou');
                   redirect("adm");
               }
               }

            $this->load->model("geral/noticias_model","noticias");
          
        }
        
	public function index()
	{
        $resultado = $this->noticias->get_all();
        $dados = array('lista' => $resultado);
		$this->load->view("listar",$dados);
	}
        
        public function cadastrar(){
            
            if(isset($_POST["titulo"])){
                date_default_timezone_set("Brazil/East");

                $dataatual = date("Y-m-d h:i:S");
                
                $dados=$_POST;
                

                if(!empty($_FILES["logo"]["name"])){

           
                    $config['upload_path'] = '../img/noticias';
                    $config['allowed_types'] = 'gif|jpg|png';
                  
                    $this->load->library('upload', $config);
                    
                    $campo = "logo";

                    if (!$this->upload->do_upload($campo)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('status', 'Erro ao enviar o arquivo');
                        redirect("noticias");
                    } else {
                        $data = $this->upload->data();
                        $dados = array("id"=>NULL,"titulo"=>$dados["titulo"],"descricao" => $dados["descricao"],"imagem"=>$data["file_name"],"data"=>$dataatual);
                        $this->noticias->do_insert($dados);
                        $this->session->set_flashdata('status', 'Noticia Cadastrada com sucesso!');
                        redirect("noticias");
                    }

                }else{

                    $dados = array("id"=>NULL,"titulo"=>$dados["titulo"],"descricao" => $dados["descricao"],"imagem"=>null,"data"=>$dataatual);
                    $this->noticias->do_insert($dados);
                    $this->session->set_flashdata('status', 'Noticia Cadastrada com sucesso!');
                    redirect("noticias");

                }
            }else{
                 $this->load->view("cadastrar");
            }
           
        }
        
        public function excluir(){
            $id=$this->uri->segment(3);
            $lista = $this->noticias->get_byID($id);
            $resultado = $lista->row();
            $arquivo="../img/noticias/".$resultado->logo;
            
            if(file_exists($arquivo)){
                unlink($arquivo);
            }
            $condicao = array("id"=>$id);
            $this->noticias->do_delete($condicao);
            $this->session->set_flashdata("status","Noticia Excluida com Sucesso");
            redirect("noticias");
            
        }

        public function editar(){
            if(isset($_POST['titulo'])){

                if(!empty($_FILES['logo']['name'])){
                    date_default_timezone_set("Brazil/East");

                    $dataatual = date("Y-m-d h:i:S");
                    

                    $dados=$_POST;
                
                    $config['upload_path'] = '../img/noticias';
                    $config['allowed_types'] = 'gif|jpg|png';
                    

                    $this->load->library('upload', $config);
                    
                    $campo = "logo";

                    if (!$this->upload->do_upload($campo)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('status', 'Erro ao enviar o arquivo, o arquivo deve ser de no maximo 150px de largura e nos formato jpg/png/gif');
                        redirect("noticias");
                    } else {
                        $data = $this->upload->data();
                        $valores = array("titulo"=>$dados["titulo"],"descricao"=>$dados["descricao"],"imagem"=>$data["file_name"],"data"=>$dataatual);
                        $condicao = array('id' => $dados["id"]);
                        $this->noticias->do_update($valores,$condicao);
                        $this->session->set_flashdata('status', 'Noticia Alterada com sucesso!');
                        redirect("noticias");
                    }


                }else{
                        $dados=$_POST;
                          $valores = array("titulo"=>$dados["titulo"],"descricao"=>$dados["descricao"],"data"=>$dataatual);
                        $condicao = array('id' => $dados["id"]);
                        $this->noticias->do_update($valores,$condicao);
                        $this->session->set_flashdata('status', 'Noticia Alterada com sucesso!');
                        redirect("noticias");

                }
            }else{
            $id = $this->uri->segment(3);
            $resultado = $this->noticias->get_byID($id);
            $dados = array('cliente' => $resultado->row()); 
            $this->load->view("editar",$dados);
        }

        }
        


}


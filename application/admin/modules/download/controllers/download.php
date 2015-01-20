<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Download extends CI_Controller {


        private $dados=Array();

        public function __construct() {
            parent::__construct();


            

            $this->load->model("geral/download_model","download");
          
      
          
        }
        
	public function index()
	{
        $resultado = $this->download->get_all();
        $dados = array('lista' => $resultado);
        $this->load->view("listar",$dados);
	}
        
        public function cadastrar(){
            
            if(isset($_POST["titulo"])){
                $dados=$_POST;
                
                    $config['upload_path'] = '../img/download';
                  
                     $config['allowed_types'] = 'gif|jpg|png|doc|psd|docx|docm|dotx|rtf|pdf|xls|xlt|xla|xlsx|pps|ppt|pptx';
                    

                    $this->load->library('upload', $config);
                    
                    $campo = "logo";

                    if (!$this->upload->do_upload($campo)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('status', 'Erro ao enviar o arquivo, o arquivo');
                        
                        print_r($error);

                        //redirect("download");
                    } else {
                        $data = $this->upload->data();
                        $dados = array("id"=>NULL,"titulo"=>$dados["titulo"],"arquivo"=>$data["file_name"]);
                        $this->download->do_insert($dados);
                        $this->session->set_flashdata('status', 'Arquivo cadastrado com sucesso!');
                        redirect("download");
                    }
               
            }else{

            
                 $this->load->view("cadastrar",$this->dados);
            }
           
        }
        
        public function excluir(){
            $id=$this->uri->segment(3);
            $lista = $this->download->get_byID($id);
            $resultado = $lista->row();
            $arquivo="../img/download/".$resultado->img;
            
            if(file_exists($arquivo)){
                unlink($arquivo);
            }
            $condicao = array("id"=>$id);
            $this->download->do_delete($condicao);
            $this->session->set_flashdata("status","Download Excluido com Sucesso");
            redirect("download");
            
        }

        public function editar(){
            if(isset($_POST['url'])){
                if(!empty($_FILES['logo']['name'])){


                    $post=$_POST;
                
                    $config['upload_path'] = '../img/banners';
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
                        $valores = array("titulo"=>$post["titulo"],"img"=>$data["file_name"],"url"=>$post["url"]);
                        $condicao = array('id' => $post["id"]);
                        $this->banner->do_update($valores,$condicao);
                        $this->session->set_flashdata('status', 'Banner Alterado com sucesso');
                        redirect("banner");
                    }


                }else{  
                        $post=$_POST;
                        $valores = array("titulo"=>$post["titulo"],"url"=>$post["url"]);
                        $condicao = array('id' => $post["id"]);
                        $this->banner->do_update($valores,$condicao);
                        $this->session->set_flashdata('status', 'Banner Alterado com sucesso');
                        redirect("banner");

                }
            }else{
            $id = $this->uri->segment(3);
            $resultado = $this->banner->get_byID($id);
            $dados["cliente"] = $resultado->row(); 
           
            $this->load->view("editar",$dados);
        }

        }
        


}


<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Eventos extends CI_Controller {


        private $dados=Array();

        public function __construct() {
            parent::__construct();

            if($this->session->userdata('status')!="logado"){
                $this->session->set_flashdata('status', 'Sessão Expirou');
                redirect("adm");
            }

            $this->load->model("geral/eventos_model","eventos");
          
        }
        
	public function index()
	{
        $resultado = $this->eventos->get_all();
        $dados = array('lista' => $resultado);
		$this->load->view("listar",$dados);
	}
        
        public function cadastrar(){
            
            if(isset($_POST["evento"])){
                
                $dados=$_POST;
                
                    $config['upload_path'] = '../img/eventos/principal';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size'] = '100';
                    $config['max_width'] = '300';
                    

                    $this->load->library('upload', $config);
                    
                    $campo = "logo";

                    if (!$this->upload->do_upload($campo)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('status', 'Erro ao enviar o arquivo, o arquivo deve ser de no maximo 150px de largura e nos formato jpg/png/gif');
                        redirect("eventos");
                    } else {
                        $data = $this->upload->data();
                        $dados = array("id"=>NULL,"evento"=>$dados["evento"],"cliente"=>$dados["cliente"],"data"=>$dados["data"],"foto"=>$data["file_name"]);
                        $this->eventos->do_insert($dados);
                        $this->session->set_flashdata('status', 'Evento Cadastrado com sucesso!');
                        redirect("eventos");
                    }
            }else{
                 $this->load->view("cadastrar");
            }
           
        }
        
        public function excluir(){
            $id=$this->uri->segment(3);
            $lista = $this->eventos->get_byID($id);
            $resultado = $lista->row();
            $arquivo="../img/eventos/principal/".$resultado->foto;
            
            if(file_exists($arquivo)){
                unlink($arquivo);
            }
            $condicao = array("id"=>$id);
            $this->eventos->do_delete($condicao);
            $this->session->set_flashdata("status","Evento Excluido com Sucesso");
            redirect("eventos");
            
        }

        public function editar(){
            if(isset($_POST['evento'])){
                if(!empty($_FILES['logo']['name'])){


                    $dados=$_POST;
                
                    $config['upload_path'] = '../img/eventos/principal/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size'] = '100';
                    $config['max_width'] = '300';
                    

                    $this->load->library('upload', $config);
                    
                    $campo = "logo";

                    if (!$this->upload->do_upload($campo)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('status', 'Erro ao enviar o arquivo, o arquivo deve ser de no maximo 150px de largura e nos formato jpg/png/gif');
                        redirect("eventos");
                    } else {
                        $data = $this->upload->data();
                        $valores = array("evento"=>$dados["evento"],"foto"=>$data["file_name"],"data"=>$dados["data"],"cliente"=>$dados["cliente"]);
                        $condicao = array('id' => $dados["id"]);
                        $this->eventos->do_update($valores,$condicao);
                        $this->session->set_flashdata('status', 'Evento Alterado com sucesso!');
                        redirect("eventos");
                    }


                }else{
                        $dados=$_POST;
                        $valores = array("evento"=>$dados["evento"],"cliente"=>$dados["cliente"],"data"=>$dados["data"]);
                        $condicao = array('id' => $dados["id"]);
                        $this->eventos->do_update($valores,$condicao);
                        $this->session->set_flashdata('status', 'Eventos Alterado com sucesso!');
                        redirect("eventos");

                }
            }else{
            $id = $this->uri->segment(3);
            $resultado = $this->eventos->get_byID($id);
            $dados = array('cliente' => $resultado->row()); 
            $this->load->view("editar",$dados);
        }

        }
        


}


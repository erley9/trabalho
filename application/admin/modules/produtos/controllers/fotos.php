<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fotos extends CI_Controller {


        private $dados=Array();

        public function __construct() {
            parent::__construct();

          if(isset($_SESSION["logado"])){
            if( $_SESSION["logado"] != true){
                $this->session->set_flashdata('status', 'Sessão Expirou');
                redirect("adm");
            }
            }
            $this->load->model("geral/galeria_model","galeria");
            $this->load->model("geral/fotos_model","fotos");
          
        }
        
	public function index()
	{
        $galeria = $this->uri->segment(3);


        $this->dados["galeria"] = $galeria;

        $fotos = $this->fotos->buscaFotos($galeria)->result();

        $this->dados["fotos"] = $this->listarFotos($fotos);


        $this->load->view("listarFotos",$this->dados);

        /*$resultado = $this->galeria->get_all();
        $dados = array('lista' => $resultado);
		$this->load->view("listar",$dados);*/
	}

    public function listarFotos($fotos){

        $lista = "";

        foreach ($fotos as $foto) {
            
            $lista .= "
            
            <li>
                <a href='".base_url("produtos/fotos/excluir")."' class='excluir' data-id='".$foto->id."'>X</a>
                <a href='".$this->base->base_adm("img/fotos/{$foto->normal}")."'  rel='galeria-grupo' >
                    <img src='".$this->base->base_adm("img/fotos/miniaturas/{$foto->miniatura}")."' alt=''>
                </a>
            </li>

            ";
        }


        return $lista;


    }

    public function cadastraFoto(){
        $post = $_POST;

        $this->load->library('upload');
        
        $image_upload_folder ='../img/fotos/';
        
        
        
        $this->upload_config = array(
              'upload_path'   => $image_upload_folder,
              'allowed_types' => 'png|jpg|jpeg|bmp|tiff'
        );
        
        $this->upload->initialize($this->upload_config);
        
        if (!$this->upload->do_upload()) {
              $upload_error = $this->upload->display_errors();
              echo json_encode($upload_error);
        } else {
            $arquivo_info = $this->upload->data();
          
            $miniatura_source = "../img/fotos/miniaturas/{$arquivo_info['file_name']}";

            $config['image_library'] = 'gd2';
            $config['source_image']   =  $image_upload_folder."/{$arquivo_info['file_name']}";
            $config['new_image'] = $miniatura_source; 
            $config['create_thumb'] = TRUE;
            $config['maintain_ratio'] = TRUE;
            $config['width']   = 106;
            $config['height'] = 106;

            $this->load->library('image_lib', $config); 

            $this->image_lib->resize();


            $miniatura = $arquivo_info["raw_name"]."_thumb".$arquivo_info["file_ext"];

            $dados = array("id"=>null,"miniatura"=>$miniatura,"normal"=>$arquivo_info["file_name"],"galeriafk"=>$post["id"]);

            $this->fotos->do_insert($dados);

            $fotos = $this->fotos->buscaFotos($post["id"])->result();

            $galerias = $this->listarFotos($fotos);

            echo $galerias;
        }

    }

    public function excluir(){
        $id = $_POST["id"];

        $foto = $this->fotos->get_byID($id)->row();

        $galeria = $foto->galeriafk;

        $this->fotos->do_delete(array('id' => $id ));

        $fotos = $this->fotos->buscaFotos($galeria)->result();

        $galerias = $this->listarFotos($fotos);
        
        echo $galerias;   



    }
        
   
        


}


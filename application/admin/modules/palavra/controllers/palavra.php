<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Palavra extends CI_Controller {


        private $dados=Array();

        public function __construct() {
            parent::__construct();

            if($this->session->userdata('status')!="logado"){
                $this->session->set_flashdata('status', 'Sessão Expirou');
                redirect("adm");
            }
            $this->load->model("geral/crud_model");
            $this->load->model("geral/usuario_model","usuario");
            $this->load->model("geral/palavra_model","palavra");

            $this->load->library("geral/combo");
          
        }
        
	public function index()        
	{
        $this->dados["combo"] = $this->combo->montaComboCategoria();
		$this->load->view("lista-palavras",$this->dados);
	}

    public function buscar(){
        $dados = $_POST;

        $resultado = $this->palavra->buscaCategoriaFk($dados["categorias"])->result();

        echo "
        <form action='".base_url("palavra/cadastrar")."' id='cadastrar-palavra'>
            <label for=''>Palavra:</label>
            <input type='text' name='palavra' id='palavra'>
            <input type='hidden' name='categoria' id='categoria' value='".$dados["categorias"]."'>
            <input type='submit' value='Cadastrar' id='cadastra-palavra'>
        </form>


        <table id='tabela-palavras'>
            <thead>
                <tr>
                    <th>Palavra</th>
                    <th>Alterar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>";

            foreach ($resultado as $linha) {

                echo "
                <tr>
                    <td><input type='text' name='palavra' value='".$linha->palavra."'></td>
                    <td><a href='".base_url("palavra/alterar/{$linha->id}")."' id='btn-alterar'><img src='".$this->base->base_adm("img/adm/editar-icon.png")."' alt=''></a></td>
                    <td><a href='".base_url("palavra/excluir/{$linha->id}")."' id='btn-excluir'><img src='".$this->base->base_adm("img/adm/excluir-icon.png")."' alt=''></a></td>
                </tr>";
            }
      
           
         echo "           
            </tbody>
        </table>";

    }

    public function cadastrar(){
        $post = $_POST;

        $dados = array('id' => null , "palavra" => $post["palavra"],"categoriafk"=>$post["categoria"]);

        $this->palavra->do_insert($dados);

        $resultado = $this->palavra->buscaCategoriaFk($post["categoria"])->result();


        foreach ($resultado as $linha) {

        echo "
            <tr>
                <td><input type='text' name='palavra' value='".$linha->palavra."'></td>
                <td><a href='".base_url("palavra/alterar/{$linha->id}")."' id='btn-alterar'><img src='".$this->base->base_adm("img/adm/editar-icon.png")."' alt=''></a></td>
                <td><a href='".base_url("palavra/excluir/{$linha->id}")."' id='btn-excluir'><img src='".$this->base->base_adm("img/adm/excluir-icon.png")."' alt=''></a></td>
            </tr>";
        }



    }

    public function excluir(){
    
    $id = $_POST["id"];
    $categoria = $_POST["categoria"];

    $condicao=array('id' => $id);

    $this->palavra->do_delete($condicao);


        $resultado = $this->palavra->buscaCategoriaFk($categoria)->result();


        foreach ($resultado as $linha) {

        echo "
            <tr>
                <td><input type='text' name='palavra' value='".$linha->palavra."'></td>
                <td><a href='".base_url("palavra/alterar/{$linha->id}")."' id='btn-alterar'><img src='".$this->base->base_adm("img/adm/editar-icon.png")."' alt=''></a></td>
                <td><a href='".base_url("palavra/excluir/{$linha->id}")."' id='btn-excluir'><img src='".$this->base->base_adm("img/adm/excluir-icon.png")."' alt=''></a></td>
            </tr>";
        }



    }

    public function alterar(){
        $post = $_POST;

        $dados = array('palavra' => $post["palavra"],"categoriafk" => $post["categoria"]);

        $condicao = array('id' => $post["id"]);

        $this->palavra->do_update($dados,$condicao);

        echo $post["palavra"];
    }       
        


}


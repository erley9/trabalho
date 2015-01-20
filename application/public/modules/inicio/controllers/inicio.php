<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {

	

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	
        private $dados=Array();
        private $dadosTopo = Array();

	public function __construct() {
            parent::__construct();
            $this->load->model("geral/empresa_model","empresa");
            $this->load->model("geral/clientes_model","clientes");
            $this->load->model("geral/servicos_model","servicos");
          
    

         
        }
        
        public function index()
	{	

		$empresa = $this->empresa->get_byID(1)->row();

		$servicos = $this->servicos->buscaServicosPor(10)->result();

		$clientes = $this->clientes->buscaClientes(4)->result(); 


		$listaServicos = $this->geraListaServicos($servicos);

		$listaClientes = $this->geraListaClientes($clientes);

		$dados = array(
				"listaServicos" => $listaServicos,
				"listaClientes" => $listaClientes,
				"empresa" => $empresa
			);



		$this->load->view("geral/includes/topo");
		$this->load->view("inicio",$dados);
		$this->load->view("geral/includes/rodape");
		


	}


	/*
	* Recebe um array de objetos contendo os serviços 
	* e gera uma lista ordenada html
	*/
	public function geraListaServicos($lista){


		$html =  "<ul id='lista-pinturas'>";


		foreach ($lista as $item) {
			
			$html .= "
			<li>
				<a href='".base_url("servicos")."'>
			    <figure>
			        <img src='".base_url("img/servicos/{$item->imagem}")."'>
			        <p>{$item->titulo}</p>
			    </figure>
			    </a>
			</li>
			";

		}


		$html .="</ul>";


		return $html;


	}

	/*
	* Recebe um array de objetos contendo os clientes
	* e gera uma lista ordenada html
	*/

	public function geraListaClientes($lista){

		$html = "<ul id='lista-clientes'>";

		foreach ($lista as $item) {
			$html .="<li><a href='".base_url("clientes")."'><img src='".base_url("img/clientes/{$item->foto}")."'></a></li>";
		}


		$html.= "</ul>";


		return $html;


	}







	


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
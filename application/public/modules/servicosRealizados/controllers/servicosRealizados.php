<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class servicosRealizados extends CI_Controller {

	

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
            $this->load->model("geral/servicosrealizados_model","servicos");

            $this->load->model("geral/fotos_model","fotos");
          
    

         
        }
        
        public function index()
	{	


		$servicos = $this->servicos->get_all()->result();

		$dados = array("servicos" => $servicos);

		$this->load->view("geral/includes/topo");
		$this->load->view("servicos",$dados);
		$this->load->view("geral/includes/rodape");
		


	}

	public function detalhes(){

		$id = $this->uri->segment(3);

		$servico = $this->servicos->get_byID($id)->row();

		$fotos = $this->fotos->buscaFotos($id)->result();

		$dados = array("servico" => $servico,"fotos" => $fotos);

		$this->load->view("geral/includes/topo");
		$this->load->view("detalhes",$dados);
		$this->load->view("geral/includes/rodape");
	}




	


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
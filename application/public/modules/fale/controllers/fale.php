<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fale extends CI_Controller {

	

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
          
    

         
        }
        
        public function index()
	{	



		$this->load->view("geral/includes/topo");
		$this->load->view("fale");
		$this->load->view("geral/includes/rodape");
		


	}

	public function enviaMail(){

			$dados=$_POST;




				$mensagem = "<html>
							<body>
							<h1 style='font-family:Arial;font-size:16px;font-weight:bold;color:#f00'>Fale Conosco:</h1>
							<table>
							<tr style='font-family:Arial;font-size:12px'>
								<td style='font-weight:bold'>Nome:</td>
								<td>".$dados["nome"]."</td>
							</tr>
							<tr style='font-family:Arial;font-size:12px'>
								<td style='font-weight:bold'>E-mail:</td>
								<td>".$dados["email"]."</td>
							</tr>
							
							<tr style='font-family:Arial;font-size:12px'>
								<td style='font-weight:bold'>(DDD) Telefone:</td>
								<td>".$dados['telefone']."</td>
							</tr>		
									
							<tr style='font-family:Arial;font-size:12px'>
								<td style='font-weight:bold'>Mensagem:</td>
								<td>".$dados["mensagem"]."</td>
							</tr>
					
							</table>
							</body>
							</html>";

				//echo $mensagem;

				//echo print_r($dados);


				
				
					
				$this->load->library('email');

				$this->email->from("erley@agenciacriativaimagem.com.br", "Fale Conosco Betun");
				
				$this->email->reply_to($dados["email"],$dados["nome"]);
				
				$this->email->to("erley@agenciacriativaimagem.com.br"); 

				$this->email->subject("Fale Conosco Betun");
				$this->email->message($mensagem);	

				if ( ! $this->email->send())
				{
				     echo $this->email->print_debugger();
				}else{
					 echo "sucesso";
				}
				




			}





	


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Admin</title>
	<link rel="stylesheet" href="<?php echo $this->base->base_adm("css/area/reset.css"); ?>">
	<link rel="stylesheet" href="<?php  echo $this->base->base_adm("css/area/areabase.css");?>">
	<link rel="stylesheet" href="<?php  echo $this->base->base_adm("css/area/centro-cliente.css");?>">
	<link rel="stylesheet" href="<?php  echo $this->base->base_adm("css/area/form.css");?>"
	<link rel="stylesheet" href="<?php  echo $this->base->base_adm("js/jpages/css/jPages.css");?>">
	<script src="<?php  echo $this->base->base_adm("js/jquery-2.0.3.min.js"); ?> "></script>
	<script src="<?php  echo $this->base->base_adm("js/jpages/js/jPages.min.js"); ?> "></script>
	<script src="<?php  echo $this->base->base_adm("js/jpages/configuracao/conf.js"); ?> "></script>
	<script src="<?php  echo $this->base->base_adm("js/palavras.js"); ?> "></script>

</head>
<body>

	<div id="container">

		<?php $this->load->view("geral/includes/menu-lateral"); ?>

		<section id="centro">
			<section id="container-tabela">
			<?php echo $this->session->flashdata('status');?>
			<h1>Busca de palavras chaves por categoria</h1>
                        <form enctype="multipart/form-data" method="post" id="buscar-palavra" action="<?php echo base_url("palavra/buscar"); ?>">
                            <fieldset>
                            	<div class="separar">
 								<?php echo $combo; ?>
 								<input type="submit" value="Buscar" id="btn-buscar-palavra">
                                </div>
                             
                            </fieldset>
                        </form>

                        <div id="container-palavra">

                       
					
						</div>
						<div class="holder"></div>



			
			</section>
		</section>

	</div>
	
</body>
</html>
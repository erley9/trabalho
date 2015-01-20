<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Admin</title>
	<link rel="stylesheet" href="<?php echo $this->base->base_adm("css/area/reset.css"); ?>">
	   <link rel="stylesheet" href="<?php  echo $this->base->base_adm("css/area/areabase.css");?>">
    <link rel="stylesheet" href="<?php  echo $this->base->base_adm("css/area/centro-banner.css");?>">
	<link rel="stylesheet" href="<?php  echo $this->base->base_adm("css/area/form.css");?>"
	<link rel="stylesheet" href="<?php  echo $this->base->base_adm("js/jpages/css/jPages.css");?>">
	<script src="<?php  echo $this->base->base_adm("js/jquery-2.0.3.min.js"); ?> "></script>
	<script src="<?php  echo $this->base->base_adm("js/jpages/js/jPages.min.js"); ?> "></script>
  <script src="<?php  echo $this->base->base_adm("js/jquery-validation-1.11.1/dist/jquery.validate.min.js"); ?> "></script>
	<script src="<?php  echo $this->base->base_adm("js/jpages/configuracao/conf.js"); ?> "></script>
	<script src="<?php  echo $this->base->base_adm("js/buscaCEP.js"); ?> "></script>
  <script src="<?php  echo $this->base->base_adm("js/jquery-validation-1.11.1/conf/conf-validation.js"); ?> "></script>



</head>
<body>

	<div id="container">

		<?php $this->load->view("geral/includes/menu-lateral"); ?>

		<section id="centro">
			<section id="container-tabela">
			   <?php echo $this->session->flashdata('status'); ?>
			<h1>Newsletter</h1>

            <a href="<?php echo base_url("newsletter/gerarPlanilha"); ?>">Gerar Planilha</a>
                       
			
			</section>
		</section>

	</div>
	
</body>
</html>
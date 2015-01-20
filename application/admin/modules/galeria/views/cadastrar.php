<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Admin</title>
	<link rel="stylesheet" href="<?php echo $this->base->base_adm("css/area/reset.css"); ?>">
	<link rel="stylesheet" href="<?php  echo $this->base->base_adm("css/area/areabase.css");?>">
	<link rel="stylesheet" href="<?php  echo $this->base->base_adm("css/area/centro-cliente.css");?>">
	<link rel="stylesheet" href="<?php  echo $this->base->base_adm("css/area/form.css");?>">
	<link rel="stylesheet" href="<?php  echo $this->base->base_adm("js/jpages/css/jPages.css");?>">
	<link rel="stylesheet" href="<?php  echo $this->base->base_adm("js/uploadify/uploadify.css");?>">
	<script src="<?php  echo $this->base->base_adm("js/jquery-2.0.3.min.js"); ?> "></script>
	<script src="<?php  echo $this->base->base_adm("js/jpages/js/jPages.min.js"); ?> "></script>
	<script src="<?php  echo $this->base->base_adm("js/markinput/src/jquery.maskedinput.js"); ?> "></script>
	<script src="<?php  echo $this->base->base_adm("js/uploadify/jquery.uploadify.min.js"); ?> "></script>
	<script src="<?php  echo $this->base->base_adm("js/jpages/configuracao/conf.js"); ?> "></script>
	<script src="<?php  echo $this->base->base_adm("js/mascaras.js"); ?> "></script>
	<script src="<?php  echo $this->base->base_adm("js/uploadify/multiplo.js"); ?> "></script>


</head>
<body>

	<div id="container">

		<?php $this->load->view("geral/includes/menu-lateral"); ?>

		<section id="centro">
			<section id="container-tabela">
			<span class='status'></span>
			<br>
			<span id="galeria"></span>
			<h1>Cadastro de Fotos</h1>
                        <form enctype="multipart/form-data" method="post" action="<?php echo base_url("galeria/cadastrar"); ?>">
                        	<input type="hidden" id="base" value="<?php echo base_url(); ?>">
                        	<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                            <fieldset>
                                <div class="separar">
                                <input type="file" name="userfile" id="userfile">
                            	</div>
                            </fieldset>
                        </form>
			
			</section>
		</section>

	</div>
	
</body>
</html>
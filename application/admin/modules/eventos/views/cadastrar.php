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
	<script src="<?php  echo $this->base->base_adm("js/jquery-2.0.3.min.js"); ?> "></script>
	<script src="<?php  echo $this->base->base_adm("js/jpages/js/jPages.min.js"); ?> "></script>
	<script src="<?php  echo $this->base->base_adm("js/jpages/configuracao/conf.js"); ?> "></script>
	<script src="<?php  echo $this->base->base_adm("js/markinput/src/jquery.maskedinput.js"); ?> "></script>
	<script src="<?php  echo $this->base->base_adm("js/mascaras.js"); ?> "></script>


</head>
<body>

	<div id="container">

		<?php $this->load->view("geral/includes/menu-lateral"); ?>

		<section id="centro">
			<section id="container-tabela">
			<h1>Cadastro de Eventos</h1>
                        <form enctype="multipart/form-data" method="post" action="<?php echo base_url("eventos/cadastrar"); ?>">
                            <fieldset>
                            	<div class="separar">
                                <label>Evento:</label>
                                <input type="text" name="evento" id="evento">
                                </div>
                               	<div class="separar">
                                <label>Cliente:</label>
                                <input type="text" name="cliente" id="cliente">
                                </div>
                                <div class="separar">
                                <label>Data</label>
                                <input type="text" name="data" id="data" class="data">
                            	</div>
                                <div class="separar">
                                <label>Foto Principal:</label>
                                <input type="file" name="logo" id="arquivo">
                            	</div>
                                <input type="submit" value="Cadastrar">
                            </fieldset>
                        </form>
			
			</section>
		</section>

	</div>
	
</body>
</html>
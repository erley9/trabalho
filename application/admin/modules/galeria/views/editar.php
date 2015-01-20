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

</head>
<body>

	<div id="container">

		<?php $this->load->view("geral/includes/menu-lateral"); ?>

		<section id="centro">
			<section id="container-tabela">
			<h1>Editar Parceiros</h1>
                        <form enctype="multipart/form-data" method="post" action="<?php echo base_url("eventos/editar"); ?>">
                            <fieldset>
                            	<input type="hidden" name="id" id="id" value="<?php echo $cliente->id; ?>">
                            	   <div class="separar">
                                        <label>Evento:</label>
                                        <input type="text" name="evento" id="evento" value="<?php echo $cliente->evento; ?>">
                                    </div>
                                    <div class="separar">
                                        <label>Cliente:</label>
                                        <input type="text" name="cliente" id="cliente" value="<?php echo $cliente->cliente; ?>">
                                    </div>
                                    <div class="separar">
                                        <label>Data</label>
                                        <input type="text" name="data" id="data" class="data" value="<?php echo $cliente->data; ?>">
                                    </div>
                                        <figure>
                                            <img src="<?php echo $this->base->base_adm("img/eventos/principal/{$cliente->foto}");  ?>" alt="">
                                        </figure>
                                        <div class="separar">
                                        <label>Foto Principal:</label>
                                        <input type="file" name="logo" id="arquivo">
                                    </div>
                                    <input type="submit" value="Alterar">
                            </fieldset>
                        </form>
			
			</section>
		</section>

	</div>
	
</body>
</html>
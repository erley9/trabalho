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
	<script src="<?php  echo $this->base->base_adm("js/jquery-1.10.2.min.js"); ?> "></script>
	<script src="<?php  echo $this->base->base_adm("js/jpages/js/jPages.min.js"); ?> "></script>
	<script src="<?php  echo $this->base->base_adm("js/jpages/configuracao/conf.js"); ?> "></script>
		<script src="<?php echo $this->base->base_adm("js/jquery-maskmoney-master/dist/jquery.maskMoney.min.js"); ?>"></script>
	<script src="<?php echo  $this->base->base_adm("js/mudacombo.js"); ?>"></script>

</head>
<body>

	<div id="container">

		<?php $this->load->view("geral/includes/menu-lateral"); ?>

		<section id="centro">
			<section id="container-tabela">
			<h1>Editar Escolaridade</h1>
                        <form enctype="multipart/form-data" method="post" action="<?php echo base_url("escolaridade/editar"); ?>">
                            <fieldset>
                            	<input type="hidden" name="base" id="base" value="<?php echo base_url(); ?>" >
                            	<input type="hidden" name="id" id="id" value="<?php echo $cliente->id; ?>">
                                  <div class="separar">
                                
                                <label>Período:</label>
                                <input type="text" name="nome" id="nome" value="<?php echo $cliente->tipo; ?>">
                            	</div>

                            

                                <input type="submit" value="Alterar">
                            </fieldset>
                        </form>
			
			</section>
		</section>

	</div>
	
</body>
</html>
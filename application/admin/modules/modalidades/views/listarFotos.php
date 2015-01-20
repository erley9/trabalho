<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Admin</title>
	<link rel="stylesheet" href="<?php echo $this->base->base_adm("css/area/reset.css"); ?>">
	<link rel="stylesheet" href="<?php  echo $this->base->base_adm("css/area/areabase.css");?>">
	<link rel="stylesheet" href="<?php  echo $this->base->base_adm("css/area/centro-cliente.css");?>">
	<link rel="stylesheet" href="<?php  echo $this->base->base_adm("css/area/galeria.css");?>">
	<link rel="stylesheet" href="<?php  echo $this->base->base_adm("js/jpages/css/jPages.css");?>">
	<link rel="stylesheet" href="<?php  echo $this->base->base_adm("js/fancybox/fancybox/jquery.fancybox-1.3.4.css");?>">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	<script src="<?php  echo $this->base->base_adm("js/fancybox/fancybox/jquery.easing-1.3.pack.js"); ?> "></script>
	<script src="<?php  echo $this->base->base_adm("js/fancybox/fancybox/jquery.mousewheel-3.0.4.pack.js"); ?> "></script>
	<script src="<?php  echo $this->base->base_adm("js/fancybox/fancybox/jquery.fancybox-1.3.4.pack.js"); ?> "></script>
	<script src="<?php  echo $this->base->base_adm("js/fancybox/conf/fancyconf.js"); ?> "></script>
	<script src="<?php  echo $this->base->base_adm("js/jpages/js/jPages.min.js"); ?> "></script>
	<script src="<?php  echo $this->base->base_adm("js/jpages/configuracao/conf.js"); ?> "></script>
	<script src="<?php echo $this->base->base_adm("js/jquery.form.min.js"); ?>"></script>
	<script src="<?php echo $this->base->base_adm("js/acoes.js"); ?>"></script>

</head>
<body>

	<div id="container">

		<?php $this->load->view("geral/includes/menu-lateral"); ?>

		<section id="centro">
			<section id="container-tabela">
          	
			<h1>Lista de Fotos</h1>

			<form action="<?php echo base_url("modalidades/fotos/cadastraFoto"); ?>" id="cadastrarFotos" method="post" enctype="multipart/form-data">
				 <progress value="0" max="100"></progress><span id="porcentagem">0%</span>
				<div class="separar">
					<input type="hidden" name="id" value="<?php echo $galeria; ?>">
				</div>

				<div class="separar">
					<label for="">Foto:</label>
					<input type="file" name="userfile" id="userfile">
				</div>

				<div class="separar">
					<input type="submit" value="Enviar" id="envia-foto">
				</div>
				
			</form>

			<ul id="galeria">
				<?php echo $fotos; ?>
			</ul>
		
		
			<div class="holder">
			</div>
			</section>
		</section>

	</div>
	
</body>
</html>
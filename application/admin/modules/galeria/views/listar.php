<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Admin</title>
	<link rel="stylesheet" href="<?php echo $this->base->base_adm("css/area/reset.css"); ?>">
	<link rel="stylesheet" href="<?php  echo $this->base->base_adm("css/area/areabase.css");?>">
	<link rel="stylesheet" href="<?php  echo $this->base->base_adm("css/area/centro-galeria.css");?>">
	<link rel="stylesheet" href="<?php  echo $this->base->base_adm("js/jpages/css/jPages.css");?>">
	<script src="<?php  echo $this->base->base_adm("js/jquery-2.0.3.min.js"); ?> "></script>
	<script src="<?php  echo $this->base->base_adm("js/jpages/js/jPages.min.js"); ?> "></script>
	<script src="<?php  echo $this->base->base_adm("js/jpages/configuracao/conf2.js"); ?> "></script>
	<script src="<?php  echo $this->base->base_adm("js/excluirFoto.js"); ?> "></script>

</head>
<body>

	<div id="container">

		<?php $this->load->view("geral/includes/menu-lateral"); ?>

		<section id="centro">
			<section id="container-tabela">
            <?php echo $this->session->flashdata('status'); ?>
			<h1>Evento: <?php echo $galeria->evento; ?></h1>
			<a href="<?php echo base_url("galeria/cadastrar/{$galeria->id}"); ?>" class="cadastrar">Cadastrar</a>
			<input type='hidden' id='galeria' value='<?php echo $galeria->id; ?>'>
			<input type="hidden" id='base' value="<?php echo base_url("galeria/excluir"); ?>">
			<ul id="tabela">
				<?php
				foreach ($fotos->result() as $linha) {
					echo "
					<li>
						<figure class='figura'>
							<a href='".$linha->id."' class='excluir'><img src='".$this->base->base_adm("img/excluir-icon.png")."' alt='' /></a>
							<img src='".$this->base->base_adm("img/eventos/{$linha->url}")."' alt='' class='imagem'>
						</figure>
					</li>";
				}

				?>
			</ul>
			<diV class="holder"></diV>
			</section>
		</section>

	</div>
	
</body>
</html>
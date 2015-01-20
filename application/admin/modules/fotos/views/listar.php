<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Admin</title>
	<link rel="stylesheet" href="<?php echo $this->base->base_adm("css/area/reset.css"); ?>">
	<link rel="stylesheet" href="<?php  echo $this->base->base_adm("css/area/areabase.css");?>">
	<link rel="stylesheet" href="<?php  echo $this->base->base_adm("css/area/centro-banner.css");?>">
	<link rel="stylesheet" href="<?php  echo $this->base->base_adm("js/jpages/css/jPages.css");?>">
	<script src="<?php  echo $this->base->base_adm("js/jquery-1.10.2.min.js"); ?> "></script>
	<script src="<?php  echo $this->base->base_adm("js/jpages/js/jPages.min.js"); ?> "></script>
	<script src="<?php  echo $this->base->base_adm("js/jpages/configuracao/conf.js"); ?> "></script>

</head>
<body>

	<div id="container">

		<?php $this->load->view("geral/includes/menu-lateral"); ?>

		<section id="centro">
			<section id="container-tabela">
                            <?php echo $this->session->flashdata('status'); ?>
			<h1>Lista de Fotos</h1>
			<a href="<?php echo base_url("fotos/cadastrar/{$galeria}"); ?>" class="cadastrar">Cadastrar</a>
			<table id="tbl-clientes">
				<colgroup>
					<col width="60%">
					<col width="5%">
					<col width="5%">
				</colgroup>
				<thead>
					<tr>
						<th>Titulo</th>
						<th>Editar</th>
						<th>Excluir</th>
					</tr>
				</thead>
				<tbody id="tabela">

					<?php

					foreach ($lista->result() as $linha) {
						echo "
						<tr>
							<td><img src='".$this->base->base_adm("img/fotos/miniaturas/{$linha->miniatura}")."' width='100px' style='margin-top:10px;margin-bottom:10px' ></td>
							<td><a href='".base_url("fotos/editar/{$linha->id}/{$linha->galeriafk}")."'><img src='{$this->base->base_adm("img/adm/editar-icon.png")}' alt=''></a></td>
							<td><a href='".  base_url("fotos/excluir/{$linha->id}/{$linha->galeriafk}")."'><img src='{$this->base->base_adm("img/adm/excluir-icon.png")}'' alt=''></a></td>
						</tr>";
					}

					?>


				</tbody>
				
			</table>
			<div class="holder">
			</div>
			</section>
		</section>

	</div>
	
</body>
</html>
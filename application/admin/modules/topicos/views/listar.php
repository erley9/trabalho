<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Admin</title>
	<link rel="stylesheet" href="<?php echo $this->base->base_adm("css/area/reset.css"); ?>">
		<link rel="stylesheet" href="<?php  echo $this->base->base_adm("css/area/areabase.css");?>">
	<link rel="stylesheet" href="<?php  echo $this->base->base_adm("css/area/centro-banner.css");?>">
	<link rel="stylesheet" href="<?php  echo $this->base->base_adm("js/jpages/css/jPages.css");?>">
	<script src="<?php  echo $this->base->base_adm("/js/jquery-1.10.2.min.js"); ?> "></script>
	<script src="<?php  echo $this->base->base_adm("js/jpages/js/jPages.min.js"); ?> "></script>
	<script src="<?php  echo $this->base->base_adm("js/jpages/configuracao/conf.js"); ?> "></script>

</head>
<body>

	<div id="container">

		<?php $this->load->view("geral/includes/menu-lateral"); ?>

		<section id="centro">
			<section id="container-tabela">
                            <?php echo $this->session->flashdata('status'); ?>
			<h1>Lista de Topicos</h1>
			<table id="tbl-clientes">
				<colgroup>
					<col width="95%">
					<col width="5%">
				</colgroup>
				<thead>
					<tr>
						<th>Topicos</th>
						<th>Editar</th>
					
					</tr>
				</thead>
				<tbody id="tabela">

					<?php

					foreach ($lista->result() as $linha) {
						echo "
						<tr>
							<td>{$linha->titulo}</td>
							<td align='center'><a href='".base_url("topicos/editar/{$linha->id}")."'><img src='{$this->base->base_adm("img/adm/editar-icon.png")}' alt=''></a></td>
						</tr>";
					}

					?>


				</tbody>
				
			</table>
			
			</section>
			<div class="holder">
			</div>
		</section>

	</div>
	
</body>
</html>
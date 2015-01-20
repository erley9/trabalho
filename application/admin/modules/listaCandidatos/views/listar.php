<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Admin</title>
	<link rel="stylesheet" href="<?php echo $this->base->base_adm("css/area/reset.css"); ?>">
	<link rel="stylesheet" href="<?php  echo $this->base->base_adm("css/area/areabase.css");?>">
	<link rel="stylesheet" href="<?php  echo $this->base->base_adm("css/area/centro-banner.css");?>">
	<link rel="stylesheet" href="<?php  echo $this->base->base_adm("js/jpages/css/jPages.css");?>">
	<script src="<?php  echo $this->base->base_adm("js/jpages/js/jquery-1.8.2.min.js"); ?> "></script>
	<script src="<?php  echo $this->base->base_adm("js/jpages/js/jPages.min.js"); ?> "></script>
	<script src="<?php  echo $this->base->base_adm("js/jpages/configuracao/conf3.js"); ?> "></script>


</head>
<body>

	<div id="container">

		<?php $this->load->view("geral/includes/menu-lateral"); ?>

		<section id="centro">
			<section id="container-tabela">
                            <?php echo $this->session->flashdata('status'); ?>
			<h1>Lista de Candidatos</h1>
			<a href="listaCandidatos/cadastrar" class="cadastrar">Cadastrar</a>
			<form action="<?php echo base_url("listaCandidatos/buscar"); ?>" id="buscaCodigo" method="post">
				<input type="text" name="busca" id="busca" placeholder="Digite o nome da candidato">
				<input type="submit" value="Buscar">
			</form>
			<table id="tbl-clientes">
				<colgroup>
					<col width="60%">
					<col width="5%">
					<col width="5%">
				</colgroup>
				<thead>
					<tr>
						<th>Empresas</th>
						<th>Editar</th>
						<th>Excluir</th>
					</tr>
				</thead>
				<tbody id="tabela">

					<?php

					foreach ($lista->result() as $linha) {
						echo "
						<tr>
							<td>".$linha->nome."</td>
							<td><a href='".base_url("listaCandidatos/editar/{$linha->id}")."'><img src='{$this->base->base_adm("img/adm/editar-icon.png")}' alt=''></a></td>
							<td><a href='".  base_url("listaCandidatos/excluir/{$linha->id}")."'><img src='{$this->base->base_adm("img/adm/excluir-icon.png")}' alt=''></a></td>
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
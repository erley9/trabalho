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
			<h1>Lista de Produtos</h1>
			<a href="<?php echo base_url("produtos/cadastrar"); ?>" class="cadastrar">Cadastrar</a>
			<table id="tbl-clientes">
				<colgroup>
					<col width="80%">
					
					<col width="5%">
					<col width="5%">
				</colgroup>
				<thead>
					<tr>
						<th>Produtos</th>
						<th>Fotos</th>	
						<th>Editar</th>
						<th>Excluir</th>
					</tr>
				</thead>
				<tbody id="tabela">

					<?php

					foreach ($lista->result() as $linha) {
						echo "
						<tr>
							<td>{$linha->titulo}</td>
								<td><a href='".base_url("produtos/fotos/{$linha->id}")."'><img src='".$this->base->base_adm("img/adm/subcategoria-icon.png")."'/></a></td>
							<td align='center'><a href='".base_url("produtos/editar/{$linha->id}")."'><img src='{$this->base->base_adm("img/adm/editar-icon.png")}' alt=''></a></td>
							<td align='center'><a href='".  base_url("produtos/excluir/{$linha->id}")."'><img src='{$this->base->base_adm("img/adm/excluir-icon.png")}'' alt=''></a></td>
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
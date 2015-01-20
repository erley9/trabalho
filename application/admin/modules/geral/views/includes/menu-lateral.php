		<section id="menu-lateral">
			<figure>
			<img src="<?php echo $this->base->base_adm("img/adm/logo.png"); ?>" alt="">
			</figure>
			<h1>Bem vindo Administrador</h2>
			<a href="<?php echo base_url("adm/logout") ?>" class="sair">Sair</a>
			<img id="separador" src="<?php echo $this->base->base_adm("img/adm/saperador-login.jpg");  ?>" alt="">
			<nav>
				<h2>MENU</h2>
				<ul>
					<li><a href="<?php echo base_url("clientes"); ?>">Clientes</a></li>
					<li><a href="<?php echo base_url("download"); ?>">Download</a></li>
					<li><a href="<?php echo base_url("empresa"); ?>">Empresa</a></li>
					<li><a href="<?php echo base_url("senha"); ?>">Senha</a></li>
					<li><a href="<?php echo base_url("servicos"); ?>">Serviços</a></li>
					<li><a href="<?php echo base_url("servicosRealizados"); ?>">Serviços Realizados</a></li>

				</ul>
			</nav>
		</section>
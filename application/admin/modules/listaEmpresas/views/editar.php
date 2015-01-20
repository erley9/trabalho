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
			<h1>Editar Faixa Salarial</h1>
                        <form enctype="multipart/form-data" method="post" action="<?php echo base_url("listaEmpresas/editar"); ?>">
                            <fieldset>
                            
                            	<input type="hidden" name="id" id="id" value="<?php echo $cliente->id; ?>">
                                
                                <div class="separar">
                                	<label>Empresa:</label>
                                	<input type="text" name="nome" id="nome" value="<?php echo $cliente->nome; ?>">
                            	</div>


                            		<div class="separar">
                            		    <label>Cnpj:</label>
                            		    <input type="text" name="cnpj" id="cnpj" class="cnpj" value="<?php echo $cliente->cnpj; ?>">
                            		</div>

                            		<div class="separar">
                            		    <label>Telefone:</label>
                            		    <input type="text" name="telefone" id="telefone" class="dddtelefone" value="<?php echo $cliente->telefone; ?>">
                            		</div>

                            		<div class="separar">
                            		    <label>E-mail:</label>
                            		    <input type="text" name="email" id="email" value="<?php echo $cliente->email; ?>">
                            		</div>


                            		<div class="separar">
                            		    <label>CEP:</label>
                            		    <input type="text" name="cep" id="cep" class="cep" value="<?php echo $cliente->cep; ?>">
                            		</div>

                            		<div class="separar">
                            		    <label>Rua:</label>
                            		    <input type="text" name="rua" id="rua" value="<?php echo $cliente->rua; ?>">
                            		</div>

                            		<div class="separar">
                            		    <label>Numero:</label>
                            		    <input type="text" name="numero" id="numero" value="<?php echo $cliente->numero; ?>">
                            		</div>


                            		<div class="separar">
                            		    <label>Bairro:</label>
                            		    <input type="text" name="bairro" id="bairro" value="<?php echo $cliente->bairro; ?>">
                            		</div>

                            		<div class="separar">
                            		    <label>Cidade:</label>
                            		    <input type="text" name="cidade" id="cidade" value="<?php echo $cliente->cidade; ?>">
                            		</div>

                            		<div class="separar">
                            		    <label>Estado:</label>
                            		    <input type="text" name="estado" id="estado" value="<?php echo $cliente->estado; ?>">
                            		</div>


                            		<div class="separar">
                            		    <label>Descrição:</label>
                            		    <textarea name="descricao" id="descricao"><?php echo $cliente->descricao; ?></textarea>
                            		</div>

                            		<div class="separar">
                            			<label for="">Área de Atuação</label>
                            			<?php echo $comboArea; ?>
                            		</div>

                            		<div class="separar">
                            			<label for="">Senha</label>
                            			<input type="password" name="senha" id="senha" value="<?php echo $cliente->senha; ?>">
                            		</div>

                            		<div class="separar">
                            			<label for="">Status</label>
                            			<select name="status" id="status">
                            				<option value="">Selecione o Status</option>
                            				<?php 
                            				if($cliente->status == "ativo"){

                            					echo "
                            					<option value='ativo' selected>Ativado</option>
                            					<option value='desativado'>Desativado</option>

                            					";

                            					}else{


                            						echo "
                            						<option value='ativo'>Ativado</option>
                            						<option value='desativado' selected>Desativado</option>

                            						";


                            					} 
                            				?>
                            				
                            			</select>
                            		</div>

                            		<div class="separar">
                            			<label for="">Plano</label>
                            			<select name="planos" id="planos">
                            				<option value="">Selecione o Plano</option>
											
											<?php 

											if($cliente->plano == 3){

											echo "	
                            				<option value='3' selected>Normal</option>
                            				<option value='4'>Premium</option>
                            				";
                            			}else{
                            				echo "	
                            				<option value='3' >Normal</option>
                            				<option value='4' selected>Premium</option>
                            				";
                            			}

                            				?>
                            			</select>
                            		</div>

                            

                                <input type="submit" value="Alterar">
                            </fieldset>
                        </form>
			
			</section>
		</section>

	</div>
	
</body>
</html>
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
                        <form enctype="multipart/form-data" method="post" action="<?php echo base_url("listaCandidatos/editar"); ?>">
                            <fieldset>
                            
                            	<input type="hidden" name="id" id="id" value="<?php echo $cliente->id; ?>">
                                <input type="hidden" name="usuarioid" id="usuarioid" value="<?php echo $usuario->id; ?>">
                                
                                    <div class="separar">
                                        <label>Nome:</label>
                                        <input type="text" name="nome" id="nome" value="<?php echo $cliente->nome; ?>">
                                    </div>

                                    <div class="separar">
                                        <label>Sobrenome:</label>
                                        <input type="text" name="sobrenome" id="sobrenome" value="<?php echo $cliente->sobrenome; ?>">
                                    </div>

                                    <div class="separar">
                                        <label for="">Sexo</label>
                                        <select name="status" id="status">
                                            <option value="">Selecione o Sexo</option>
                                            <?php
                                            if($cliente->sexo == "masculino"){
                                            echo "
                                            <option value='ativo' selected>Masculino</option>
                                            <option value='desativado'>Feminino</option>
                                            ";

                                            }else{

                                                 echo "
                                            <option value='ativo' >Masculino</option>
                                            <option value='desativado' selected>Feminino</option>
                                            ";


                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="separar">
                                        <label>CPF:</label>
                                        <input type="text" name="cpf" id="cpf" class="cpf" value="<?php echo $cliente->cpf; ?>">
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
                                        <input type="password" name="senha" id="senha" value="<?php echo $usuario->senha; ?>">
                                    </div>

                                

                                    <div class="separar">
                                        <label for="">Plano</label>
                                        <select name="planos" id="planos">
                                            <option value="">Selecione o Plano</option>

                                            <?php
                                            if($usuario->plano == 1){ 
                                            echo "
                                            <option value='1' selected>Normal</option>
                                            <option value='2'>Premium</option>
                                            ";
                                            }else{

                                             echo "
                                            <option value='1'>Normal</option>
                                            <option value='2' selected>Premium</option>
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
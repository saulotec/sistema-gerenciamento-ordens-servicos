<div id="visu">
	
	<?php if(isset($visu) && !empty($visu) && $visu == 'visualizar'):?>
		<h1>Verificar dados do cliente:</h1>
		<h2>Aréa recomendada para todos</h2>
	<?php endif;?>

	<?php if(isset($edit) &&  !empty($edit) && $edit == 'editar'):?>
	<h1>Busque o Cliente para alterações de dados cadastrais:</h1>
	<h2>Aréa recomendada para o administrador</h2>
	<?php endif; ?>

	

	<form method="POST" action="<?php echo BASE_URL;?>cliente/<?php if(isset($action)){ echo $action;}?>">

		<label>
                Selecione a opção de busca:<br/>  <!-- Verificar no classificados como faz esse select -->
			<select id="buscaros" name="selecao">
				<option></option>				
				<option value="id">Número do Cliente</option>
				<option value= "nome">Nome do Cliente</ooption>
				<option value = "email">E-mail do Cliente </ooption>
			</select><br/>

		</label>


		<label>
			Digite a busca:<br/>
			<input type="text" name="busca"/>
		</label><br/>

		<label>
			<input type="submit" value="Procurar"/>
		</label>

	</form>	
	
	<?php if(isset($infoCliente) && $infoCliente == true): ?>         
                
        <div id="retorno">Cliente editado com sucesso, número de indentificação: <?php if(isset($_SESSION['ID'])){echo $_SESSION['ID'];} ?> </div><br/>
                    
    <?php endif; ?>       
	
</div>
<div id="visu">
	
	<?php if(isset($visu) && !empty($visu) && $visu == 'visualizar'):?>
		<h1>Verificar dados do Fornecedor:</h1>
		<h2>Aréa recomendada para todos</h2>
	<?php endif;?>

	<?php if(isset($edit) &&  !empty($edit) && $edit == 'editar'):?>
	<h1>Busque o Fornecedor para alter ou e adicionar dados:</h1>
	<h2>Aréa recomendada para o administrador</h2>
	<?php endif; ?>

	

	<form method="POST" action="<?php echo BASE_URL;?>fornecedor/<?php if(isset($action)){ echo $action;}?>">

		<label>
                Selecione a opção de busca:<br/>  <!-- Verificar no classificados como faz esse select -->
			<select id="buscaros" name="selecao">
				<option></option>				
				<option value="id">Número do Fornecedor</option>
				<option value= "nome">Nome do Fornecedor</ooption>
				<option value = "site">Site do Fornecedor </ooption>
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
	
	<?php if(isset($infoFornecedor) && $infoFornecedor == true): ?>         
                
        <div id="retorno">Cliente editado com sucesso, número de indentificação: <?php if(isset($_SESSION['ID'])){echo $_SESSION['ID'];} ?> </div><br/>
         <a id="aa" href="<?php echo BASE_URL;?>fornecedor/buscarfe">Ok</a>  
    <?php endif; ?>       
	
</div>
<div id="visu">
	
	<?php if(isset($visu) && !empty($visu) && $visu == 'visualizar'):?>
		<h1>Selecione a OS somente para a Visualização:</h1>
		<h2>Aréa recomendada para técnico e administrador</h2>
	<?php endif;?>

	<?php if(isset($edit) &&  !empty($edit) && $edit == 'editar'):?>
	<h1>Busque a OS para editar qualquer campo necessário:</h1>
	<h2>Aréa recomendada para o administrador</h2>
	<?php endif; ?>

	<?php if(isset($update) &&  !empty($update) && $update == 'atualizar'):?> 
	<h1>Busque a OS para colocar informações sobre o status atual do aparelho<h1>
	<h2>Aréa recomendada para uso do técnico</h2>
	<?php endif; ?>

	<form method="POST" action="<?php echo BASE_URL;?>ordem/<?php if(isset($action)){ echo $action;}?>">

		<label>
                Selecione a opção de busca:<br/>  <!-- Verificar no classificados como faz esse select -->
			<select id="buscaros" name="buscaros">
				<option></option>
				<option value="id">Número da Ordem</ooption>
				<option value="id_cliente">Número do Cliente</option>
				<option value= "nome">Nome do Cliente</ooption>
				<option value = "email">E-mail do Cliente </ooption>
			</select><br/>
		</label>


		<label>
			Digite a busca:<br/>
			<input type="text" name="buscarinfo"/>
		</label><br/>

		<label>
			<input type="submit" value="Procurar"/>
		</label>

	</form>
	<?php if(isset($info) && $info != ''):?>
		<div>
			<table>
				<thead>
					<tr>
						<th>Número da ordem</th>
						<th>Nome do Cliente</th>
						<th>Marca do aparelho</th>
						<th>Modelo</th>
						<th>defeito</th>
						<th>situação</th>
						<th>data de entrada</th>
					</tr>
				<thead>
				<tbody>	
			<?php foreach($info as $info_aparelho ): ?>

						
						<tr>
							
							<td><?php echo $info_aparelho['id']?></td>			
							
							<td><?php echo $_SESSION['nome'];?></td>

							<td><?php echo $info_aparelho['marca'];?></td>

							<td><?php echo $info_aparelho['modelo'];?></td>

							<td><?php echo $info_aparelho['defeito'];?></td>

							<td><?php echo $info_aparelho['situacao'];?></td>

							<td><?php echo $info_aparelho['data_entrada'];?></td>

						</tr>	
						
			<?php endforeach; ?>
				</tbody>
			</table>

		</div>	
	<?php endif; ?>
</div>